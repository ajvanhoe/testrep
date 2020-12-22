 @foreach($media as $image)
    <div class="row py-3">
        <div class="col-md-4">
            <img src="{{asset('images/uploads/medium-'.$image->file)}}" class="img-thumbnail">
            <strong>{{$image->title}}</strong>
            <span class="float-right mx-1 my-1">
                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#editImage-{{$image->id}}" role="button" aria-expanded="false" aria-controls="editImage-{{$image->id}}"><i class="fas fa-edit"></i></a>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-image-modal-{{$image->id}}"><i class="fas fa-trash-alt"></i></button>
            </span>

            


        </div>
        <div class="col-md-8" style="font-size:12px;">

        <table class="table table-sm">
            <tbody>
            <tr>
                <td>Title: </td>
                <td>{{$image->title}}</td>
            </tr>
            <tr>
                <td>Caption: </td>
                <td>{{$image->caption}}</td>
            </tr>
            <tr>
                <td>Description: </td>
                <td>{{$image->description}}</td>
            </tr>
            <tr>
                <td>Alt: </td>
                <td>{{$image->alt}}</td>
            </tr>
            <tr>
                <td>Url:</td>
                <td><a class="badge badge-primary" href="{{$image->url}}" target="__blank">{{$image->url}}</a></td>
                
            </tr>
            </tbody>
        </table>

        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="collapse" id="editImage-{{$image->id}}">
                <div class="card card-body">
                     
<form method="POST" action="{{ route('update.media', $image) }}" accept-charset="UTF-8" role="form">
    {{ csrf_field() }}
    @method('PUT')
    
    <div class="form-group mx-4">
        <label for="title" class="control-label">Title</label>
        <input type="text" id="title" name="title" value="{{$image->title}}" class="form-control"> 
        <p class="help-block text-muted"><small>Image title - creates a tooltip for image.</small></p>
    </div>

    <div class="form-group mx-4">
        <label for="caption" class="control-label">Caption</label>
        <input type="text" id="caption" name="caption" value="{{$image->caption}}" class="form-control"> 
        <p class="help-block text-muted"><small>Image caption</small></p>
    </div>

    <div class="form-group mx-4">
        <label for="description" class="control-label">Description</label>
        <input type="text" id="description" name="description" value="{{$image->description}}" class="form-control"> 
        <p class="help-block text-muted"><small>Image description</small></p>
    </div>

    <div class="form-group mx-4">
        <label for="alt" class="control-label">Image Alt Tag</label>
        <input type="text" id="alt" name="alt" value="{{$image->alt}}" class="form-control"> 
        <p class="help-block text-muted"><small>The alt attribute provides alternative information for an image if a user for some reason cannot view it.</small></p>
    </div>
    
    <div class="form-group mx-4">
        <button type="submit" class="btn btn-info btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Update image</strong></button>
    </div> 
</form>

                </div>
            </div>
        </div>
    </div>

    
<div class="row">
@include('dashboard.media.remove')
</div>

    <hr>


@endforeach    

<div class="row justify-content-center">
{{$media->links()}}
</div>
