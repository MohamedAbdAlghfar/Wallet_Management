<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCompany extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'bank_company';

    // Define the fillable attributes if you plan to use mass assignment
    protected $fillable = [
        'company_id',
        'account_number',
        'bank_id',
    ];

    // If you have timestamps in the pivot table, you can enable or disable them
    public $timestamps = true;

    // If your primary key is not auto-incrementing, you can define it here
    protected $primaryKey = 'id';

    // Define any additional configurations or relationships if needed
    // For example, defining relationships with Company and Bank models
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    // Define a scope to retrieve bank account numbers for a given company
    public function scopeGetAccountNumbersForCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId)->pluck('account_number', 'id')->toArray();
    }
}


