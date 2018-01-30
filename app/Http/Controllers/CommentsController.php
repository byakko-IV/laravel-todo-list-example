<?php

namespace App\Http\Controllers;
use App\Comment;

use Illuminate\Http\Request;

class CommentsController extends Controller
{

  public function store(Request $request)
  {
    $comment = Comment::create($request->all());
    return redirect()->action('TasksController@show', $comment->task->id); 
  }

  public function destroy($id)
  {
    $comment = Comment::find($id);
    $task = $comment->task;
    $comment->delete();
    return redirect()->action('TasksController@show', $task->id);
  }
}
