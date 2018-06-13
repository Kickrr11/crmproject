<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Mockery as m;

class NoteTest extends TestCase
{
    /*
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
        $this->noteRepository = m::mock('repositories\NoteRepoInterface');
        $this->app->instance('repositories\NoteRepoInterface', $this->noteRepository);
    }

    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    public function testStoreSuccess()
    {
        Input::replace($input = ['name' => 'Foo Name', 'description' => 'Foo description', 'accountid'=>1, 'userid'=>1, 'doc'=>'file.jpg']);
        $repository = $this->noteRepository;
        $repository->shouldReceive('store')->once();
        $response = $this->call('POST', '/api/notes', $input);
        $this->assertEquals(201, $response->getStatusCode());
    }

    //TODO
    public function testUpdateNote()
    {
        Input::replace($input = ['name' => 'Foo Name', 'description' => 'Foo description']);
        $id = ['id'=>4];
        $repository = $this->noteRepository;
        $repository->shouldReceive('update')->once();
        $response = $this->call('PUT', 'api/notes/1', $input, $id);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDeleteNote()
    {
        $repository = $this->noteRepository;
        $repository->shouldReceive('destroy')->once();
        $response = $this->call('DELETE', '/api/notes/2');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
