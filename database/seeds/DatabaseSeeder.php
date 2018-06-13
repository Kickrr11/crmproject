<?php

use App\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

class CountryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->delete();

        Country::create(['name' => 'China', 'user_id'=>1, 'description' => 'Asia']);
    }
}
