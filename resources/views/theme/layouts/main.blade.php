<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!$page->slug || $page->slug=='' || $page->slug === 'home') Buy Gold  @else {{ $page->title }} @endif | African Sovereign Investment Strategic Partners Ltd</title>
    @if($page->metatags)
    <meta name="description" content="{{str_replace(['SEO1'],[$page->title],$page->metatags->description)}}">
    <meta name="keywords" content="{{str_replace(['SEO1'],[$page->title],$page->metatags->keywords)}}">
    <meta name="robots" content="{{$page->metatags->robots}}">
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('theme/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('theme/favicon.ico')}}" type="image/x-icon">   
    <link href="{{asset('theme/mobiletouch-gci.png')}}" rel="apple-touch-icon" />

    @include('theme.partials.metatags')
    @include('theme.partials.gtags')
    @yield('jsonld')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> -->

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
