<?php

namespace App\Http\Controllers\BankAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Bank;
use App\Models\Deposit;
use App\Models\Transaction; 
use App\Models\BankCompany;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ViewDepositController extends Controller 
{
    public function show()  
    {
        $bank_id = Auth::user()->bank_id;
        $Deposits = Deposit::where('bank_id',$bank_id)->where('status',2)->get(); 
        return view('bankAdmin.showAllDeposits',compact('Deposits'));    
    }

















}
