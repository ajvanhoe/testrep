<div class="modal fade" id="remove-image-modal-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="remove-image-modal-{{$image->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header main-area">
        <h5 class="modal-title bg-danger text-white px-5 py-3" id="createCategoryLabel"><strong>Remove Image</strong></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
        </button>
      </div>

    <div class="modal-body">
    <p><span class="badge badge-warning text-white"><i class="fas fa-exclamation-triangle"></i></span>&nbsp;&nbsp;<strong>All of the image sizes will be removed as well!</strong>&nbsp;&nbsp;<span class="badge badge-warning text-white"><i class="fas fa-exclamation-triangle"></i></span></p>
             
       <form method="POST" id="remove-image-{{$image->id}}" action="{{ route('remove.media', $image) }}">
        {{ csrf_field() }}
        @method('DELETE')
        <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="name" class="control-label"><strong>This can not be undone!</strong></label>
          <button class="btn btn-block btn-danger float-right" form="remove-image-{{$image->id}}" type="submit"><i class="fas fa-fw fa-angle-double-right"></i> Delete</button>
        </div>
        </form>
     
    </div>
    <div class="modal-footer main-area">
    
    </div>


    </div>
  </div>
</div>