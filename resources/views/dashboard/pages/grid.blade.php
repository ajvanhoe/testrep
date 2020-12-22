@extends('layouts.editor')

@section('content')

<div class="card-text collapse" id="show-keywords">
    <div class="container">
        <div class="row mt-3">

    <div class="col-md-12">
        @if($page->urlwords)
        @php 
            $keywords = json_decode($page->urlwords)
        @endphp

    <span class="btn btn-sm btn-primary">
    <strong>Total links:</strong>&nbsp;&nbsp;&nbsp;<span class="badge badge-light">{{count($keywords)}}</span>
    </span>

    <hr>
        <ul class="list-inline">
            @foreach($keywords as $key => $keyword)
            <li class="list-inline-item ml-1">
                <a href="{{route('landing',['slug' => $page->slug, 'keywords' => $keyword->slug])}}" class="badge badge-secondary pb-1" style="font-size:10px;" target="__blank">{{$keyword->name}}</a>
            </li>
            @endforeach
        </ul>
        <hr>
        
        @else
        <p><span class="badge badge-warning text-white my-3 mx-3"><i class="fas fa-exclamation-triangle px-1 py-1"></i></span>No keywords on this page, generate keywords first.</p>
        @endif
    </div>  <!-- /.col-md-12 -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.collapse -->

<div class="container my-3 py-3">


<div class="row">
    <div class="col-md-8 offset-2">
            @include('dashboard.partials.messages')
    </div>
</div>

    <!-- Grid editor -->
    <div id="myGrid"><textarea class="source-area" id="source-area">{{$page->content}}</textarea></div><!-- /#myGrid -->
</div> <!-- /.container -->

<div class="row">
    <form method="POST" id="edit-form" class="edit-form" action="{{ route('content.update', $page) }}" role="form" accept-charset="UTF-8">
        {{ csrf_field() }}
        @method('PUT')
        <input type="hidden" name="content" id="myText">
    </form>
</div>

<div class="row">
    @include('dashboard.pages.overview-images')
</div>

@endsection

@section('scripts')
<script>
        $(function() {
        // Initialize grid editor
            $('#myGrid').gridEditor({
                new_row_layouts: [[12], [6, 6], [3, 3, 3, 3], [4, 4, 4], [2, 8, 2]],
                source_textarea: 'textarea.source-area',
                content_types: ['ckeditor'],
                ckeditor: {
                    config: {
                        on: {
                            instanceReady: function(evt) {
                                var instance = this;
                                //console.log('instance ready', evt, instance);
                            }
                        }
                    }
                }
            });
            
            // Get resulting html
            var html = $('#myGrid').gridEditor('getHtml');
            //console.log(html);           
                
        });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#save-page").click(function(){
            data = $('#myGrid').gridEditor('getHtml');
            $("#myText").val(data);
            //console.log(data);
            $("#edit-form").submit();
        });
    });
</script>



<script type="text/javascript">
// copy to clipboard
function copyLink(span) {
let id = span.id;
let copyText = document.getElementById(id).textContent;
alert(copyText);
}
</script>
@endsection