<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            $customer = new Customer;
            $customer->name = $Faker->name;
            $customer->email = $Faker->email;
            $customer->gender = 'M';
            $customer->dob = $Faker->date;
            $customer->password = $Faker->password;
            $customer->password_confirmation = $Faker->password;
            $customer->save();
        }


    }
}
