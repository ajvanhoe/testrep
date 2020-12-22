@extends('layouts.admin')

@section('content')

<div class="container">

<div class="row justify-content-center">
    <div class="col-md-8">
        @include('dashboard.partials.messages')
    </div>
</div> 

<div class="row py-4">
    <div class="col-md-8">
    <div class="card">
        <div class="card-body boxed">
            <div class="mx-3 my-3 px-3 py-3">
            @foreach($keywords as $keyword)
                {{$keyword}}<br>
            @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body boxed">
                Create new keyword category 
            </div>
        </div>
      
    </div>
</div>

</div> <!-- /.container -->

@endsection



