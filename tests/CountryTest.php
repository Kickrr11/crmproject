<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use repositories\AccountRepoInterface;


use Mockery as m;

class CountryTest extends TestCase
{
    
    use WithoutMiddleware;
	
    private $countryRepository;
    
    public function setUp()
    {
         parent::setup();
   	Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
	
        // IoC container
        $this->countryRepository = m::mock('repositories\CountryRepoInterface');
        $this->app->instance('repositories\CountryRepoInterface', $this->countryRepository);

    }
    public function tearDown()
    {
      m::close();
      parent::tearDown();
    }
    
    public function testIndex()
    {

	$repository = $this->countryRepository;

	$repository->shouldReceive('selectAll')->once()->andReturn([]);
	  
	$response = $this->call('GET','/api/countries');

	$this->assertEquals(200, $response->getStatusCode());

    }
  
    public function testgetbyId() {

	$repository = $this->countryRepository;
	$repository->shouldReceive('getbyId')->once()->andReturn ([]);

	$response= $this->call('GET', '/api/countries/1');
	$this->assertEquals(200, $response->getStatusCode());
	  
    }
  
    public function testStoreSuccess()
    {
        Input::replace($input = ['name' => 'Foo Title', 'description' => 'Foo description']);
	$repository = $this->countryRepository;
		
        $repository->shouldReceive('store')->once()->andReturn('Country created');
 
	$response= $this->call('POST', '/api/countries',$input);
		
        $this->assertEquals(201, $response->getStatusCode());
		
    }
	
    public function testUpdateAccount() {
		
	Input::replace($input = ['name' => 'Foo Name','description' => 'Foo description']);
	$id = array ('id'=>1);
	$repository = $this->countryRepository;
		
        $repository->shouldReceive('update')->once()->andReturn('Country updated');
		//TODO
	$response= $this->call('PUT', 'api/countries/1',$input,$id);
	$this->assertEquals(200, $response->getStatusCode());
		
	}

    public function testDeleteCountry() {
		
	$repository = $this->countryRepository;
		
        $repository->shouldReceive('destroy')->once()->andReturn('Country deleted');
		
	$response= $this->call('DELETE', '/api/countries/2');
	$this->assertEquals(200, $response->getStatusCode());
		
    }
	
		
    public function testCountriesAccounts() {


        $repository = $this->countryRepository;
		
        $repository->shouldReceive('countryAccounts')->once();
		
	$response= $this->call('GET', '/api/countries/1/accounts');
	$this->assertEquals(200, $response->getStatusCode());
	  
	}


}

