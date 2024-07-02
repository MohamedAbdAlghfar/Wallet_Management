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

class TransactionController extends Controller
{
    public function showT()
    {
        $user = Auth::user();
        $company = $user->company;
        
        // Retrieve bank account numbers related to the company
        $bankAccountNumbers = BankCompany::where('company_id', $company->id)->pluck('account_number');
    
        $transactions = collect();
    
        foreach ($bankAccountNumbers as $accountNumber) {  
            // Retrieve transactions related to each bank account number
            $bankTransactions = Transaction::select('transactions.*', 'bank_company.account_number')
                ->join('banks', 'transactions.bank_id', '=', 'banks.id')
                ->join('bank_company', 'banks.id', '=', 'bank_company.bank_id')
                ->where('bank_company.account_number', $accountNumber)
                ->where('transactions.company_id', $company->id)
                ->get();
            
            $transactions = $transactions->merge($bankTransactions);
        }
    
        // Return the transactions to the view
      //  return response()->json($transactions);
        return view('companyAdmin.Transaction', ['transactions' => $transactions]);
    }
    
    

}
