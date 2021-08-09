<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $balance = DB::table('accounts')
                    ->where('type', 1)
                    ->whereNull('person_id')
                    ->where('created_by', Auth::id())
                    ->sum('balance');
        
        $total_received = DB::table('transactions')
                    ->where('txn_type', 1)
                    ->where('created_by', Auth::id())
                    ->sum('amount');
        $total_sent = DB::table('transactions')
                    ->where('txn_type', 2)
                    ->where('created_by', Auth::id())
                    ->sum('amount');
                    
        return view('dashboard', ['balance'=>$balance, 'total_received'=>$total_received, 'total_sent'=>$total_sent]);
    }
}
