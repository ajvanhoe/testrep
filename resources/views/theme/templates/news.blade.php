<div class="content-wrap">

	<div class="container clearfix">

		<!-- Post Content -->
		<div class="postcontent nobottommargin clearfix">

			<!-- Posts -->
			<div id="posts">

				@foreach($articles as $article)
					<div class="entry clearfix">
						<div class="entry-image">
							@if($article->image)
						<a href="{{asset('images/posts/'.$article->image)}}" data-lightbox="image"><img class="image_fade" src="{{asset('images/posts/'.$article->image)}}" alt="{{$article->image}}"></a>
							@endif
						</div>
						<div class="entry-title">
							<h2><a href="{{route('articles', $article->slug)}}">{{$article->title}}</a></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li><i class="icon-calendar3"></i> {{$article->created_at}}</li>
						</ul>
						<div class="entry-content">
						@php
							$start = strpos($article->post, '<p>');
							$end = strpos($article->post, '</p>', $start);
							$paragraph = substr($article->post, $start, $end-$start+4);
						@endphp
							{!! $paragraph !!}
							
							<a href="{{route('articles', $article->slug)}}" class="more-link">Read More</a>
						</div>
					</div>
				@endforeach

			</div><!-- #posts end -->

			<!-- Pagination	-->
			<div class="row mb-3">
				<div class="col-12">
					{{$articles->links()}}
				</div>
			</div>
			<!-- .pager end -->

		</div><!-- .postcontent end -->

		<!-- Sidebar -->
		<div class="sidebar nobottommargin col_last clearfix">
			<div class="sidebar-widgets-wrap"></div>
		</div><!-- .sidebar end -->

	</div>
</div>