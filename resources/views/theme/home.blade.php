@extends('theme.layouts.main')
@section('content')
    
<!-- Document Wrapper -->
<div id="wrapper" class="clearfix">

@include('theme.partials.header')
<!-- Content -->
@include('theme.templates.home')
@include('theme.partials.keyword-links')


 @include('theme.partials.footer')

</div> <!-- #wrapper end -->

<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up"></div>

@endsection