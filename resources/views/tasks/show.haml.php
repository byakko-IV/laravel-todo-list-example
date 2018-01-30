@extends('layouts.application')
@section('content')
.container
  .row
    .col
      .card.w-75
        .card-body
          %h4.card-title= $task->name
          %p.card-text= $task->description
          %p= asset('storage/app/'.$task->image)
          %img{src: asset('store/'.$task->image) }
          %a.btn.btn-success{href: action("TasksController@index")} Back
          %a.btn.btn-primary{href: action("TasksController@edit", ["id" => $task->id])} Edit
          {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'delete']) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
  .row
    .col
      .card.w-75
        .card-body
          %h2 Add a comment
          {!! Form::open(['route' => 'comments.store', 'method' => 'post']) !!}
          .form-group
            {!! Form::label('description', 'comment', ['class' => 'control-label']) !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
          .form-group
            {!! Form::hidden('task_id', $task->id) !!}
            {!! Form::submit('save', ['class' => 'btn btn-default']) !!}
          {!! Form::close() !!}
        .card-body
        @foreach($task->comments as $comment)
        .alert.alert-primary
          .col-9
            %p= $comment->description
          .col-3
            {!! Form::model($comment, ['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endforeach
@endsection
