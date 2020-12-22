<!-- Modal -->
<div class="modal fade" id="new-urlword" tabindex="-1" role="dialog" aria-labelledby="createUrlwordLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header main-area">
      <div class="head-panel px-5 py-3">
        <h5 class="modal-title text-white" id="createUrlwordLabel"><strong>Add new keyword</strong></h5>
      </div>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
      </button>
      
    </div>
    <div class="modal-body">

       <form method="POST" id="add-urlword" action="{{ route('urlwords.store') }}">
       {{ csrf_field() }}

        
       <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="category" class="control-label bg-gradient-red py-2 px-3"><strong><i class="fa fa-arrow-circle-right"></i> Important: select category!</strong></label>
          <select class="form-control form-control-sm" name="urlword_category_id" required>
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
          </select>
        <p class="help-block text-muted"><small>Select keyword category</small></p>
      </div>



        <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="name" class="control-label"><strong>Keyword</strong></label>
          <input type="text" class="form-control" name="name[]" placeholder="...">
          <p class="help-block text-muted"><small>Enter a keyword</small></p>
        </div>

        <div id="add-keyword"></div>
        <div class="form-group mx-2 mt-3 mb-5">
          <button type="button" class="btn btn-success btn-sm" onclick="addKeywordField()"><strong>+ Add another keyword</strong></button>
        </div>


        </form>

    </div>
    <div class="modal-footer main-area">
      <button class="btn btn-block main-btn" form="add-urlword" type="submit"><i class="fas fa-fw fa-angle-double-right"></i> Add urlword</button>
    </div>
  </div>
</div>
</div>