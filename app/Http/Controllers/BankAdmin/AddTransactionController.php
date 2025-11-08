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

class AddTransactionController extends Controller
{
    public function cashIn()
    {
        return view('bankAdmin.cashIn');     
    } 
   
    public function storeCashin(Request $request)
    {
        
        $rules = [
            'company_id' => 'required',
            'account_number' => 'required|digits:14',
            'amount' => 'required',
            
        ];

        $this->validate($request, $rules);
                
        // create BankCompany if not exist 
        $company = Company::find($request->company_id);
        $companybalance = $company->balance ;
        if ($company) {
            $pivotEntry = $company->Banks()->where('bank_id', Auth::user()->bank->id)->first();
            if ($pivotEntry) {
                // Check if the account number matches
                if ($pivotEntry->pivot->account_number != $request->account_number) {
                    session()->flash('message', 'Account number was incorrect.');
    
                    // Redirect or return a response, depending on your application's flow
                    return redirect()->back();
                }
                else{

        // create transaction 
       
        $transactionData = $request->merge(['bank_id' => Auth::user()->bank->id,'type' => 1, 'status' => 1 ,'balance_before' => $companybalance,'balance_after' => $companybalance + $request->amount])->toArray();
        $transaction = Transaction::create($transactionData);
        $company->balance += $request->amount;
        $company->save();
                }
            } else {
                // Create new pivot entry
                $company->banks()->attach(Auth::user()->bank->id, ['account_number' => $request->account_number]);

                   // create transaction
                   $transactionData = $request->merge(['bank_id' => Auth::user()->bank->id,'type' => 1, 'status' => 1 ,'balance_before' => $companybalance,'balance_after' => $companybalance + $request->amount])->toArray();
                   $transaction = Transaction::create($transactionData);
                   $company->balance += $request->amount;
                   $company->save();
            }
        }

 
            return redirect('/dashboard')->withStatus('transaction successfully created.');        


    } 

    public function cashOut()
    {
        return view('bankAdmin.cashOut');     
    }

    public function storeCashout(Request $request)
    {
        
        $rules = [
            'company_id' => 'required',
            'account_number' => 'required|digits:14',
            'amount' => 'required',
            
        ];

        $this->validate($request, $rules);
                
        // create BankCompany if not exist 
        $company = Company::find($request->company_id);
        $companybalance = $company->balance ;
        if ($company) {
            $pivotEntry = $company->Banks()->where('bank_id', Auth::user()->bank->id)->first();
            if ($pivotEntry) {
                // Check if the account number matches
                if ($pivotEntry->pivot->account_number != $request->account_number) {
                    session()->flash('message', 'Account number was incorrect.');
    
                    // Redirect or return a response, depending on your application's flow
                    return redirect()->back();
                }
                else{

        // create transaction 
       
        $transactionData = $request->merge(['bank_id' => Auth::user()->bank->id,'type' => 2, 'status' => 1 ,'balance_before' => $companybalance,'balance_after' => $companybalance - $request->amount])->toArray();
        $transaction = Transaction::create($transactionData);
        $company->balance -= $request->amount;
        $company->save(); 
                }
            } else {
                // Create new pivot entry
                $company->banks()->attach(Auth::user()->bank->id, ['account_number' => $request->account_number]);

                   // create transaction
                   $transactionData = $request->merge(['bank_id' => Auth::user()->bank->id,'type' => 2, 'status' => 1 ,'balance_before' => $companybalance,'balance_after' => $companybalance - $request->amount])->toArray();
                   $transaction = Transaction::create($transactionData);
                   $company->balance -= $request->amount;
                   $company->save();
            }
        }

 
            return redirect('/dashboard')->withStatus('transaction successfully created.');        


    }











}
