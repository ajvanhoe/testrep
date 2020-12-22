<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $landing_keywords }}</title>
    @if($page->metatags)<meta name="description" content="{{str_replace(['SEO1'],[$landing_keywords],$page->metatags->description)}}">
    <meta name="keywords" content="{{$page->metatags->keywords}}">
    <meta name="robots" content="{{$page->metatags->robots}}">
    @endif
    
    <meta name="theme-color" content="#C79569">
    <meta name="page-topic" content="Law and Government, Economic Advisory Company">
    <meta name="author" content="Maxdesign">
    <meta name="publisher" content="Maxdesign Belgrade Serbia"> 
    <!-- <meta name="revisit-after" content="5 days">
    <meta name="coverage" content="worldwide">
    <meta name="distribution" content="global"> -->
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">   

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('fonts')

    <!-- Styles -->
    @yield('styles')

</head>
<body>
    <div id="app" class="animated fadeIn delay-1s">
            @include('themes.citizenship.partials.header')
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>

@yield('scripts')
</body>
</html>
