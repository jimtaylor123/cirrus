<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-52 weeks');
        return [
            'name' => $this->faker->catchPhrase(),
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
