<!-- Delete Modal -->
<div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header main-area">
      <h5 class="modal-title bg-gradient-red text-white px-5 py-3" id="deleteArticleLabel"><strong>Delete article?</strong></h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Remove article from the list?</div>
    <div class="modal-footer">
      <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>

      <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        {{ csrf_field() }}
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>

    </div>
  </div>
</div>
</div>