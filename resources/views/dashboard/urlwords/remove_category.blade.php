<!-- Modal -->
<div class="modal fade" id="remove-category" tabindex="-1" role="dialog" aria-labelledby="createCategoryLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header main-area">
      <h5 class="modal-title bg-gradient-red text-white px-5 py-3" id="createCategoryLabel"><strong>Remove category</strong></h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
      </button>
      
    </div>
    <div class="modal-body">
      <div class="container-fluid">
  
    <p><span class="badge badge-pill badge-warning text-white"> <strong>Warning!</strong></span><br><small>  All the keywords from selected category will be deleted as well.</small></p>

    @foreach($categories as $category)
    <div class="row my-5">
      <div class="col-md-8">
        <form method="POST" id="remove-category-{{$category->id}}" action="{{ route('urlwords_category.destroy', $category->id) }}">
          {{ csrf_field() }}
          @method('DELETE')
          <label for="name" class="control-label"><strong>{{$category->name}}</strong></label>
        </form>
      </div>
      <div class="col-md-4">
        <button class="btn btn-sm btn-danger float-right" form="remove-category-{{$category->id}}" type="submit"><i class="fas fa-fw fa-angle-double-right"></i> Delete</button>
      </div>
    </div>  
    @endforeach
     
      </div>
    </div>
    <div class="modal-footer main-area">...</div>
  </div>
</div>
</div>