@extends('layouts.application')
@section('content')
.container
  .row
    .col-12
      %h2.text-center Tasks
      %br
      %a{href: action("TasksController@create"), class: 'btn btn-success justify-content-end'} New task
      %br
      .row.justify-content-center
        %table.table.table-hover
          %thead
            %tr
              %th Name
              %th Description
              %th Priority
              %th Identificator
          %tbody
            @foreach($tasks as $task)
            %tr
              %td
                %a{href: action("TasksController@show", ["id" => $task->id])}= $task->name
              %td= $task->description
              %td= $task->priority
              %td= $task->slug
            @endforeach
@stop
