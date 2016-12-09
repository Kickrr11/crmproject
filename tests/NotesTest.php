<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Account;
use App\Note;
use App\User;

class NotesTest 
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testViewNotes()
    {	
	
		$user = User::find(1);
		$this->be = $user;
		$account = Account::find(30);
		
		$note = factory (Note::class)->make(['name'=>'testnote11','description'=>'testnote11']);
		$note->account()->associate($account);
		
		$note->user()->associate($user)->save();
		
        $this->visit('/accounts/30')
             ->see('testnote11');
			
    }
}
