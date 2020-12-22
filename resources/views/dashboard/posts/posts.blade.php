<!-- Posts -->
@foreach($posts as $post)
<div class="row my-5 justify-content-center">
    <div class="col-md-12">

    <div class="card">
        @if($post->image)
        <img src="{{asset('images/posts/'.$post->image)}}" class="card-img-top" alt="post-img">
        @endif
        <div class="card-body">

        <h5 class="card-title">{{$post->title}}</h5>
        <div class="card-text py-2">{!! $post->post !!}</div>
        <div class="tl-time py-2 mb-2"><i class="fa fa-clock-o"></i> {{$post->created_at}}</div>

            <div class="form-group">
                <a class="btn btn-sm btn-info" href="{{route('posts.edit', $post)}}">Edit</a>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $post->id }}">Delete</button>
            </div>

            <div>
                @include('dashboard.posts.delete')
            </div>
        
        </div>
    </div>
    
    </div>
</div>
@endforeach
