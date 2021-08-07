<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function index(){
        $data = DB::table('persons')
            ->where('created_by', Auth::id())
            ->get();
        return view('persons.index', ["data"=>$data]);
    }
    public function create(){
        return view('persons.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'user_name' => 'nullable|unique:persons,user_name|max:16',
            'name' => 'required|max:32',
            'mobile' => 'required|digits:11',
            'company' => 'nullable|max:20',
            'address' => 'nullable|max:50',
        ]);

        $inserted = DB::table('persons')
                    ->insert([
                        "user_name" => $request->user_name,
                        "name" => $request->name,
                        "mobile" => $request->mobile,
                        "company" => $request->company,
                        "address" => $request->address,
                        "created_by" => Auth::id(),
                    ]);
        if($inserted){
            notify()->success('Person created successfully', 'Success');
            return redirect()->route('persons');
        }
        else return back()->withInput()->with("errors",  ["Person Creation Failed!"]);

    }
}
