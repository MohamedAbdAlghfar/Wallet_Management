<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Bank;
use App\Models\Deposit;
use App\Models\Transaction; 
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();





       $banks = Bank::factory(5)->create();
       $companies = Company::factory(10)->create();
        User::factory(50)->create();
        Deposit::factory(15)->create();
        Transaction::factory(35)->create();
        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'SuperAdmin@gmail.com',
            'role' => 1,
            'password' => 12345678,
            'bank_id' => Null,
            'company_id' => Null,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Bank Admin',
            'email' => 'BankAdmin@gmail.com',
            'role' => 2,
            'password' => 12345678,
            'bank_id' => 3,
            'company_id' => Null,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Company Admin',
            'email' => 'CompanyAdmin@gmail.com',
            'role' => 3,
            'password' => 12345678,
            'bank_id' => Null,
            'company_id' => 1,
        ]);

        foreach ($banks as $bank) {
            $companies = Company::inRandomOrder()->limit(3)->get();
            
            foreach ($companies as $company) {
                $pass_course = random_int(-1, 1); 
                $acountNumber = random_int(00000000000000, 99999999999999);    
                $bank->Companies()->attach($company, [
                    'account_number' => $acountNumber, 
                ]);
            }
        }



    }
}
