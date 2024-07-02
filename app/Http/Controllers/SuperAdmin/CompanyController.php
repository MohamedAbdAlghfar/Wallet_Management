<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
  
    public function create()
    {
        return view('superAdmin.createCompany'); 
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies', 
            'password' =>  'required|string|min:8',  
            'balance' => 'required',
            
        ];

        $this->validate($request, $rules); 

        $company = Company::create($request->merge(['password' => Hash::make($request->get('password'))])->all());

    
            return redirect('/dashboard')->withStatus('company successfully created.');        

    }

    public function delete()
    {
        $companies = Company::select('id','name','email','balance')->orderBy('id', 'desc')->get();
        return view('superAdmin.deleteCompany',compact('companies'));   
    }

    public function destroy($id) 
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/dashboard')->withStatus('Company successfully deleted.');
    }









}
