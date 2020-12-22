@extends('theme.layouts.article')

@section('content')
    
<!-- Document Wrapper -->
<div id="wrapper" class="clearfix">

@include('theme.partials.header')

		<!-- Page Title -->
		<section id="page-title">
			<div class="container clearfix" >
				<h1>{{$article->title}}</h1>
				<span>GCI News</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="{{route('articles')}}">News</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
				</ol>
			</div>
        </section> <!-- #page-title end -->
        


<!-- Content -->
<section id="content" >
	@include('theme.templates.article')
</section> <!-- #content end -->

    @include('theme.partials.footer')

</div> <!-- #wrapper end -->

<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up"></div>

@endsection