@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <h1>{{ $keywords['title'] }}</h1>

            <hr>
            <p>{{$keywords['content']}}</p>
        </div>
    </div>

    @foreach($components as $component)
        <?php $path = 'components.'.$component['component'];  ?>
        
        @include($path)

   @endforeach


        

</div>
@endsection
