<?php

Route::get('/', 'TasksController@index');
Route::resource('tasks', 'TasksController');
Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
