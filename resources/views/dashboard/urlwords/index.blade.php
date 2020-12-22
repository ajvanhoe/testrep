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
        <div class="card-header main-area mt-2 text-white text-center boxed">
            <div class="bg-gradient-red border-sm py-3">
                <h4 class="card-title"><strong>URL Words</strong></h4>
            </div>
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#new-urlword"  href="#new-urlword"><i class="fas fa-fw fa-plus-square"></i> Add new keyword</a>
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

<div class="row">

<div class="col-md-2 justify-content-center">
    <ul class="nav nav-pills" id="myTab" role="tablist">
        @foreach($categories as $category)
        <li class="nav-item mr-2" data-toggle="tooltip" data-placement="right" title="{{$category->description}}">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#category{{$category->id}}" role="tab" aria-controls="home" aria-selected="false">
                {{$category->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div> <!-- /.col-md-2 -->

<div class="col-md-10">
    <div class="tab-content" id="myTabContent">
    @foreach ($categories as $category)
        <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel" aria-labelledby="home-tab">

    <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable-{{$category->id}}">
        <thead>
            <tr>
                <th scope="col">Name</th>
                
                <th scope="col" style="width:25%">Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach($category->urlwords as $urlword)
            <tr>
                <td>{{ $urlword->name }}</td>
                
                <td style="width:25%">
                <form id="delete:{{$urlword->id}}" method="POST" action="{{route('urlwords.destroy', $urlword->id)}}">
                    @method('DELETE')
                    {{ csrf_field() }}
                </form>
                <!-- <a class="btn btn-sm btn-primary" href="{{route('urlwords.edit', $urlword->id)}}"><i class="fas fa-edit"></i></a> -->
                <button class="btn btn-sm btn-danger" type="submit" form="delete:{{$urlword->id}}"><i class="fas fa-trash-alt"></i></button>

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
            <a data-toggle="modal" data-target="#new-urlword"  href="#new-urlword" class="btn btn-lg red-btn btn-block"><i class="fas fa-fw fa-plus-square"></i><strong>Add new keyword</strong></a>
        </div>
    </div> <!-- /.card -->
    </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->

<div class="row my-5">
    <div class="col-md-10">
    @include('dashboard.urlwords.mix_urlwords')
    </div>
</div>

<div class="row">
@include('dashboard.urlwords.add_urlword')
</div>

<div class="row">
@include('dashboard.urlwords.add_category')
</div>

<div class="row">
@include('dashboard.urlwords.remove_category')
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
          <input type="text" class="form-control" name="name[]" placeholder="...">
          <p class="help-block text-muted"><small>Enter a keyword</small></p>
        </div>`;

  newField.innerHTML = fieldContent;
  keywordField.appendChild(newField);
}
</script>




@endsection