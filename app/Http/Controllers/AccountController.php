<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        $data = DB::table('accounts')
            ->where('created_by', Auth::id())
            ->get();
        return view('accounts.index', ["data"=>$data]);
    }
    public function create($owner_type){
        $persons = DB::table('persons')
                    ->where('created_by', Auth::id())
                    ->get();
        return view('accounts.create', ['owner_type'=>$owner_type, 'persons'=>$persons]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'user_name' => 'nullable|unique:accounts,user_name|max:20',
            'name' => 'required|max:32',
            'balance' => 'nullable|numeric|min:0'
        ]);

        $inserted = $this->insertAccounts($request->account_no, $request->user_name, $request->name, $request->type, $request->balance, $request->person_id );
        if($inserted){
            notify()->success('Account created successfully', 'Success');
            return redirect()->route('accounts');
        }
        else return back()->withInput()->with("errors",  ["Account Creation Failed!"]);

    }
    public function insertAccounts($account_no, $user_name, $name, $type, $balance, $person_id){
        $inserted = DB::table('accounts')
                        ->insert([
                            "account_no" => $account_no,
                            "user_name" => $user_name,
                            "name" => $name,
                            "type" => $type ? $type : 1,
                            "balance" => $balance ? $balance : 0,
                            "person_id" => $person_id,
                            "created_by" => Auth::id(),
                        ]);
        if($inserted !== FALSE)
            return true;
        else return false;
    }
}
