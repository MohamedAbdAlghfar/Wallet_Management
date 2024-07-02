<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Bank;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory 
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $min = 1000; 
        $max = 999999; 
        
        $random_int = rand($min, $max);
        $companyid = Company::all()->random()->id;
        $bankid = Bank::all()->random()->id;
        $random_number = random_int(0, 2);
        $balance_before = rand($min, $max);
        $type = random_int(1, 3);
        if($type == 2)
        $balance_after = $balance_before - $random_int;
        else
        $balance_after = $balance_before + $random_int;
        if($type == 3)
        $status = $random_number;
        else
        $status = 1;
        return [
            
            'amount' => $random_int,  
            'type' => $type,
            'company_id' => $companyid,
            'bank_id'=> $bankid,
            'status'=> $status,
            'balance_after'=> $balance_after,
            'balance_before'=> $balance_before,

        ];
    }
}
