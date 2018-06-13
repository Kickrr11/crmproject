<?php

use App\Account;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        DB::table('account')->delete();

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('account')->insert([
            'country_id'  => 1,
            'user_id'     => 1,
            'name'        => $faker->company,
            'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'street'      => $faker->streetName,
            'city'        => $faker->city,
            'country'     => $faker->country,
            'zip'         => $faker->postcode,
            'phone'       => $faker->phoneNumber,
            'created_at'  => new DateTime(),
            'updated_at'  => new DateTime(), ]);
        }
    }
}
