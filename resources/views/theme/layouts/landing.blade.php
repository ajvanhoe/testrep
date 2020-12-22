<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$keywords->title}} | GCI - Global Citizenship Investment</title>
    @if($page->metatags)
    <meta name="description" content="{{str_replace(['SEO1'],[$keywords],$page->metatags->description)}}">
    <meta name="keywords" content="{{str_replace(['SEO1'],[$keywords],$page->metatags->keywords)}}">
    <meta name="robots" content="{{$page->metatags->robots}}">
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('theme/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('theme/favicon.ico')}}" type="image/x-icon">   
    <link href="{{asset('images/mobiletouch-gci.png')}}" rel="apple-touch-icon" />

    @include('theme.partials.metatags')
    @include('theme.partials.gtags')

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" /> -->
    @yield('fonts')    

    <!-- Styles -->
    @include('theme.partials.styles')
    
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
