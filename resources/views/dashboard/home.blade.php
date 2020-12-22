@extends('layouts.admin')

@section('content')

<div class="row justify-content-center py-4">
    <div class="col-md-10">

    <div class="card-deck pt-4">
      <div class="card">
        <div class="card-body boxed">
          
        <p class="card-text text-center py-2"><img class="home-icons" src="{{asset('images/icons/search-icon.png')}}" alt="pages"></p>
          <a class="btn main-btn btn-lg btn-block" href="{{route('pages.index')}}">Pages Preview</a>
        </div>
      </div>

      <div class="card">
        <div class="card-body boxed">
          
          <p class="card-text text-center py-2"><img class="home-icons" src="{{asset('images/icons/add-page.png')}}" alt="pages"></p>
          <a class="btn main-btn btn-lg btn-block" href="{{route('pages.create')}}">Create Pages</a>
        </div>
      </div>
      
      <div class="card">
        <div class="card-body boxed">
          
        <p class="card-text text-center py-2"><img class="home-icons" src="{{asset('images/icons/key-icon.png')}}" alt="pages"></p>
          <a class="btn main-btn btn-lg btn-block" href="{{route('urlwords.index')}}">URL Words / Categories</a>
        </div>
      </div>
    </div>

    </div>
</div>

<div class="row justify-content-center py-4">
    <div class="col-md-10">

    <div class="card-deck">
      <div class="card">
        <div class="card-body boxed">
          
        <p class="card-text text-center py-2"><img class="home-icons" src="{{asset('images/icons/meta-icon.png')}}" alt="pages"></p>
          <a class="btn main-btn border-sm btn-lg btn-block" href="{{route('metatags.index')}}">Meta Tags</a>
        </div>
      </div>
      <div class="card">
        <div class="card-body boxed">
          
        <p class="card-text text-center py-2"><img class="home-icons" src="{{asset('images/icons/box-pages.png')}}" alt="pages"></p>
          <a class="btn red-btn btn-lg btn-block" href="{{route('landings')}}">Landing Pages</a>
        </div>
      </div>
      <div class="card">
        <div class="card-body boxed">
          
        <p class="card-text text-center py-2"><img class="home-icons" src="{{asset('images/icons/settings-icon.png')}}" alt="pages"></p>
          <a class="btn red-btn btn-lg btn-block" href="">SEO Preview</a>
        </div>
      </div>
    </div>

    </div>
</div>

@endsection
