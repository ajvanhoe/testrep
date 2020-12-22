@extends('layouts.admin')

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
            <div class="head-panel py-3"><h4 class="card-title"><strong>Edit Article</strong></h4></div>
         
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
            </ul>
        </div>
        <div class="card-body">


        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" accept-charset="UTF-8" role="form">
            {{ csrf_field() }}
            @method('PUT')
                      
                <div class="form-group">
                    <label for="name" class="control-label"><strong>Title</strong></label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                    <p class="help-block text-muted"><small>Article title.</small></p>
                </div>
                
                <div class="form-group mr-2 ml-2">
                    <label for="title" class="control-label"><strong>Image</strong></label><br>
                    <input type="file" name="cover">
                    <p class="help-block"><small>max file size: 1mb</small></p>
                </div>

                <div class="form-group mb-3 mr-2 ml-2">
                    <label for="title" class="control-label"><strong>Post</strong></label>
                    <textarea name="post" id="editor" rows="10" class="form-control"  placeholder="Post...">{!! $post->post !!}</textarea>
                </div>
               
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn main-btn btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Update Article</strong></button>
                </div> 
        </form>
       
        </div><!-- /.card-body -->

        <div class="card-footer">
    
        </div>
    </div> <!-- /.card -->
    </div>

    
</div>  <!-- /.row -->
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