@extends('layouts.admin')

@section('styles')
 <!-- Page level plugin CSS-->
 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="container">

<div class="row justify-content-center">
    <div class="col-md-8">
        @include('dashboard.partials.messages')
    </div>
</div> 

<div class="row py-4">

    <div class="col-md-12">
    <div class="card px-3 py-2 main-card">
        <div class="card-header main-area boxed mt-2 text-white text-center">
            <div class="head-panel py-3">
            <h4 class="card-title"><strong>Keywords</strong></h4>
            </div>
            
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#new-keyword"  href="#new-keyword"><i class="fas fa-fw fa-plus-square"></i> Add new keyword</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#new-category"  href="#new-category"><i class="fas fa-fw fa-plus-circle"></i> Add new category</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#remove-category"  href="#remove-category"><i class="fas fa-fw fa-minus-circle"></i> Remove category</a>
                </li>
            </ul>
        </div>
        <div class="card-body">

<div class="row mb-3">


<div class="col-md-12 justify-content-center">
    <ul class="nav list-inline" id="myTab" role="tablist">
        @foreach($categories as $category)
        <li class="nav-item list-inline-item mt-2 mr-2" data-toggle="tooltip" data-placement="right" title="{{$category->description}}">
            <a class="nav-link btn bg-gradient-blue text-white" id="home-tab" data-toggle="tab" href="#category{{$category->id}}" role="tab" aria-controls="home" aria-selected="false">
                {{$category->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div> <!-- /.col-md-2 -->
</div>

<div class="row">
<div class="col-md-12">
    <div class="tab-content" id="myTabContent">
    @foreach ($categories as $category)
        <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel" aria-labelledby="home-tab">

    <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable-{{$category->id}}">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach($category->keywords as $keyword)
            <tr>
                <td>{{ $keyword->title }}</td>
                <td>{{ $keyword->slug }}</td>
                <td>
                <form id="delete:{{$keyword->id}}" method="POST" action="{{route('keywords.destroy', $keyword->id)}}">
                    @method('DELETE')
                    {{ csrf_field() }}
                </form>
                <!-- <a class="btn btn-sm btn-primary" href="{{route('keywords.edit', $keyword->id)}}"><i class="fas fa-edit"></i></a> -->
                <button class="btn btn-sm btn-danger" type="submit" form="delete:{{$keyword->id}}"><i class="fas fa-trash-alt"></i></button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div> <!-- /.table-responsive -->
</div>
@endforeach
</div> <!-- /.tab-content -->

</div> <!-- /.col-md-10 -->
</div> <!-- /.row -->



        </div>
        <div class="card-footer main-area text-center boxed">
            <a data-toggle="modal" data-target="#new-keyword"  href="#new-keyword" class="btn btn-lg main-btn btn-block"><i class="fas fa-fw fa-plus-square"></i><strong>Add new keyword</strong></a>
        </div>
    </div> <!-- /.card -->
    </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->

<div class="row">
@include('dashboard.keywords.add_keyword')
</div>

<div class="row">
@include('dashboard.keywords.add_category')
</div>

<div class="row">
@include('dashboard.keywords.remove_category')
</div>

</div> <!-- /.container -->

@endsection

@section('scripts')

<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

@foreach($categories as $category)
<script>
  $(document).ready(function() {
      $('#dataTable-{{$category->id}}').dataTable();
  });
</script>
@endforeach


<script>
var keywordField = document.getElementById("add-keyword");

function addKeywordField(){
  let newField = document.createElement('div');
  let fieldContent = `<div class="form-group mu-3 mb-3 mr-2 ml-2">
          <input type="text" class="form-control" name="title[]" placeholder="...">
          <p class="help-block text-muted"><small>Enter a keyword</small></p>
        </div>`;

  newField.innerHTML = fieldContent;
  keywordField.appendChild(newField);
}
</script>




@endsection