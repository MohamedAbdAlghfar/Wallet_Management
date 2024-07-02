<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Bank;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deposit>
 */
class DepositFactory extends Factory
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
        $random_number = random_int(0, 2);
        $companyid = Company::all()->random()->id;
        $bankid = Bank::all()->random()->id;

        return [
            
            'amount' => $random_int,  
            'status' => $random_number,
            'photo' => $this->faker->randomElement(['1.jpeg','2.jpg','3.jpg','4.jpg',]),
            'company_id' => $companyid,
            'bank_id'=> $bankid,

        ];
    }
}
