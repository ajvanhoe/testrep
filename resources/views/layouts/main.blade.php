<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if($page->title === 'Home'){{ config('app.name', 'Maxdesign') }} @else {{ $page->title }} @endif | GCI - Global Citizenship Investment</title>
    @if($page->metatags)<meta name="description" content="{{str_replace(['SEO1'],[$page->title],$page->metatags->description)}}">
    <meta name="keywords" content="{{$page->metatags->keywords}}">
    <meta name="robots" content="{{$page->metatags->robots}}">
    @endif

    <meta name="page-topic" content="Design">
    <meta name="author" content="Maxdesign">
    <meta name="publisher" content="Maxdesign Belgrade Serbia"> 
    <!-- <meta name="revisit-after" content="5 days">
    <meta name="coverage" content="worldwide">
    <meta name="distribution" content="global"> -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">   

     <!-- Global site tag (gtag.js) - Google Analytics -->
     @include('themes.citizenship.partials.gtags')
     
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('fonts')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     @yield('styles')

</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
