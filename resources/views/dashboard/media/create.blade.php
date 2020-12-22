@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="container">

<div class="row">
    <div class="col-md-8 offset-1">
            @include('dashboard.partials.messages')
    </div>
</div>

<div class="row py-4">
    <div class="col-md-10">
    <div class="card px-3 py-2 main-card">
        <div class="card-header mt-2 text-white text-center boxed">
          <div class="head-panel py-3"><h4 class="card-title"><strong>Images</strong></h4></div>
            
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        
        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-images-tab" data-toggle="tab" href="#nav-images" role="tab" aria-controls="nav-home" aria-selected="true">Edit Images</a>
    <a class="nav-item nav-link" id="nav-upload-tab" data-toggle="tab" href="#nav-upload" role="tab" aria-controls="nav-upload" aria-selected="false">Upload Images</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
           @include('dashboard.media.edit')
  </div>
  <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-tab">
    <div class="form-group my-5 mr-2 ml-2">
        <form action="{{route('store.media')}}" class="dropzone bg-light" id="my-awesome-dropzone" enctype="multipart/form-data">{{ csrf_field() }}</form>
        <p class="help-block">max file size: 5mb</p>
    </div>
  </div>
  
</div>
  

        </div>

        <div class="card-footer">
        </div>
    </div> <!-- /.card -->
    </div>
    
</div>  <!-- /.row -->
</div>
@endsection

@section('scripts')
<!-- UPLOAD IMAGE-->
<script src="{{ asset('js/dropzone.min.js') }}"></script>
@endsection('scripts')