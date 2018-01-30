<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
  use RefreshDatabase;

  public function testIndex()
  {
    $response = $this->get('/tasks');
    $response->assertStatus(200);
  }

  public function testCreate()
  {
    $response = $this->get('/tasks/create');
    $response->assertStatus(200);
  }

  public function testShow()
  {
    $task = factory(\App\Task::class)->create();
    $response = $this->get('/tasks/'.$task->id);
    $response->assertStatus(200);
    $response->assertViewIs('tasks.show');
  }

  public function testEdit()
  {
    $task = factory(\App\Task::class)->create();
    $response = $this->get('/tasks/'.$task->id.'/edit');
    $response->assertStatus(200);
    $response->assertViewIs('tasks.edit');
  }

  public function testStore()
  {
    $task = factory(\App\Task::class)->create();
    $response = $this->post('/tasks', array(
      '_token' => csrf_token(),
      'name' => $task->name,
      'description' => $task->description,
      'priority' => $task->priority,
      'slug' => $task->slug
    ));
    $response->assertStatus(302);
    $response->assertRedirect('tasks/'.\App\Task::all()->last()->id);
  }

  public function testUpdate()
  {
    $task = factory(\App\Task::class)->create();
    $response = $this->put('/tasks/'.$task->id, array(
      '_token' => csrf_token(),
      'name' => 'laravelitos',
      'description' => $task->description,
      'priority' => $task->priority,
      'slug' => $task->slug
    ));
    $this->assertDatabaseHas('tasks', [
      'name' => 'laravelitos'
    ]);
    $response->assertStatus(302);
  }

  public function testDestroy()
  {
    $task = factory(\App\Task::class)->create();
    $response = $this->delete('/tasks/'.$task->id);
    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    $response->assertStatus(302);
  }
}
