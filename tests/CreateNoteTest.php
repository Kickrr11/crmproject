<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Account;
use App\Note;

class CreateNoteTest 
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testNewNote()
    {
		$account = Account::find(30);

		$note = factory (Note::class)->make(['name'=>'johndoe','description'=>'johnd']);
		$note->account()->associate($account);
		
        $this->visit('/accounts/23')
             ->see('johnd');
		
	
    }
}
