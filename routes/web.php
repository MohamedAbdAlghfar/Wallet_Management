<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\BankController;
use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\BankAdminController;
use App\Http\Controllers\SuperAdmin\CompanyAdminController;
use App\Http\Controllers\CompanyAdmin\TransactionController;
use App\Http\Controllers\CompanyAdmin\DepositController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { 
    return view('welcome');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// superAdmin
Route::get('superAdmin/createBank', 'App\Http\Controllers\SuperAdmin\BankController@create')->name('Bank.create');
Route::post('superAdmin/storeBank', 'App\Http\Controllers\SuperAdmin\BankController@store')->name('Bank.store');
Route::get('superAdmin/createCompany', 'App\Http\Controllers\SuperAdmin\CompanyController@create')->name('Company.create');
Route::post('superAdmin/storeCompany', 'App\Http\Controllers\SuperAdmin\CompanyController@store')->name('Company.store');
Route::get('superAdmin/createB_Admin', 'App\Http\Controllers\SuperAdmin\BankAdminController@create')->name('B_Admin.create');
Route::post('superAdmin/storeB_Admin', 'App\Http\Controllers\SuperAdmin\BankAdminController@store')->name('B_Admin.store');
Route::get('superAdmin/createC_Admin', 'App\Http\Controllers\SuperAdmin\CompanyAdminController@create')->name('C_Admin.create');
Route::post('superAdmin/storeC_Admin', 'App\Http\Controllers\SuperAdmin\CompanyAdminController@store')->name('C_Admin.store');
Route::get('superAdmin/deleteBank', 'App\Http\Controllers\SuperAdmin\BankController@delete')->name('Bank.delete');
Route::delete('superAdmin/destroyBank/{bankId}', 'App\Http\Controllers\SuperAdmin\BankController@destroy')->name('Bank.destroy');
Route::get('superAdmin/deleteCompany', 'App\Http\Controllers\SuperAdmin\CompanyController@delete')->name('Company.delete');
Route::delete('superAdmin/destroyCompany/{compabyId}', 'App\Http\Controllers\SuperAdmin\CompanyController@destroy')->name('Company.destroy');  
Route::get('superAdmin/deleteB_Admin', 'App\Http\Controllers\SuperAdmin\BankAdminController@delete')->name('B_Admin.delete');
Route::delete('superAdmin/destroyB_Admin/{b_AdminId}', 'App\Http\Controllers\SuperAdmin\BankAdminController@destroy')->name('B_Admin.destroy'); 
Route::get('superAdmin/deleteC_Admin', 'App\Http\Controllers\SuperAdmin\CompanyAdminController@delete')->name('C_Admin.delete');
Route::delete('superAdmin/destroyC_Admin/{c_AdminId}', 'App\Http\Controllers\SuperAdmin\CompanyAdminController@destroy')->name('C_Admin.destroy'); 
   
  
// companyAdmin    
Route::get('companyAdmin/showTransaction', 'App\Http\Controllers\CompanyAdmin\TransactionController@showT')->name('Trans.showT'); 
Route::get('companyAdmin/createDeposit', 'App\Http\Controllers\CompanyAdmin\DepositController@create')->name('Deposit.create');
Route::post('companyAdmin/storeDeposit', 'App\Http\Controllers\CompanyAdmin\DepositController@store')->name('Deposit.store');

 
// bankAdmin 
Route::get('bankAdmin/viewTransactions', 'App\Http\Controllers\BankAdmin\ViewTransactionController@show')->name('viewTransacion.show');
Route::get('bankAdmin/viewDeposits', 'App\Http\Controllers\BankAdmin\ViewDepositController@show')->name('viewDeposit.show');
Route::get('bankAdmin/EditDeposits/{id}', 'App\Http\Controllers\BankAdmin\EditDepositController@showDeposit')->name('EditDeposit.showDeposit');
Route::post('bankAdmin/ApprovedDeposits/{id}', 'App\Http\Controllers\BankAdmin\EditDepositController@Approve')->name('EditDeposit.Approve');
Route::post('bankAdmin/RejectedDeposits/{id}', 'App\Http\Controllers\BankAdmin\EditDepositController@Reject')->name('EditDeposit.Reject');
Route::get('bankAdmin/AddCashin', 'App\Http\Controllers\BankAdmin\AddTransactionController@cashIn')->name('AddCashin.cashIn');
Route::post('bankAdmin/AddCashin/store', 'App\Http\Controllers\BankAdmin\AddTransactionController@storeCashin')->name('AddCashin.storeCashin');
Route::get('bankAdmin/AddCashout', 'App\Http\Controllers\BankAdmin\AddTransactionController@cashOut')->name('AddCashout.cashOut');
Route::post('bankAdmin/AddCashout/store', 'App\Http\Controllers\BankAdmin\AddTransactionController@storeCashout')->name('AddCashout.storeCashout');



require __DIR__.'/auth.php';
