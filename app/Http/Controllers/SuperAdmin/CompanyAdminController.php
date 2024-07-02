<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class CompanyAdminController extends Controller
{
    
    public function create()
    {
        return view('superAdmin.createC_Admin');   
    }

    public function store(Request $request,User $user)
    {
        
        $rules = [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:banks', 
            'password' => 'required|string|min:8',
            'company_id' => 'required',
        ];

        $this->validate($request, $rules);

        $user = User::create($request->merge(['password' => Hash::make($request->get('password')), "role" => 3, "bank_id" => Null])->all());
        
           
        return redirect('/dashboard')->withStatus('Company Admin successfully created.');     

        }

        public function delete() 
        {
            $users = User::select('id', 'name', 'email', 'company_id')->where('role', 3)->orderBy('id', 'desc')->get();
            return view('superAdmin.deleteC_Admin',compact('users'));   
        }
    
        public function destroy($id) 
        {
            $user = User::find($id);
            $user->delete();
            return redirect('/dashboard')->withStatus('Company Admin successfully deleted.');
        } 







}
