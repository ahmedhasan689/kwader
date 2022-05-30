<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        User::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Hasan',
            'email' => 'employer@test.com',
            'email_verified_at' => Carbon::now(),
            'phone_number' => '0587474741',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'user_type' => 'Employer',
        ]);

        User::create([
            'first_name' => 'Yazan',
            'last_name' => 'Ahmed',
            'email' => 'employee@test.com',
            'email_verified_at' => Carbon::now(),
            'phone_number' => '0587474743',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'user_type' => 'Employee',
        ]);
    }
}
