<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page->title}} | GCI - Global Citizenship Investment</title>
  
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('theme/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('theme/favicon.ico')}}" type="image/x-icon">   
    <link href="{{asset('theme/mobiletouch-gci.png')}}" rel="apple-touch-icon" />

    @include('theme.partials.gtags')

    <!-- Fonts -->
    @yield('fonts')

    <!-- Styles -->
	@include('theme.partials.styles')
    @yield('styles')

</head>
<body class="stretched">
    <div id="app">
        @yield('content')
    </div>

    <!-- External JavaScripts -->
    @include('theme.partials.javascript')
    
    @yield('scripts')
</body>
</html>
