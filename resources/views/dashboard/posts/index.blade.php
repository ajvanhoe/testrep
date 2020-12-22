@extends('layouts.admin')

@section('styles')
 
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('dashboard.partials.messages')
        </div>
    </div> 
   
    <div class="row py-4">

        <div class="col-md-10">
            <div class="card px-3 py-2 main-card">
            <div class="card-header main-area mt-2 text-white text-center boxed">
                <div class="head-panel py-3"><h4 class="card-title"><strong>Articles</strong></h4></div>
                
                <ul class="nav nav-pills card-header-pills mt-2">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#new-post"  href="#new-post"><i class="fas fa-fw fa-plus-square"></i> Add new article</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                @include('dashboard.posts.posts')
            </div>  
            <div class="card-footer main-area flex-center">
            {{ $posts->links() }}
            <!-- <a data-toggle="modal" data-target="#new-post"  href="#new-post" class="btn btn-lg btn-danger btn-block"><i class="fas fa-fw fa-plus-square"></i><strong>Add new article</strong></a> -->
            </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
        
    </div>

    <div class="row">
        @include('dashboard.posts.create')
    </div>


</div>

@endsection

@section('scripts')

<script src="{{ asset('js/ckeditor-classic.js') }}"></script>

<script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });

      
  </script>

@endsection