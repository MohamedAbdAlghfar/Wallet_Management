<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'amount', 
        'type',
        'company_id',
        'bank_id',  
        'status',
        'balance_after',
        'balance_before',


    ];

    public function Bank()
    {
     return $this->belongsTo('App\Models\Bank');
    }

    public function Company()
    {
     return $this->belongsTo('App\Models\Company');
    }

    


}
