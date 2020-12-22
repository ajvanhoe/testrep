<!-- Modal -->
<div class="modal fade" id="new-category" tabindex="-1" role="dialog" aria-labelledby="createCategoryLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header main-area">
      <div class="head-panel px-5 py-3">
        <h5 class="modal-title text-white" id="createCategoryLabel"><strong>Add new category</strong></h5>
      </div>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
      </button>
      
    </div>
    <div class="modal-body">

       <form method="POST" id="add-category" action="{{ route('urlwords_category.store') }}">
       {{ csrf_field() }}
        <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="name" class="control-label"><strong>Category name</strong></label>
          <input type="text" class="form-control" name="name" placeholder="...">
          <p class="help-block text-muted"><small>Category name.</small></p>
        </div>

        <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="description" class="control-label"><strong>Description</strong></label>
          <textarea name="description" class="form-control"></textarea>
          <p class="help-block text-muted"><small>Short description of new category and its content.</small></p>
        </div>

        </form>

    </div>
    <div class="modal-footer main-area">
      <!-- <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button> -->
      <button class="btn btn-block main-btn" form="add-category" type="submit"><i class="fas fa-fw fa-angle-double-right"></i> Add category</button>
    </div>
  </div>
</div>
</div>