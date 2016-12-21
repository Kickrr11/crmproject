<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Account;
use Illuminate\Http\Request;
use repositories\AccountRepoInterface;
use Mockery as m;

class AccountTest extends TestCase
{
    
    use WithoutMiddleware;
    
    private $accountRepository;
    
  public function setUp()
  {
    parent::setup();
   
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
    $response = $this->call('GET', 'accounts');
    $this->assertResponseOk($response);
    $this->assertViewHas('accounts');
  }
	
	
}
