 <form method="POST" action="{{ route('pages.update', $page) }}" accept-charset="UTF-8" role="form">
    {{ csrf_field() }}
    @method('PUT')
    <div class="form-group">
        <label for="title" class="control-label"><strong>Title</strong></label>
        <input type="text" id="title" name="title" value="{{$page->title}}" class="form-control" required> 
        <p class="help-block text-muted"><small>Page title.</small></p>
    </div>

    <div class="form-group">
        <label for="slug" class="control-label"><strong>Slug</strong></label>
        <input type="text" id="title" name="slug" value="{{$page->slug}}" class="form-control"> 
        <p class="help-block text-muted"><small>Page slug.</small></p>
    </div>

    <div class="form-group col-md-6">
        <label for="type" class="control-label bg-success text-white py-2 px-3">Page type</label>
        <select class="form-control form-control-sm" name="type">
            <option value="home" @if($page->type == 'home') selected @endif>Home (organic)</option>
            <option value="page" @if($page->type == 'page') selected @endif>Regular Page</option>
            <option value="landing" @if($page->type == 'landing') selected @endif>Landing Page</option>
        </select>
        <p class="help-block text-muted"><small>Page type.</small></p>
    </div>

    <div class="form-group my-3 mr-5">
        <label for="metatags" class="control-label"><strong>Metatags</strong></label>
        <select class="form-control form-control-sm" name="metatag_id" required>
        <option value="0">No metatags</option>
        @foreach($metatags as $metatag)
        <option value="{{ $metatag->id }}" @if($metatag->id == $page->metatag_id ) selected @endif>{{ $metatag->title }}</option>
        @endforeach
        </select>
        <p class="help-block text-muted"><small>Select metatags for this page.</small></p>
    </div>

    <div class="form-group my-3 mr-5">
        <label for="parrent" class="control-label"><strong>Parrent page</strong></label>
        <select class="form-control form-control-sm" name="parrent_id">
            <option value="">Main page (no parrent)</option>
            @foreach($pages as $parrent_page)
                <option value="{{ $parrent_page->id }}" @if($parrent_page->id == $page->parrent_id ) selected @endif>{{ $parrent_page->title }}</option>
            @endforeach
        </select>
        <p class="help-block text-muted"><small>Select parrent page.</small></p>
    </div>

    <div class="form-group col-md-4">
        <label for="index" class="control-label"><strong>Index</strong></label>
        <input type="number" id="index" name="index" min="1" value="{{$page->index}}" class="form-control"> 
        <p class="help-block text-muted"><small>Page menu index.</small></p>
    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn main-button btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Save changes</strong></button>
    </div> 
</form>