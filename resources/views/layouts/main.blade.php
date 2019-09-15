<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'SQLite testarea')</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<div class="container">
  
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong>&nbsp;&nbsp;{{ session()->get('message') }}
        </div>
    @endif

    @yield('content')
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>