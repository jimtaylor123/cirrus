<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Customer;
use App\Models\MonthlyUsage;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // foreach customer create between 1 and 5 accounts
        $customers = Customer::factory(10)->create();

        foreach($customers as $customer){
            Account::factory(rand(1,5))->create([
                'customer_id' => $customer->id
            ]);
        }

        // foreach account create 24 monthly usage records for the previous 2 years
        foreach($customers as $customer){
            foreach($customer->accounts as $account){

                $date = now()->subYears(2);
                $today = now();
                
                while($date < $today){
                    MonthlyUsage::factory()->create([
                        'account_id' => $account->id,
                        'year' => $date->year,
                        'month' => $date->month,
                    ]);
                    $date->addMonth();
                }
            }
        }
    }
}
