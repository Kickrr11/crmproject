<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testUserLogin()   {
 
        $this->visit('login')
            
            ->type('gladyce.heller@example.org', 'email')
            ->type('secret', 'password')
            
            ->press('Submit')
            ->seePageIs('/dashboard');

    }
}
