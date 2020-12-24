<section id="slider" class="slider-element slider-parallax" style="background: url('{{asset('theme/images/asisp/asisp-zibres.jpg')}}'); background-size: cover;" data-height-xl="670" data-height-lg="500" data-height-md="400" data-height-sm="250" data-height-xs="200">
    <div class="slider-parallax-inner">
        <div class="container clearfix">
            <div class="vertical-middle center">

                <div class="nobottomborder center">
					<div class="top-block py-3 my-3">
						<h1 class="mt-4">Contact Us</h1>
						    <h3>
							<div class="text-rotater" data-separator="|" data-rotate="flipInX" data-speed="3500">
							<span class="str-text">We make your Business</span> <span class="t-rotate str-text">Simple|Flexible|Easy|Profitable</span>
							</div>
					        </h3>
					</div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="promo promo-full promo-border header-stick bottommargin-lg">
            <div class="container clearfix">
                <h3>Call us today at <span>+66 990 918 357</span> or Email us using contact form below.</h3>
                <span>We strive to provide Our Customers with Top Notch Support to make their Business Experience Wonderful</span>
                <a href="#contact-section" class="button button-reveal button-small button-rounded tright"><i class="icon-angle-right"></i><span>Contact Us</span></a>
            </div>
        </div>

        <div class="container clearfix">

        <div class="clear" id="contact-section"></div>
        
					<!-- Postcontent
					============================================= -->
					<div class="postcontent nobottommargin">

						<h3>Send us an Email</h3>

						<div class="form-widget">

							<div class="form-result">
                                @include('partials.messages')
                            </div>

							<form class="nobottommargin" id="contact-form" name="contact-form" action="{{route('send.mail')}}" method="post">
                                @csrf
								
								<div class="col_one_third">
									<label for="name">Name <small>*</small></label>
									<input type="text" id="name" name="name" class="sm-form-control" required/>
								</div>

								<div class="col_one_third">
									<label for="email">Email <small>*</small></label>
									<input type="email" id="email" name="email" class="email sm-form-control" required/>
								</div>

								<div class="col_one_third col_last">
									<label for="phone">Phone</label>
									<input type="text" id="phone" name="phone" class="sm-form-control" required/>
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="message">Message <small>*</small></label>
									<textarea class="sm-form-control" id="message" name="message" rows="6" cols="30" required></textarea>
								</div>


								<div class="col_full">
									<button class="button button-3d nomargin" type="submit" value="submit">Send Message</button>
								</div>

							</form>

						</div>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar col_last nobottommargin">

						<address>
							<strong>Headquarters:</strong><br>
							Menara Citibank, Level 36,<br>
                            165, Jalan Ampang<br>
                            50450 Kuala Lumpur, Malaysia                            
                        </address>
                        
						<abbr title="Phone Number"><strong>Phone:</strong></abbr> +66 990 918 357<br>
						<!-- <abbr title="Email Address"><strong>Email:</strong></abbr> office@citizenship-european.com  -->

                        <div class="gci-divider my-3"></div>

                        <strong>Office Phones:</strong><br>
                        <abbr title="Phone Number">Moldova:</abbr> +373 2299 9834<br>
                        <abbr title="Phone Number">Dubai:</abbr> +971 455 619 06<br> 
                        <abbr title="Phone Number">Serbia:</abbr> +381 114 404 362<br> 
                        <abbr title="Phone Number">HQ Malaysia:</abbr> +603 2169 7057<br> 
                        <abbr title="Phone Number">Viber:</abbr> +678 535 7130<br> 
 
 
 

 

						<div class="widget noborder notoppadding">

							<a href="#" class="social-icon si-small si-dark si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-dark si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="https://www.linkedin.com/company/globalcitizenshipinvestment/" class="social-icon si-small si-dark si-linkedin">
								<i class="icon-linkedin"></i>
                        		<i class="icon-linkedin"></i>
							</a>

							<a href="#" class="social-icon si-small si-dark si-forrst">
								<i class="icon-forrst"></i>
								<i class="icon-forrst"></i>
							</a>

							<a href="#" class="social-icon si-small si-dark si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-dark si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>


						</div>

					</div><!-- .sidebar end -->

				</div>
	</div>

</section><!-- end content -->
