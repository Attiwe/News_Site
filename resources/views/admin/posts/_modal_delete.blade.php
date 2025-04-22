  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter_{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"> Delete Post </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this post? </p> 
        
        <form action=" {{route('admin.posts.destroy','delete')}}" method="POST">
            @csrf
            @method('DELETE') 
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="text"class="form-control"  name="name" value="{{ $post->title }}" disabled>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </form>
      </div>
   
    </div>
  </div>
</div>