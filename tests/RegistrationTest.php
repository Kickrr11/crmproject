<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testNewUserRegistration()
    {
        $this->visit('registration')
            ->type('bobbbbb', 'usernname')
            ->type('hello1@in.comm', 'email')
            ->type('hello1', 'password')
            ->type('hello1', 'password')
            ->press('Submit')
            ->seePageIs('/dashboard');
    }
}
