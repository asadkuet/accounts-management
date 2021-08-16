<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    public function index(Request $request){
        if ($request->has('account')) {
            $account = $request->account;
        }
        $data = DB::table('transactions as t')
            ->join('accounts as a', 'a.id', '=', 't.from_account')
            ->join('accounts as b', 'b.id', '=', 't.to_account')
            ->where('t.created_by', Auth::id())
            ->when($request->has('account'), function ($query, $account) {
                return $query->where('from_account', $account)
                            ->OrWhere('to_account', $account);
            })
            ->select('t.*', 'a.name as from_account_name', 'b.name as to_account_name', 'a.user_name as from_user_name', 'b.user_name as to_user_name' )
            ->orderBy('id', 'desc')
            ->get();
        return view('transactions.index', ["data"=>$data]);
    }
    public function createSend(){
        $from_accounts = DB::table('accounts')
                    ->where('type', 1)
                    ->whereNull('person_id')
                    ->where('created_by', Auth::id())
                    ->get();
        $to_accounts = DB::table('accounts')
                    ->where('type', 1)
                    ->whereNotNull('person_id')
                    ->where('created_by', Auth::id())
                    ->get();
        $persons = DB::table('persons')
                    ->where('created_by', Auth::id())
                    ->get();
        $purposes = DB::table('purposes')
                    ->where('type', 'send')
                    ->where('created_by', Auth::id())
                    ->get();
        return view('transactions.send', ['from_accounts'=>$from_accounts, 'to_accounts'=>$to_accounts, 'persons'=>$persons, 'purposes'=>$purposes]);
    }
    public function createReceive(){
        $to_accounts = DB::table('accounts')
                    ->where('type', 1)
                    ->whereNull('person_id')
                    ->where('created_by', Auth::id())
                    ->get();
        $from_accounts = DB::table('accounts')
                    ->where('type', 1)
                    ->whereNotNull('person_id')
                    ->where('created_by', Auth::id())
                    ->get();
        $persons = DB::table('persons')
                    ->where('created_by', Auth::id())
                    ->get();
        $purposes = DB::table('purposes')
                    ->where('type', 'receive')
                    ->where('created_by', Auth::id())
                    ->get();
        return view('transactions.receive', ['from_accounts'=>$from_accounts, 'to_accounts'=>$to_accounts, 'persons'=>$persons, 'purposes'=>$purposes]);
    }
    public function storeTransaction(Request $request){
        $validated = $request->validate([
            'txn_type' => 'required',
            'txn_date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'from_account' => 'required|exists:accounts,id',
            'to_account' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|min:3|max:50',
            'purpose' => 'nullable|exists:purposes,id'
        ]);
        
        /* need update: 
                check if both accounts belongs to logged-in user */

        if($request->txn_type != 1 && $request->txn_type != 2)
            throw ValidationException::withMessages(['txn_type' => 'Transaction Type is invalid']);

        $txn_types = [1=>'Receive', 2=>'Send'];

        //start transaction
        DB::beginTransaction();
        $txn_inserted = DB::table('transactions')
                    ->insert([
                        "txn_date" => $request->txn_date,
                        "txn_type" => $request->txn_type,
                        "from_account" => $request->from_account,
                        "to_account" => $request->to_account,
                        "amount" => $request->amount,
                        "description" => $request->description,
                        "purpose" => $request->purpose,
                        "gateway" => $request->gateway,
                        "created_by" => Auth::id(),
                    ]);
        $sender_bal_updated = DB::table('accounts')->where('id', $request->from_account)->decrement('balance', $request->amount);
        $receiver_bal_updated = DB::table('accounts')->where('id', $request->to_account)->increment('balance', $request->amount);

        if($txn_inserted && $sender_bal_updated && $receiver_bal_updated){
            DB::commit();
            notify()->success($txn_types[$request->txn_type]." Money Successful", 'Success');
            return redirect()->route('transactions');
        }
        else{
            DB::rollBack();
            return back()->withInput()->with("errors",  [$txn_types[$request->txn_type]." Money Failed!"]);
        }

    }    
}
