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
            <h4 class="card-title"><strong>Add new metatag entry</strong></h4>
            </div>
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('metatags.index') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('metatags.store') }}" accept-charset="UTF-8" role="form">
            {{ csrf_field() }}
        
                <div class="form-group">
                    <label for="title" class="control-label"><strong>Title</strong></label><span class="character-count float-right text-muted" id="title-count"></span>
                    <textarea id="title" name="title" class="form-control" rows="4" required>{{ old('title') }}</textarea>
                    <p class="help-block text-muted"><small>While technically not a meta tag, this tag is often used together with the "description". The contents of this tag are generally shown as the title in search results (and of course in the user's browser).</small></p>
                </div>
                <div class="form-group">
                    <label for="keywords" class="control-label"><strong>Keywords</strong></label><span class="character-count float-right text-muted" id="keywords-count"></span>
                    <input id ="keywords" type="text" name="keywords" value="{{ old('keywords') }}" class="form-control" required>
                    <p class="help-block text-muted"><small>Enter the keyword of your site.</small></p>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label"><strong>Description</strong></label><span class="character-count float-right text-muted" id="desc-count"></span>
                    <textarea id="description" name="description" class="form-control" rows="4" required>{{old('description')}}</textarea> 
                    <p class="help-block text-muted"><small>This tag provides a short description of the page. In some situations this description is used as a part of the snippet shown in the search results.</small></p>
                </div>
                <div class="form-group">
                    <label for="robots" class="control-label"><strong>Robots</strong></label>
                    <input type="text" name="robots" value="{{ old('robots') }}" id="robots" class="form-control" required>
                    <p class="help-block text-muted"><small>These meta tags can control the behavior of search engine crawling and indexing. The robots meta tag applies to all search engines, while the "googlebot" meta tag is specific to Google. The default values are "index, follow" (the same as "all") and do not need to be specified.</small></p>
                </div>

                <div class="form-group">
                    <label for="robots" class="control-label"><strong>Canonical</strong></label>
                    <input type="text" name="canonical" value="{{ old('canonical') }}" id="canonical" class="form-control">
                    <p class="help-block text-muted"><small>Canonical URL.</small></p>
                </div>
                
                    <hr>
                <div class="form-group">
                    <button type="submit" class="btn main-btn btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Add Metatag </strong></button>
                </div> 
        </form>
        </div>

        <div class="card-footer">
        </div>
    </div> <!-- /.card -->
    </div>
    
</div>  <!-- /.row -->
</div>
@endsection

@section('scripts')
<script>

const tagName            =  document.querySelector("#name");
const tagCounValue       =  document.querySelector('#name-count');

const title              =  document.querySelector("#title");
const titleCountValue    =  document.querySelector("#title-count");

const keywords           =  document.querySelector("#keywords");
const keywordsCountValue =  document.querySelector("#keywords-count");

const description        =  document.querySelector("#description");
const descCountValue     =  document.querySelector("#desc-count");

tagName.addEventListener('keyup', characterCounter);
title.addEventListener('keyup', characterCounter);
keywords.addEventListener('keyup', characterCounter);
description.addEventListener('keyup', characterCounter);


function getClass(count) {
    return count<200 ? 'info' : 'warning';
}

function characterCounter(e) {
  
    let badgeClass = getClass(e.target.value.length);

    if(e.target.name == 'name' && e.target.value.length > 0 ){
        tagCounValue.innerHTML = `Characters: <span class="badge badge-pill badge-${badgeClass}">${e.target.value.length}</span?>`;
    } else {
        tagCounValue.innerHTML = '';
    }
    
    if(e.target.name == 'title' && e.target.value.length > -1 ){
        titleCountValue.innerHTML = `Characters: <span class="badge badge-pill badge-${badgeClass}">${e.target.value.length}</span?>`;
    } else {
        titleCountValue.innerHTML = '';
    }
    
    if(e.target.name == 'keywords' && e.target.value.length > -1 ){
        keywordsCountValue.innerHTML = `Characters: <span class="badge badge-pill badge-${badgeClass}">${e.target.value.length}</span?>`;
    } else{
        keywordsCountValue.innerHTML = '';
    }
    
    if(e.target.name == 'description' && e.target.value.length > -1 ){
        descCountValue.innerHTML = `Characters: <span class="badge badge-pill badge-${badgeClass}">${e.target.value.length}</span?>`;
    } else {
        descCountValue.innerHTML ='';
    }
  
}

const elements =  [tagName, title, keywords, description];



</script>
@endsection('scripts')