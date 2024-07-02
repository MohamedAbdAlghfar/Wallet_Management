<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [  
        'name',
        'email',
        'password',   
  

    ];

    public function Deposits() 
    {
        return $this->hasMany('App\Models\Deposit');
    }

    public function Transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function Users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function Companies() {
        return $this->belongsToMany('App\Models\Company')->withPivot('account_number');
    }

    public function bankCompany()
    {
        return $this->belongsToMany(Company::class, 'bank_company', 'bank_id', 'company_id')
                    ->withPivot('account_number');
    }

}
