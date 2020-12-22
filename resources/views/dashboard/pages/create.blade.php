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
            <h4 class="card-title"><strong>Add new Page</strong></h4>
            </div>
            
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.index') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('pages.store') }}" accept-charset="UTF-8" role="form">
            {{ csrf_field() }}
        
                <div class="form-group">
                    <label for="title" class="control-label"><strong>Title</strong></label>
                    <input type="text" id="title" name="title" class="form-control" required> 
                    <p class="help-block text-muted"><small>Page title.</small></p>
                </div>
                
                <div class="form-group my-3 mr-5">
                    <label for="metatags" class="control-label bg-success text-white py-1 px-2"><strong>Metatags</strong></label>
                    <select class="form-control form-control-sm" name="metatag_id" required>
                    <option value="0" selected>No metatags</option>
                    @foreach($metatags as $metatag)
                    <option value="{{ $metatag->id }}">{{ $metatag->title }}</option>
                    @endforeach
                    </select>
                    <p class="help-block text-muted"><small>Select metatags for this page.</small></p>
                </div>

                <div class="form-group col-md-6">
                    <label for="type" class="control-label bg-gradient-red py-2 px-3"><strong><i class="fa fa-arrow-circle-right"></i> Important: select page type</strong></label>
                    <select class="form-control form-control-sm" name="type">
                        <option value="home" selected>Home (organic)</option>
                        <option value="page">Regular Page</option>
                        <option value="landing">Landing Page</option>
                    </select>
                    <p class="help-block text-muted"><small>Page type.</small></p>
                </div>

                <div class="form-group col-md-4">
                    <label for="index" class="control-label"><strong>Index</strong></label>
                    <input type="number" id="index" name="index" min="1" value="1" class="form-control"> 
                    <p class="help-block text-muted"><small>Page menu index.</small></p>
                </div>

                <div class="form-group my-3 mr-5">
                    <label for="parrent" class="control-label"><strong>Parrent page</strong></label>
                    <select class="form-control form-control-sm" name="parrent_id">
                        <option value="">Main page (no parrent)</option>
                        @foreach($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </select>
                    <p class="help-block text-muted"><small>Select parrent page.</small></p>
                </div>
   
                <hr>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-block main-btn"><strong><i class="fas fa-fw fa-angle-double-right"></i> Add new page </strong></button>
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
