@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/nestable.css') }}" rel="stylesheet">
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
        <div class="head-panel py-3">
            <h4 class="card-title"><strong>Pages</strong></h4>
        </div>
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('pages.create')}}"><i class="fas fa-fw fa-plus-square"></i> Add new page</a>
                </li>
            </ul>
        </div>

    
        <div class="card-body">

<div class="row">
  <div class="col-md-7">
    <h4>Organic pages</h4>
     
    <div class="cf nestable-lists">
      <div class="dd" id="nestable">

        <ol class="dd-list">
        @foreach($pages->sortBy('index') as $page)
          <li class="dd-item" data-id="{{$page->id}}">
            <div class="dd-handle">
              <a href="{{route('pages.edit', $page)}}">{{$page->title}}</a>
              <span class="float-right">
                <a href="{{route('pages.edit', $page)}}" target="__blank"><i class="fas fa-edit"></i></a>
                <!-- <a href="{{route('grid.view', $page)}}" target="__blank"><i class="fas fa-border-all"></i></a> -->
              </span>
            </div>
            @if(!$page->sub_pages->isEmpty())
            <ol class="dd-list">

            @foreach($page->sub_pages->sortBy('index') as $sub_page)
            <li class="dd-item" data-id="{{(int)$sub_page->id}}">
              <div class="dd-handle">
              <a href="{{route('pages.edit', $sub_page)}}">{{$sub_page->title}}</a>
              <span class="float-right">
                <a href="{{route('pages.edit', $sub_page)}}" target="__blank"><i class="fas fa-edit"></i></a>
                <!-- <a href="{{route('grid.view', $sub_page)}}" target="__blank"><i class="fas fa-border-all"></i></a> -->
              </span>
              </div>

                <!-- second level -->

                @if(!$sub_page->sub_pages->isEmpty())
                  <ol class="dd-list">

                  @foreach($sub_page->sub_pages->sortBy('index') as $second_level_page)
                  <li class="dd-item" data-id="{{(int)$second_level_page->id}}">
                    <div class="dd-handle">
                    <a href="{{route('pages.edit', $second_level_page)}}">{{$second_level_page->title}}</a>
                    <span class="float-right">
                      <a href="{{route('pages.edit', $second_level_page)}}" target="__blank"><i class="fas fa-edit"></i></a>
                      <!-- <a href="{{route('grid.view', $second_level_page)}}" target="__blank"><i class="fas fa-border-all"></i></a> -->
                    </span>
                    </div>
                  </li>
                @endforeach  
                  </ol>
                @endif

            </li>
            @endforeach
            </ol>
            @endif
          </li>
        @endforeach
        </ol>

      </div>
    </div>
  

  </div>  <!-- /.col-md-7 -->

  <div class="col-md-5">
    <h4>Landing pages</h4>
     
    <div class="cf nestable-lists">
      <div class="dd" id="nestable">

      <ol class="dd-list">
      @foreach($landing_pages->sortBy('index') as $landing)
      <li class="dd-item" data-id="{{$landing->id}}">
        <div class="dd-handle">
        <a href="{{route('pages.edit', $landing)}}">{{$landing->title}}</a>
        <span class="float-right">
                <a href="{{route('pages.edit', $landing)}}" target="__blank"><i class="fas fa-edit"></i></a>
                <!-- <a href="{{route('grid.view', $landing)}}" target="__blank"><i class="fas fa-border-all"></i></a> -->
              </span>
        </div>
      </li>
      @endforeach
      </ol>

      </div>
    </div>

  </div> <!-- /.col.md-5 -->
</div> <!-- /.row -->

<div class="row justify-content-center my-5">
@if(isset($regular_pages))
<div class="col-md-8">
    <h4>Regular pages</h4>
     
    <div class="cf nestable-lists">
      <div class="dd" id="nestable">

      <ol class="dd-list">
      @foreach($regular_pages->sortBy('index') as $regular)
      <li class="dd-item" data-id="{{$regular->id}}">
        <div class="dd-handle">
        <a href="{{route('pages.edit', $regular)}}">{{$regular->title}}</a>
        <span class="float-right">
                <a href="{{route('pages.edit', $regular)}}" target="__blank"><i class="fas fa-edit"></i></a> 
                <!-- <a href="{{route('grid.view', $regular)}}" target="__blank"><i class="fas fa-border-all"></i></a> -->
              </span>
        </div>
      </li>
      @endforeach
      </ol>

      </div>
    </div>

  </div> <!-- /.col.md-8 -->
@endif
</div>


        </div> <!-- /.card-body -->
      </div> <!-- /.card -->

    </div> <!-- /.col-md-12 -->
    
</div> <!-- /. row py-4 -->

</div> <!-- /.container -->

@endsection


