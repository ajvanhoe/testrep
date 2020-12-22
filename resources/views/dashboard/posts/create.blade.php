<!-- Modal -->
<div class="modal fade" id="new-post" tabindex="-1" role="dialog" aria-labelledby="newPostLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header main-area">
    <div class="head-panel px-5 py-3">
      <h5 class="modal-title text-white" id="createUrlwordLabel"><strong>Add new article</strong></h5>
      </div>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
      </button>
      
    </div>
    <div class="modal-body">


   <form method="POST" action="{{ route('posts.store') }}" id="add-post" enctype="multipart/form-data">
       <div class="form-group mu-3 mb-3 mr-2 ml-2">
        
        <label for="title" class="control-label"><strong>Title</strong></label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title...">
      </div>


      <div class="form-group mr-2 ml-2">
          <label for="title" class="control-label"><strong>Image</strong></label><br>
          <input type="file" name="cover">
          <p class="help-block"><small>max file size: 1mb</small></p>
      </div>

      <div class="form-group mb-3 mr-2 ml-2">
         <label for="title" class="control-label"><strong>Post</strong></label>
         <textarea name="post" id="editor" rows="10" class="form-control"  placeholder="Post..."></textarea>
      </div>
        {{ csrf_field() }}
       
    </form>

    <div class="modal-footer">
        <button class="btn btn-block main-btn" form="add-post" type="submit"><i class="fas fa-fw fa-angle-double-right"></i> Add new article</button>
    </div>
  </div>
</div>
</div>