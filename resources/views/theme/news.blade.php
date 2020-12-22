@extends('theme.layouts.news')

@section('content')
    
<!-- Document Wrapper -->
<div id="wrapper" class="clearfix">

@include('theme.partials.header')


		<!-- Page Title -->
		<section id="page-title">

			<div class="container clearfix" >
				<h1>ASISP News</h1>
				<span>Our Latest Articles</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">News</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

<!-- Content -->
<section id="content" >
	@include('theme.templates.news')
</section> <!-- #content end -->

    @include('theme.partials.footer')

</div> <!-- #wrapper end -->

<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up"></div>

@endsection