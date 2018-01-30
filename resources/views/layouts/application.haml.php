!!! 5
%html{:lang => "en"}
  %head
    %meta{:charset => "UTF-8"}
    %title Mi app con laravel
    {{ Html::style('css/bootstrap.min.css') }}
  %body
    .container-fluid
      @yield('content')
