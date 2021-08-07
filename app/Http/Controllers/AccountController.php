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
    public function create(){
        return view('accounts.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'account_no' => 'nullable|unique:accounts,account_no|max:20',
            'name' => 'required|max:32',
            'type' => 'required|exists:account_types,id',
            'balance' => 'nullable|numeric|min:0'
        ]);

        $inserted = DB::table('accounts')
                    ->insert([
                        "account_no" => $request->account_no,
                        "name" => $request->name,
                        "type" => $request->type,
                        "balance" => $request->balance,
                        "created_by" => Auth::id(),
                    ]);
        if($inserted){
            notify()->success('Account created successfully', 'Success');
            return redirect()->route('accounts');
        }
        else return back()->withInput()->with("errors",  ["Account Creation Failed!"]);

    }
}
