<?php

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        DB::table('notes')->delete();

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('notes')->insert([
            'account_id'  => 1,
            'user_id'     => 1,
            'name'        => $faker->name,
            'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'created_at'  => new DateTime(),
            'updated_at'  => new DateTime(), ]);
        }
    }
}
