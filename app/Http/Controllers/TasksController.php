<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Task;

class TasksController extends Controller
{
  public function index()
  {
    return view('tasks.index')->with('tasks', Task::all());
  }

  public function create()
  {
    return view('tasks.create');
  }

  public function store(Request $request)
  {
    $path = $request->file('image')->store('images');
    $task = new Task($request->all());
    $task->image = $path;
    $task->save();
    return redirect()->action('TasksController@show', $task->id);
  }

  public function show($id)
  {
    return view('tasks.show')->with('task', Task::find($id));
  }

  public function edit($id)
  {
    return view('tasks.edit')->with('task', Task::find($id));
  }

  public function update(Request $request, $id)
  {
    $task = Task::find($id);
    $task->fill($request->all())->save();
    return redirect()->action('TasksController@show', $task->id);
  }

  public function destroy($id)
  {
    Task::find($id)->delete();
    return redirect()->action('TasksController@index');
  }
}
