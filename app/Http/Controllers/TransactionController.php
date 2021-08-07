<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $data = DB::table('transactions as t')
            ->join('accounts as a', 'a.account_no', '=', 't.from_account')
            ->join('persons as p', 'p.id', '=', 't.to_account')
            ->where('t.created_by', Auth::id())
            ->select('t.*', 'a.name as from_account_name', 'p.name as to_account_name', 'p.user_name' )
            ->get();
        return view('transactions.index', ["data"=>$data]);
    }
    public function createSend(){
        $accounts = DB::table('accounts')
                    ->where('created_by', Auth::id())
                    ->get();
        $persons = DB::table('persons')
                    ->where('created_by', Auth::id())
                    ->get();
        $purposes = DB::table('purposes')
                    ->where('type', 'send')
                    ->where('created_by', Auth::id())
                    ->get();
        return view('transactions.send', ['accounts'=>$accounts, 'persons'=>$persons, 'purposes'=>$purposes]);
    }
    public function storeSend(Request $request){
        $validated = $request->validate([
            'txn_date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'from_account' => 'required|exists:accounts,account_no',
            'to_account' => 'required|exists:persons,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|min:3|max:50',
            'purpose' => 'nullable|exists:purposes,id'
        ]);
        
        /* need update: 
                check if both accounts belongs to logged-in user */

        $inserted = DB::table('transactions')
                    ->insert([
                        "txn_date" => $request->txn_date,
                        "txn_type" => 2,
                        "from_account" => $request->from_account,
                        "to_account" => $request->to_account,
                        "amount" => $request->amount,
                        "description" => $request->description,
                        "purpose" => $request->purpose,
                        "gateway" => $request->gateway,
                        "created_by" => Auth::id(),
                    ]);
        if($inserted){
            notify()->success('Transaction created successfully', 'Success');
            return redirect()->route('transactions');
        }
        else return back()->withInput()->with("errors",  ["Transaction Creation Failed!"]);

    }
}
