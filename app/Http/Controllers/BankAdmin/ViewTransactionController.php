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
class ViewTransactionController extends Controller
{
    public function show() 
    {
        $bank_id = Auth::user()->bank_id;
        $Transactions = Transaction::where('bank_id',$bank_id)->get(); 
        return view('bankAdmin.showAllTracsactions',compact('Transactions'));    
    }    









}
