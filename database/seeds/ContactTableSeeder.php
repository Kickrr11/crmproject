<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Contact;

class ContactTableSeeder extends Seeder {

    public function run()
    {
		
		Model::unguard();
		
        DB::table('contacts')->delete();
		
		$faker = Faker::create();
		foreach (range(1,10) as $index) {
	    DB::table('contacts')->insert([
			'account_id' => 1,
			'user_id' => 1,
	        'firstname' => $faker->firstName($gender = null|'male'|'female'),
			'lastname' => $faker->lastName,
			'email' => $faker->email,
			'skype' => $faker->username,
			'phone' => $faker->phoneNumber,
			'company' => $faker->company,
			'created_at' => new DateTime,
            'updated_at' => new DateTime]);

		}

	}
	
}