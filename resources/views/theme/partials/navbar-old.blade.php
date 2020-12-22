<!-- Primary Navigation -->
<nav id="primary-menu">
<ul>
    @foreach($navbar_pages as $navbar_page)
    <li><a href="{{route('main', $navbar_page->slug)}}"><div class="gci-text">{{$navbar_page->title}}</div></a>
        @if($navbar_page->sub_pages->isNotEmpty())
            <ul>
            @foreach($navbar_page->sub_pages->sortBy('index') as $sub_page)
                <li>
                    <a href="{{route('main', $sub_page->slug)}}"><div>{{$sub_page->title}}</div></a>
                    @if($sub_page->sub_pages->isNotEmpty())
                      <ul>
                        @foreach($sub_page->sub_pages->sortBy('index') as $second_level_page)
                            <li><a href="{{route('category', ['category'=> $navbar_page->slug, 'slug' => $second_level_page->slug])}}">{{$second_level_page->title}}</a></li>
                        @endforeach
                      </ul>
                    @endif
                </li>
            @endforeach
            </ul> 
        @endif
    </li>
    @endforeach
</ul>
</nav><!-- #primary-menu end -->