<!-- Footer -->
<footer id="footer" class="gci-dark">

    <div class="container">

    	<!-- Footer Widgets -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_one_third">

							<div class="widget clearfix">

								<h4><span> ASISP LTD.</span></h4>
								<p>Contact us today and get the best price with our assistance.</p>

								<div style="background: url('vendor/canvas/images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>Headquarters:</strong><br>
                                        Menara Citibank, Level 36,<br>
                                        165, Jalan Ampang<br>
                                        50450 Kuala Lumpur, Malaysia<br>
									</address>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> +66 990 918 357<br>
									<abbr title="Viber"><strong>Viber:</strong></abbr> +678 535 7130
								</div>

							</div>
							
						</div>

						<div class="col_one_third">

							<div class="widget widget_links clearfix">

								<h4><span class="gci-text">Buy gold</span></h4>

								<ul>
									@foreach($navbar_pages as $navbar_page)
									<li><a href="{{route('main', ['slug' => $navbar_page->slug])}}">{{$navbar_page->title}}</a></li>
									@endforeach
								</ul>

							</div>

						</div>

						<div class="col_one_third col_last">

							<div class="widget clearfix">
								<h4><span class="gci-text">Recent Articles</span></h4>

								<div id="post-list-footer">

								@foreach($posts as $post)
									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="{{route('articles', $post->slug)}}">{{$post->title}}</a></h4>
											</div>
											<ul class="entry-meta">
												<li>{{$post->created_at}}</li>
											</ul>
										</div>
									</div>
								@endforeach
								
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix" style="margin-bottom: -20px;">
							<div class="row">
								<div class="col-lg-12 bottommargin-sm">
									 <!-- Logo  -->
									 <div id="footer-logo">
										<a href="{{route('welcome')}}" class="standard-logo" data-dark-logo="{{asset('theme/images/gci-global-footer.png')}}"><img src="{{asset('theme/images/logo/asisp-logo.png')}}" alt="ASISP Logo"></a>
										
            						</div><!-- #logo end -->
								</div>
							</div>
						</div>

						<div class="widget clearfix">
							<div class="row">
							    <div class="col-lg-2 clearfix bottommargin-sm">
							       <img src="{{asset('theme/images/asisp/logo-thumb.png')}}" alt="asisp btc">
							    </div>
								<div class="col-lg-10 clearfix bottommargin-sm">
								    <span>In special cases, from our trusted clients we accept Bitcoin as payment.</span>
								</div>
							</div>
						</div>

						<!-- <div class="widget clearfix">
							<div class="row">
								<div class="col-lg-6 clearfix bottommargin-sm">
								<a href="{{route('brochure')}}" target="__blank">Download Brochure</a>	
								</div>
							</div>
						</div> -->

					</div>

				</div><!-- .footer-widgets-wrap end -->
 

    </div>
   @include('theme.partials.tcme-footer')
   @include('theme.partials.subfooter')

</footer><!-- #footer end -->