@if($page->template) 

<form method="POST" action="{{ route('templates.update', $page->template_id) }}" role="form">
{{ csrf_field() }}
@method('PUT')
<div class="form-group mr-5">
    <label for="template" class="control-label bg-success text-white py-1 px-2"><strong>Template</strong></label>
    <input type="text" id ="template" name="template" value="{{$page->template->template}}" class="form-control">
    <p class="help-block text-muted"><small>Page template.</small></p>
</div>
<div class="form-group mr-5">
    <label for="hero" class="control-label bg-success text-white py-1 px-2"><strong>Hero</strong></label>
    <input type="text" id="hero" name="hero" value="{{$page->template->hero}}" class="form-control">
    <p class="help-block text-muted"><small>Hero Image</small></p>
</div>
<div class="form-group">
    <label for="body" class="control-label"><strong>Body</strong></label><span class="character-count float-right text-muted" id="desc-count"></span>
    <textarea id="body" name="body" class="form-control" rows="4">{{$page->template->body}}</textarea> 
    <p class="help-block text-muted"><small>Page content.</small></p>
</div>


<hr>
<div class="form-group">
    <button type="submit" class="btn btn-info btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Update templates</strong></button>
</div> 

</form>

@else

<h5>No page template, create new</h5>
<hr>

<form method="POST" action="{{ route('templates.create', $page) }}" accept-charset="UTF-8" role="form">
{{ csrf_field() }}

<div class="form-group mr-5">
    <label for="template" class="control-label py-1 px-2"><strong>Template</strong></label>
    <input type="text" id ="template" name="template" value="default" class="form-control">
    <p class="help-block text-muted"><small>Page template.</small></p>
</div>
<div class="form-group mr-5">
    <label for="hero" class="control-label py-1 px-2"><strong>Hero</strong></label>
    <input type="text" id="hero" name="hero" value="default" class="form-control">
    <p class="help-block text-muted"><small>Hero Image</small></p>
</div>
<div class="form-group">
    <label for="body" class="control-label py-1 px-2"><strong>Body</strong></label>
    <textarea id="body" name="body" class="form-control" rows="4">...</textarea> 
    <p class="help-block text-muted"><small>Page content.</small></p>
</div>

<hr>
<div class="form-group">
    <button type="submit" class="btn main-btn btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i>Create template</strong></button>
</div> 

</form>

@endif
