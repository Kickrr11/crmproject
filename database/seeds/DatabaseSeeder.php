<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Country;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call('CountryTableSeeder');

        $this->command->info('User table seeded!');	
    }
}

class CountryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('countries')->delete();

        Country::create(['name' => 'China', 'description' => 'Asia']);
    }

}
