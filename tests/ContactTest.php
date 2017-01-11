<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use repositories\ContactRepoInterface;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\ApiContactController;
use Mockery as m;

class ContactTest extends TestCase
{

	 
    use WithoutMiddleware;
	 
    public function setUp()
    {
        parent::setup();
        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
	
        // IoC container
        $this->contactRepository = m::mock('repositories\ContactRepoInterface');
        $this->app->instance('repositories\ContactRepoInterface', $this->contactRepository);

    }
    public function tearDown()
    {
         m::close();
        parent::tearDown();
    }  
    public function testContactIndex()
    {
	$repository = $this->contactRepository;
	$repository->shouldReceive('selectAll')->once();
	$response = $this->call('GET','/api/contacts');
	$this->assertEquals(200, $response->getStatusCode());
    }
	
    public function testgetbyId()
    {

	$repository = $this->contactRepository;
	$repository->shouldReceive('getbyId')->once();
	
	$response= $this->call('GET', '/api/contacts/1');
	$this->assertEquals(200, $response->getStatusCode());
	  
    }
  
    public function testStoreContactSuccess()
    {
        Input::replace($input = ['firstname' => 'Foo Name', 'lastname' => 'Foo description','email' => 'test11@gmail.com','accountid'=>1, 'userid'=>1]);
	$repository = $this->contactRepository;	
        $repository->shouldReceive('store')->once();
	$response= $this->call('POST', '/api/contacts',$input);
	$this->assertEquals(201, $response->getStatusCode());

    }

    public function testUpdateContact() {
		
	Input::replace($input = ['firstname' => 'Foo Name','lastname' => 'Foo description','email' => 'test11@gmail.com','accountid'=>1, 'userid'=>1]);
	$id = array('id'=>1);
	$repository = $this->contactRepository;
        
        $repository->shouldReceive('update')->once()->andReturn();		
	$response= $this->call('PUT', 'api/contacts/1',$input,$id);
	$this->assertEquals(200, $response->getStatusCode());
		
	}
	
    public function testDeleteContact()
    {
        
        $repository = $this->contactRepository;
		
        $repository->shouldReceive('destroy')->once();		
	$response= $this->call('DELETE', '/api/contacts/15');
	$this->assertEquals(200, $response->getStatusCode());
		
    }
  
}
