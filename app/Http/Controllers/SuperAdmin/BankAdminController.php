<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class BankAdminController extends Controller
{
    public function create()
    {
        return view('superAdmin.createB_Admin');   
    }

    public function store(Request $request,User $user)
    {
        
        $rules = [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:banks', 
            'password' => 'required|string|min:8',
            'bank_id' => 'required',
        ];

        $this->validate($request, $rules);

        $user = User::create($request->merge(['password' => Hash::make($request->get('password')), "role" => 2, "company_id" => Null])->all());
        
           
        return redirect('/dashboard')->withStatus('Bank Admin successfully created.');     

        }

        public function delete() 
        {
            $users = User::select('id', 'name', 'email', 'bank_id')->where('role', 2)->orderBy('id', 'desc')->get();
            return view('superAdmin.deleteB_Admin',compact('users'));   
        }
    
        public function destroy($id) 
        {
            $user = User::find($id);
            $user->delete();
            return redirect('/dashboard')->withStatus('Bank Admin successfully deleted.');
        } 





}











