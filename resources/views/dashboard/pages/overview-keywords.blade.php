<div class="float-right">
    <a class="badge badge-primary" data-toggle="collapse" href="#edit-keywords">+ Edit page keywords</a>
</div>

<div class="card-text collapse" id="edit-keywords">
    @include('dashboard.pages.form-keywords')
</div> <!-- /.collapse -->

<div class="row py-3">
    <div class="col-md-12">
        @if($page->urlwords)
        @php 
            $keywords = json_decode($page->urlwords)
        @endphp

    <p>Total links: <span class="badge badge-primary mb-1">{{count($keywords)}}</span></p>
    <hr>
    <form method="POST" action="{{route('urlwords.remove', ['page' => $page])}}">
        @csrf
        <ul class="list-inline">
            @foreach($keywords as $key => $keyword)
            <li class="list-inline-item">
                <input type="checkbox" name="keywords[]" value="{{$key}}"> <span style="font-size:10px;">{{$keyword->name}}</span>
            </li>
            @endforeach
        </ul>
        <hr>
        <button type="submit" class="btn btn-sm btn-success">Remove selected keywords</button>
    </form>
        @else
        <p><span class="badge badge-warning text-white mx-3"><i class="fas fa-exclamation-triangle px-1 py-1"></i></span>No keywords on this page, generate keywords first.</p>
        @endif
    </div>

</div>