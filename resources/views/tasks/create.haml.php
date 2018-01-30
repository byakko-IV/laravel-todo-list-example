@extends('layouts.application')
@section('content')
.container
  .row
    .col-12
      %h2.text-center New Task
      %br
      .row.justify-content-center
        {!! Form::open(['route' => 'tasks.store', 'method' => 'post', 'files' => true]) !!}
        .form-group
          {!! Form::label('name', 'name', ['class' => 'control-label']) !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        .form-group
          {!! Form::label('description', 'description', ['class' => 'control-label']) !!}
          {!! Form::text('description', null, ['class' => 'form-control']) !!}
        .form-group
          {!! Form::label('priority', 'priority', ['class' => 'control-label']) !!}
          {!! Form::select('priority',['low' => 'Low', 'medium' => 'Midium', 'high' => 'High'], null, ['class' => 'form-control']) !!}
        .form-group
          {!! Form::label('image', 'image', ['class' => 'control-label']) !!}
          {!! Form::file('image', null, ['class' => 'form-control']) !!}
        .form-group
          {!! Form::hidden('slug', uniqid()) !!}
          {!! Form::submit('save', ['class' => 'btn btn-default']) !!}
        {!! Form::close() !!}
@stop
