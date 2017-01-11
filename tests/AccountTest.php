<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Account;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use repositories\AccountRepoInterface;
use Mockery as m;

class AccountTest extends TestCase
{
    
    use WithoutMiddleware;
	
    private $accountRepository;
    
    public function setUp()
    {
        parent::setup();
        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
	
        // IoC container
        $this->accountRepository = m::mock('repositories\AccountRepoInterface');
        $this->app->instance('repositories\AccountRepoInterface', $this->accountRepository);

    }
    
    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }
    
    public function testIndex()
    {

	$repository = $this->accountRepository;

	$repository->shouldReceive('selectAll')->once()->andReturn([]);
	  
	$response = $this->call('GET','/api/accounts');

	$this->assertEquals(200, $response->getStatusCode());
    }
  
    public function testgetbyId() {

	$repository = $this->accountRepository;
	$repository->shouldReceive('getbyId')->once()->andReturn ([]);

	$response= $this->call('GET', '/api/accounts/1');
	$this->assertEquals(200, $response->getStatusCode());
	  
    }
  
    public function testStoreSuccess()
    {
        Input::replace($input = ['name' => 'Foo Title', 'description' => 'Foo description']);
	$repository = $this->accountRepository;
		
        $repository->shouldReceive('store')->once()->andReturn('Account created');
 
	$response= $this->call('POST', '/api/accounts',$input);
		
        $this->assertEquals(201, $response->getStatusCode());
		
    }
	
    public function testUpdateAccount()
    {
		
	Input::replace($input = ['name' => 'Foo Name','description' => 'Foo description']);
        $id = array ('id'=>1);
        $repository = $this->accountRepository;
		
        $repository->shouldReceive('update')->once()->andReturn('Account updated');
		
	$response= $this->call('PUT', 'api/accounts/1',$input,$id);
	$this->assertEquals(200, $response->getStatusCode());
		
	}
	
    public function testAccountNotes()
    {

        $repository = $this->accountRepository;
		
        $repository->shouldReceive('accNote')->andReturn([]);		
	$response= $this->call('GET', '/api/accounts/1/notes');
	$this->assertEquals(200, $response->getStatusCode());
	  
    }

    public function testAccountContacts()
    {

        $repository = $this->accountRepository;
	$repository->shouldReceive('accCont')->once()->andReturn([]);
	$response= $this->call('GET', '/api/accounts/1/contacts');
	$this->assertEquals(200, $response->getStatusCode());
	  
    }

    public function testDeleteAccount() {
		
	$repository = $this->accountRepository;
		
        $repository->shouldReceive('destroy')->once()->andReturn('Account deleted');		
	$response= $this->call('DELETE', '/api/accounts/8');
	$this->assertEquals(200, $response->getStatusCode());
		
	}

}
