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
class EditDepositController extends Controller
{
    public function showDeposit($id)  
    {
       $deposit = Deposit::find($id);
        return view('bankAdmin.showDeposit',compact('deposit'));    
    }     
  
    public function Approve($id)
    {
        // Find the deposit by ID
        $deposit = Deposit::find($id);
        
        if ($deposit) {
            // Update the deposit status
            $deposit->status = 1;
            $deposit->save();
    
            // Find the associated company and update its balance
            $company_id = $deposit->company_id;
            $company = Company::find($company_id);
            
            if ($company) {
                $company->balance += $deposit->amount;
                $company->save();
            }
    
            // Find the associated transaction by created_at timestamp
            $transaction = Transaction::where('created_at', $deposit->created_at)->first();
            
            if ($transaction) {
                // Update the transaction status and balance
                $transaction->status = 1;
                $transaction->balance_after = $transaction->balance_before + $transaction->amount;
                $transaction->save();
            }
    
            // Redirect with success status
            return redirect('bankAdmin/viewDeposits')->withStatus('Deposit Approved successfully.');
        }
    
        // Handle the case where the deposit is not found
        return redirect('bankAdmin/viewDeposits')->withErrors('Deposit not found.');
    }
    
    public function Reject($id)
    {
    // Find the deposit by ID
    $deposit = Deposit::find($id);
            
    if ($deposit) {
        // Update the deposit status
        $deposit->status = 0 ;
        $deposit->save();

        

        // Find the associated transaction by created_at timestamp
        $transaction = Transaction::where('created_at', $deposit->created_at)->first();
        
        if ($transaction) {
            // Update the transaction status and balance
            $transaction->status = 0 ;
            $transaction->balance_after = $transaction->balance_before ;
            $transaction->save(); 
        }

        // Redirect with success status
        return redirect('bankAdmin/viewDeposits')->withStatus('Deposit Rejected successfully.');
    }

    // Handle the case where the deposit is not found
    return redirect('bankAdmin/viewDeposits')->withErrors('Deposit not found.');
    }








}
