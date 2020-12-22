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
            <div class="head-panel py-3">
            <h4 class="card-title"><strong>Edit Page</strong></h4>
            </div>
            <ul class="nav nav-pills card-header-pills mt-2">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.index') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#remove-page"  href="#remove-page"><i class="fas fa-exclamation-triangle"></i> DELETE</a>
                </li>
            </ul>
        </div>
        <div class="card-body">

        <div class="container">
            
            <h4>Overview: {{$page->title}}</h4>
            
            <div class="row mb-2">
                <div class="col-md-12">

                    <table class="table table-sm" style="font-size:14px;">
                    <tbody>
                        <tr>
                        <th scope="row">slug:</th>
                        <td><a class="px-1 py-1" href="{{route('main', ['slug' => $page->slug])}}" target="__blank">{{route('main', ['slug' => $page->slug])}}</a></td>
                        </tr>
                        @if($page->parrent_id)
                        <tr>
                        <th scope="row">parrent page:</th>
                        <td><a class="px-1 py-1" href="{{route('main', ['slug' => $page->parrent_page->slug])}}" target="__blank">{{$page->parrent_page->title}}</a></td>
                        </tr>
                        @endif
                        <tr>
                        <th scope="row">metatags:</th>
                        @if($page->metatags)
                        <td><a class="badge badge-primary px-1 py-1" data-toggle="collapse" href="#metatags-tab">{{$page->metatags->title}}</a></td>
                        @else 
                        <td><a class="badge badge-danger px-1 py-1" data-toggle="collapse" href="#metatags-tab">No metatags!</a></td>
                        @endif
                        </tr>
                    </tbody>
                    </table>

                    <div class="card-text collapse" id="metatags-tab" style="font-size:12px;"> 
                        @if($page->metatags)
                        <p><strong>description:</strong> {{str_replace(['SEO1'],[$page->title],$page->metatags->description)}}</p>
                        <hr>
                        <p><strong>keywords:</strong> {{$page->metatags->keywords}}</p>
                        <hr>
                        <p><strong>robots:</strong> {{$page->metatags->robots}}</p>
                        @else
                        <p>Add metatags before anything else!</p>
                        @endif
                    </div>
                    <hr>
                </div>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Basic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-selected="true" id="keywords-tab" data-toggle="tab" href="#keywords" role="tab" aria-controls="keywords">Keywords</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-selected="false" id="templates-tab" data-toggle="tab" href="#templates" role="tab" aria-controls="templates">Template</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-selected="false" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content">Page content</a>
            </li>
            
            <!-- <li class="nav-item">
                <a class="nav-link" id="grid-editor" href="{{route('grid.view', $page)}}" target="__blank"><i class="fa fa-arrow-circle-right"></i> Grid Editor</a>
            </li> -->
            </ul>
            <div class="tab-content pt-3" id="myTabContent">
                <div class="tab-pane pt-3 fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('dashboard.pages.form-edit')
                </div>
                <div class="tab-pane pt-3 active" id="keywords" role="tabpanel" aria-labelledby="keywords-tab">
                    @include('dashboard.pages.form-keywords')
                </div>
                <div class="tab-pane pt-3 fade" id="templates" role="tabpanel" aria-labelledby="templates-tab">
                    @include('dashboard.pages.form-templates')
                </div>
                <div class="tab-pane pt-3 fade" id="content" role="tabpanel" aria-labelledby="content-tab">
                    @include('dashboard.pages.form-content')
                </div>
                
            </div>
        </div>

       
        </div><!-- /.card-body -->

        <div class="card-footer">
            
        </div>
    </div> <!-- /.card -->
    </div>

    
    
    
    @include('dashboard.pages.remove')    
</div>  <!-- /.row -->
</div>
@endsection
