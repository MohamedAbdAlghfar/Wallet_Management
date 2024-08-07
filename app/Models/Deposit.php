<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'amount', 
        'status',
        'photo',
        'company_id', 
        'bank_id',

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
