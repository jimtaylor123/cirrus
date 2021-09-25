<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\MonthlyUsage;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonthlyUsageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MonthlyUsage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => Account::inRandomOrder()->first()->id,
            'month' => $this->faker->month,
            'year' => $this->faker->year,
            'currency' => 'USD',
            'cents' => $this->faker->numberBetween(100, 100000)
        ];
    }
}
