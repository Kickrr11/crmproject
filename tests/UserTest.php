<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use repositories\UserRepoInterface;
use App\Http\Controllers\Api\ApiUserController;
use Mockery as m;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	 
    use WithoutMiddleware;
	 
    public function setUp()
    {
    
        parent::setup();
   	Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
	
    // IoC container
        $this->userRepository = m::mock('repositories\UserRepoInterface');
        $this->app->instance('repositories\UserRepoInterface', $this->userRepository);

    }
    public function tearDown()
    {
      m::close();
        parent::tearDown();
    }  
    
    public function testUserIndex()
    {
	$repository = $this->userRepository;
	$repository->shouldReceive('selectAll')->once();

        $response = $this->call('GET','/api/users');

	$this->assertEquals(200, $response->getStatusCode());
    }

    public function testgetbyId() {

	$repository = $this->userRepository;

	$repository->shouldReceive('getbyId')->once();
	$response= $this->call('GET', '/api/users/1');
	$this->assertEquals(200, $response->getStatusCode());
	  
    } 


    public function testUpdateUser() {
		
	Input::replace($input = ['username' => 'Foo Name','email' => 'test11@gmail.com']);
	$id = array('id'=>1);
	$repository = $this->userRepository;
	
        $repository->shouldReceive('update')->once()->andReturn();
		
	$response= $this->call('PUT', 'api/users/1',$input,$id);
	$this->assertEquals(200, $response->getStatusCode());
		
	}

	public function testDeleteUser() {
		
            $repository = $this->userRepository;		
            $repository->shouldReceive('destroy')->once();		
            $response= $this->call('DELETE', '/api/users/15');
            $this->assertEquals(200, $response->getStatusCode());
		
	}

}

