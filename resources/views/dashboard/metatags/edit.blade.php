@extends('layouts.admin')

@section('content')
<div class="container">

<div class="row">
    <div class="col-md-8">
            @include('dashboard.partials.messages')
    </div>
</div>

<div class="row py-4">
    <div class="col-md-8">

    <div class="card px-3 py-2 main-card">
        <div class="card-header mt-2 text-white text-center boxed">
            <div class="head-panel py-3">
            <h4 class="card-title"><strong>Edit metatag entry</strong></h4>
            </div>
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('metatags.index') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('metatags.update', $metatag->id) }}" accept-charset="UTF-8" role="form">
            {{ csrf_field() }}
            @method('PUT')
                      
                <div class="form-group">
                    <label for="title" class="control-label"><strong>Title</strong></label>
                    <textarea name="title" id="title" class="form-control" cols="25" rows="4" required>{{$metatag->title}}</textarea>
                    <p class="help-block text-muted"><small>While technically not a meta tag, this tag is often used together with the "description". The contents of this tag are generally shown as the title in search results (and of course in the user's browser).</small></p>
                </div>
                <div class="form-group">
                    <label for="keywords" class="control-label"><strong>Keywords</strong></label>
                    <input type="text" name="keywords" id="keywords" class="form-control" value="{{$metatag->keywords}}" required>
                    <p class="help-block text-muted"><small>Enter the keyword of your site.</small></p>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label"><strong>Description</strong></label>
                    <textarea name="description" id="description" class="form-control" cols="25" rows="4" required>{{$metatag->description}}</textarea> 
                    <p class="help-block text-muted"><small>This tag provides a short description of the page. In some situations this description is used as a part of the snippet shown in the search results.</small></p>
                <div class="form-group">
                    <label for="robots" class="control-label"><strong>Robots</strong></label>
                    <input type="text" name="robots" id="robots" class="form-control" value="{{$metatag->robots}}" required>
                    <p class="help-block text-muted"><small>These meta tags can control the behavior of search engine crawling and indexing. The robots meta tag applies to all search engines, while the "googlebot" meta tag is specific to Google. The default values are "index, follow" (the same as "all") and do not need to be specified.</small></p>
                </div>

                <div class="form-group">
                    <label for="robots" class="control-label"><strong>Canonical URL</strong></label>
                    <input type="text" name="canonical" id="canonical" class="form-control" value="{{$metatag->canonical}}">
                    <p class="help-block text-muted"><small>Canonical URL.</small></p>
                </div>
                
                    <hr>
                <div class="form-group">
                    <button type="submit" class="btn main-btn btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Update Metatag</strong></button>
                </div> 
        </form>
        </div>
    </div> <!-- /.card -->
    </div>

    

</div>  <!-- /.row -->
</div>

@endsection
