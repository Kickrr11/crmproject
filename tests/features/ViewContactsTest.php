<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Account;
use App\Contact;
use App\User;

class ViewContactsTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testViewContacts()
    {	

		$account = Account::find(30);
		$user = User::find(2);
		$contact = factory (Contact::class)->make(['firstname'=>'johndoe','lastname'=>'johnd','email'=>'gg@gg.com']);
		$contact->account()->associate($account);
		$contact->user()->associate($user);
		$contact->save();
        $this->visit('/contview/22')
             ->see('johndoe');
    }
	
	public function testDeleteMethod() {
        $response = $this->call('DELETE', 'contdelete/26');
        $this->assertEquals(302, $response->getStatusCode());
        $this->notSeeInDatabase('contacts', ['deleted_at' => null, 'id' => 26]);
	}
	
	
}
