<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
  use RefreshDatabase;

  public function testStore()
  {
    $comment = factory(\App\Comment::class)->create();
    $response = $this->post('/comments', [
      '_token' => csrf_token(),
      'description' => $comment->description,
      'task_id' => $comment->task_id
    ]);
    $response->assertStatus(302);
  }

  public function testDestroy()
  {
    $comment = factory(\App\Comment::class)->create();
    $task = $comment->task;
    $response = $this->delete('/comments/'.$comment->id);
    $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    $response->assertStatus(302);
  }
}
