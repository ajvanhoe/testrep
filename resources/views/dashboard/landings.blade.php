@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
            @include('dashboard.partials.messages')
    </div>
</div>


<div class="row justify-content-center py-4">
    <div class="col-md-10">

        <div class="card boxed">
            <div class="card-header my-2 mx-2 text-white text-center boxed">
                <div class="red-panel py-3">
                <h4 class="card-title"><strong>Landing Pages</strong></h4>
                </div>
                
                <ul class="nav nav-pills card-header-pills mt-2">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-arrow-circle-left"></i> back...</a>
                    </li>
                </ul>
            </div>

         <div class="card-body">
             <div class="row">

                <div class="col-2 justify-content-center">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach($categories as $category)
                        <a class="nav-link" id="category{{$category->id}}-tab" data-toggle="pill" href="#category{{$category->id}}" role="tab" aria-controls="category{{$category->id}}" aria-selected="false">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>

                <div class="col-10">

                    
                    <div class="tab-content" id="v-pills-tabContent">
                    @foreach($categories as $category)
                    <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel" aria-labelledby="category{{$category->id}}-tab">
                        
                    <div class="row">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Keyword</th>
                            <th scope="col">Custom landing</th>
                            <th scope="col">Options</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($category->keywords as $keyword)
                            <tr>
                                <td>{{$keyword->title}}</td>
                                <td>
                                    @if($keyword->landing_id)
                                        {{$keyword->landing_page->title}}
                                    @else
                                    none
                                    @endif
                                </td>
                                <td>
                                <div class="form-check">
                                    <input class="form-check-input" form="form{{$category->id}}" type="checkbox" name="keywords[]" value="{{$keyword->id}}" id="keyword{{$keyword->id}}">
                                </div>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="bg-gradient-green">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" onClick="toggle(this)"> select all   
                                </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    
                    </div>

                        <hr>

                    <div class="row my-3">
                        <div class="col-md-4">
                        <form method="POST" id="form{{$category->id}}" action="{{route('add.landings')}}">
                            @csrf

                        
                        <label class="control-label">Add landing to keywords</label>
                        <select class="custom-select my-2 mx-2" name="landing">
                            <option value="">none</option>
                            @foreach($landings as $landingpage)
                            <option value="{{$landingpage->id}}">{{$landingpage->title}}</option>
                            @endforeach
                        </select> 

                        <label class="control-label">Add regular pages to parrent page</label>
                        <select class="custom-select my-2 mx-2" name="regular">
                            <option value="">none</option>
                            @foreach($pages as $page)
                            <option value="{{$page->id}}">{{$page->title}}</option>
                            @endforeach
                        </select> 



                        </form>

                        </div>

                
                    </div>

                    <div class="row">
                        <button type="submit" form="form{{$category->id}}" name="landingpage" value="1" class="btn main-btn mx-2"><i class="fas fa-fw fa-angle-double-right"></i> Add landing to keywords</button>
                        

                        <button type="submit" form="form{{$category->id}}" name="regularpage" value="1" class="btn green-btn mx-2"><i class="fas fa-fw fa-angle-double-right"></i>Make regular pages</button>
                        
                    </div>
                    



                    </div>
                    @endforeach

                    </div>
                </div>
             </div>
        </div><!-- /.card-body -->
    </div> <!-- /.card -->
         
    </div>
    <!-- /col-md-10 -->
</div> 
<!-- /.row -->


<div class="row justify-content-center">
<div class="col-md-6">

<div class="card boxed">
    <div class="card-body">
        <form method="POST" id="form-images" action="{{route('add.landing.images')}}" enctype="multipart/form-data">
            @csrf
            <label class="control-label">Add image to landings</label>
            <select class="custom-select my-2 mx-2" name="category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option> 
                @endforeach
            </select> 

            <div class="form-group mr-2 ml-2">
                <label for="title" class="control-label"><strong>Image</strong></label><br>
                <input type="file" name="cover">
                <p class="help-block"><small>max file size: 1mb, JPG only!</small></p>
            </div>


            <button type="submit" class="btn main-btn mx-2"><i class="fas fa-fw fa-angle-double-right"></i> Add...</button>
        </form>
    </div>
</div>


</div>
</div>

@endsection


@section('scripts')

<script type="text/javascript">

    // $(document).ready(function(){
    //     $(".select-all").click(function(){
    //         console.log('ajme');
    //     });
    // });



// function toggle(source) {
//   checkboxes = document.getElementsByName('keywords[]');
//   for(let checkbox in checkboxes)
//     checkbox.checked = source.checked;
//   }


  function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}


</script>

@endsection