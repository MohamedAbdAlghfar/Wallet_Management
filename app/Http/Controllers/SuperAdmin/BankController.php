<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Hash; 

class BankController extends Controller
{
    public function create()
    {
        return view('superAdmin.createBank'); 
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:banks', 
            'password' => 'required|string|min:8', 
            
        ];

        $this->validate($request, $rules);

        $bank = Bank::create($request->merge(['password' => Hash::make($request->get('password'))])->all());

    
            return redirect('/dashboard')->withStatus('Bank successfully created.');        

    } 

    public function delete()
    {
        $banks = Bank::select('id','name','email')->orderBy('id', 'desc')->get();
        return view('superAdmin.deleteBank',compact('banks'));   
    }

    public function destroy($id) 
    {
        $bank = Bank::find($id);
        $bank->delete();
        return redirect('/dashboard')->withStatus('Bank successfully deleted.');
    }







}
