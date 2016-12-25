<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Country;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		Model::unguard();

		$this->call('CountryTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('AccountTableSeeder');
		$this->call('NoteTableSeeder');
		$this->call('ContactTableSeeder');
		
    }
}

class CountryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('countries')->delete();

        Country::create(['name' => 'China', 'user_id'=>1, 'description' => 'Asia']);
    }

}





