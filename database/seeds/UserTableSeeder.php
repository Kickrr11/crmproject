<?php

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
            'username'   => $faker->username,
            'email'      => $faker->email,
            'password'   => Hash::make('secret'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(), ]);
        }
    }
}
