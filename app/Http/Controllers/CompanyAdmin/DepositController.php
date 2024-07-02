<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Bank;
use App\Models\Deposit;
use App\Models\Transaction; 
use App\Models\BankCompany;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller 
{
    public function create()
    {
        return view('companyAdmin.createDeposit');    
    }

    public function store(Request $request)
    {
        $rules = [
            'bank_id' => 'required',
            'account_number' => 'required',
            'amount' => 'required',
            'image' => 'required',
            
        ];

        $this->validate($request, $rules);
                
        // create BankCompany if not exist 
        $bank = Bank::find($request->bank_id);
        if ($bank) {
            $pivotEntry = $bank->Companies()->where('company_id', Auth::user()->company->id)->first();
            if ($pivotEntry) {
                // Check if the account number matches
                if ($pivotEntry->pivot->account_number != $request->account_number) {
                    session()->flash('message', 'Account number was incorrect.');
    
                    // Redirect or return a response, depending on your application's flow
                    return redirect()->back();
                }
                else{
        // create deposit



        if($file = $request->file('image')) {

            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

            if($file->move('images', $file_to_store)) {
                    $photo = $file_to_store ;
            }
        }




        $depositData = $request->merge(['company_id' => Auth::user()->company->id, 'photo' => $photo])->toArray();
        $deposit = Deposit::create($depositData);
        // create transaction
        $transactionData = $request->merge(['company_id' => Auth::user()->company->id,'type' => 3, 'balance_before' => Auth::user()->company->balance,'balance_after' => Auth::user()->company->balance])->toArray();
        $transaction = Transaction::create($transactionData);

                }
            } else {
                // Create new pivot entry
                $bank->companies()->attach(Auth::user()->company->id, ['account_number' => $request->account_number]);
                   // create deposit

                   $depositData = $request->merge(['company_id' => Auth::user()->company->id])->toArray();
                   $deposit = Deposit::create($depositData);
                   // create transaction
                   $transactionData = $request->merge(['company_id' => Auth::user()->company->id,'type' => 3, 'balance_before' => Auth::user()->company->balance,'balance_after' => Auth::user()->company->balance])->toArray();
                   $transaction = Transaction::create($transactionData);
           
            } 
        }

 
            return redirect('companyAdmin/showTransaction')->withStatus('deposit successfully created.');        

    }


 






}
