@if(!$page->keywords || $page->keywords->isEmpty())
<form method="POST" action="{{ route('keywords.update', $page) }}" accept-charset="UTF-8" role="form">
    {{ csrf_field() }}
    
    <label for="keywords" class="control-label bg-success text-white py-1 px-2"><strong>Attach keyword category</strong></label>
    <div class="row my-3">

    <div class="form-group col-md-4">
        <select class="form-control form-control-sm" name="category_id">
            <option value="" selected>None</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>
    </div>

    <hr>
    <div class="form-group">
        <button type="submit" class="btn main-button btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Attach keyword category</strong></button>
    </div> 
</form>
@else
<h4>Page keywords</h4>

<hr>

<form method="POST" id="remove-partial" action="{{route('keywords.remove', $page)}}">
        @csrf

<ul class="list-inline">
@foreach($page->keywords as $keyword)
    <li class="list-inline-item">
        <input type="checkbox" name="keywords[]" value="{{$keyword->id}}"> <span style="font-size:10px;">{{$keyword->title}}</span>
    </li>
@endforeach
</ul>
        <hr>
        
</form>
<form method="POST" id="remove-all" action="{{ route('keywords.delete', $page) }}" role="form">
    @csrf
</form>            

    <button type="submit" form="remove-partial" class="btn btn-sm green-btn">Remove selected keywords</button>
    <button type="submit" form="remove-all" class="btn btn-sm red-btn">Remove all keywords</button>
       

@endif