@extends('layouts.admin')

@section('styles')
 <!-- Page level plugin CSS-->
 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="container" id="main">


<div class="row justify-content-center">
    <div class="col-md-8">
        @include('dashboard.partials.messages')
    </div>
</div> 


<div class="row py-4">

    <div class="col-md-12">
    <div class="card px-3 py-2 main-card">
        <div class="card-header main-area mt-2 text-white text-center boxed">
            <div class="head-panel py-3">
            <h4 class="card-title"><strong>Metatags</strong></h4>
            </div>
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('metatags.create')}}"><i class="fas fa-fw fa-plus-square"></i> Add new metatag</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover" id="dataTable">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Descrtiption</th>
            <th scope="col">Keywords</th>
            <th scope="col">Robots</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($metatags as $metatag)
 
    <tr>
        <td>{{$metatag->title}}</td>
        <td>{{$metatag->description}}</td>
        <td>{{$metatag->keywords}}</td>
        <td>{{$metatag->robots}}</td>
        <td>
        <form id="delete:{{$metatag->id}}" method="POST" action="{{route('metatags.destroy', $metatag->id)}}">
                    @method('DELETE')
                    {{ csrf_field() }}
                </form>
                <a class="btn btn-sm btn-primary" href="{{route('metatags.edit', $metatag->id)}}"><i class="fas fa-edit"></i></a>
                <button class="btn btn-sm btn-danger" type="submit" form="delete:{{$metatag->id}}"><i class="fas fa-trash-alt"></i></button>
        </td>
    </tr>
 
    @endforeach
    
        
    </tbody>
</table>
</div>
<!-- /.table-responsive -->     
        
        </div>
        <div class="card-footer main-area text-center boxed">
            <a href="{{route('metatags.create')}}" class="btn btn-lg main-btn btn-block"><i class="fas fa-fw fa-plus-square"></i><strong> Add new Metatag</strong></a>
        </div>
    </div> <!-- /.card -->
    </div>

</div>

    <div class="row">
    </div> <!-- /.row -->
</div> <!-- /.container -->

@endsection


@section('scripts')
<!-- Page level plugin JavaScript-->
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

</script>

@endsection