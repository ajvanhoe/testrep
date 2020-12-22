<div class="content-wrap">

	<div class="container clearfix">

        <!-- Post Content -->
        <div class="postcontent nobottommargin clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post -->
                <div class="entry clearfix">
                @if(isset($article))
                    <!-- Entry Meta -->
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> {{$article->created_at}}</li>
                    </ul><!-- .entry-meta end -->

                    <!-- Entry Image -->
                    <div class="entry-image">
                        @if($article->image)
                        <a href="{{asset('images/posts/'.$article->image)}}" data-lightbox="image"><img src="{{asset('images/posts/'.$article->image)}}" alt="{{$article->image}}"></a>
                        @endif
                    </div><!-- .entry-image end -->

                    <!-- Entry Content -->
                    <div class="entry-content notopmargin">
                    {!! $article->post !!}
					<!-- Post Single - Content End -->
              
                    <div class="clear"></div>

                            <!-- Post Single - Share
                            ============================================= -->
                            <div class="si-share noborder clearfix">
                                <span>Share this Post:</span>
                                <div>
                                    <a href="#" class="social-icon si-borderless si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-pinterest">
                                        <i class="icon-pinterest"></i>
                                        <i class="icon-pinterest"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-rss">
                                        <i class="icon-rss"></i>
                                        <i class="icon-rss"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email3"></i>
                                    </a>
                                </div>
                            </div><!-- Post Single - Share End -->
                            
                    </div> <!-- .entry content end -->
                    @endif
           
                    </div><!-- .entry end -->
                     
                    <!-- Post Navigation -->
				    <div class="post-navigation clearfix">

                            <div class="col_half nobottommargin">
                                <a href="{{route('articles')}}">&lArr; Back to news</a>
                            </div>

                    </div><!-- .post-navigation end -->
	
            </div>

        </div><!-- .postcontent end -->

        <!-- Sidebar -->
        <div class="sidebar nobottommargin col_last clearfix">
            <div class="sidebar-widgets-wrap">

            </div>
        </div><!-- .sidebar end -->

    </div>

</div>
