<form method="POST" action="{{ route('content.update', $page) }}" accept-charset="UTF-8" role="form">
{{ csrf_field() }}
    @method('PUT')
    <label for="content" class="control-label bg-danger text-white py-1 px-2"><strong>Page content</strong></label>
    <div class="row my-3">
        <textarea name="content" class="form-control" rows="30">{!! $page->content !!}</textarea>

    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn main-btn btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Update page content</strong></button>
    </div> 
</form>