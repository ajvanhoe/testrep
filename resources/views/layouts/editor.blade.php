<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maxdesign') }}</title>
    
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">   

    <!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <!-- Javascript dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    
    <!-- TinyMCE -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/jquery.tinymce.min.js"></script> -->

    <!-- Ckeditor js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script> -->
    
    <!-- Ckeditor js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.4/ckeditor.js"></script>
    
    <!-- Grid editor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/grid-editor/dist/grideditor.css')}}" />
    <!-- Grid editor javascript -->
    <script src="{{asset('vendor/grid-editor/dist/jquery.grideditor.min.js')}}"></script>

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>

    <div id="app">
        @include('dashboard.partials.navbar-editor')
    
        <div id="wrapper">

            @include('dashboard.partials.sidebar')

            <div id="content-wrapper" class="admin-area">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div> <!-- /#wrapper -->
    </div> <!-- /#app  -->

    @yield('scripts')
</body>
</html>
