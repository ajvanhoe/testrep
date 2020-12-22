<!-- Modal -->
<div class="modal fade" id="remove-page" tabindex="-1" role="dialog" aria-labelledby="removePageLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header main-area">
      <h5 class="modal-title bg-gradient-red text-white px-5 py-3" id="removePageLabel"><strong>Remove page</strong></h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
      </button>
      
    </div>
    <div class="modal-body">

    <p><span class="badge badge-pill badge-warning text-white"> <strong>Warning!</strong></span><br><strong>All the sub pages will be removed as well!</strong></p>
             
       <form method="POST" id="remove-page-{{$page->id}}" action="{{ route('pages.destroy', $page->id) }}">
        {{ csrf_field() }}
        @method('DELETE')
        <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="name" class="control-label"><strong>This can not be undone!</strong></label>
          <button class="btn btn-block btn-danger float-right" form="remove-page-{{$page->id}}" type="submit"><i class="fas fa-fw fa-angle-double-right"></i> Delete</button>
        </div>
        </form>
     
    </div>
    <div class="modal-footer main-area">
    
    </div>
  </div>
</div>
</div>