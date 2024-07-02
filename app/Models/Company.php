<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'id',
        'name',   
        'email',
        'password',
        'balance',
   

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

    public function Banks() {
        return $this->belongsToMany('App\Models\Bank')->withPivot('account_number');
    }

    

}
