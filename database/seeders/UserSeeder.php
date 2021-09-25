<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create main dev user
        User::factory()->create([
            'name' => "Jim Taylor",
            'email' => 'jim@jimtaylor.space',
            'password' => Hash::make('Password123'),
            'email_verified_at'=>now(),
        ]);

        User::factory(10)->create();
    }
}
