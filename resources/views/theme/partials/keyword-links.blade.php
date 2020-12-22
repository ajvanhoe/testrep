@if($page->keywords)
<section class="nomargin nopadding bg-white">
    <div class="container clearfix">
    <div class="col_ful center">
        <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="60" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
        @foreach($page->keywords as $keyword)
            <div class="oc-item"><a href="{{route('main', $keyword->slug)}}">{{$keyword->title}}</a></div>  
        @endforeach
        </div>
    </div>
    </div>
</section>
@endif

    
                          
                          
                          
                         
                       