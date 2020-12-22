<!-- Header
============================================= -->
<header id="header" class="full-header transparent-header dark static-sticky" data-sticky-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="100"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo  -->
            <div id="logo">
                <a href="{{route('welcome')}}" class="standard-logo" data-dark-logo="{{asset('theme/images/logo/logo-asisp.png')}}"><img src="{{asset('theme/images/logo/logo-asisp.png')}}" alt="ASISP Logo"></a>
				<a href="{{route('welcome')}}" class="retina-logo" data-dark-logo="{{asset('theme/images/logo/logo-asisp.png')}}"><img src="{{asset('theme/images/logo/logo-asisp.png')}}" alt="ASISP Logo"></a>
            </div><!-- #logo end -->
                                                                                                      
            @include('theme.partials.navbar')
        </div>
    </div>
</header><!-- #header end -->