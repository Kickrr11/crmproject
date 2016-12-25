<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');

            
            $table->string('email', 255);
			$table->string('username', 255);
            $table->string('password',255);
            $table->timestamps();
			$table->string('remember_token',255);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
