@extends('theme.layouts.landing')

@section('content')
    
<!-- Document Wrapper -->
<div id="wrapper" class="clearfix">

@include('theme.partials.header')

@php
    $page->template ? $template = $page->template->template : $template = $page->slug;
    $path = 'theme.templates.' . $template;

    $file_path = resource_path('views/theme/templates/'.$template.'.blade.php'); 
            
@endphp

        @if(file_exists($file_path))
            @include($path)
        @else

            <div class="clear my-3 py-3"></div>
            {!! $page->content !!}
        @endif
<div class="gci-divider mb-5"></div>        
@include('theme.partials.subcontent')
@include('theme.partials.keyword-links')
@include('theme.partials.footer')

</div> <!-- #wrapper end -->

<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up"></div>

@endsection