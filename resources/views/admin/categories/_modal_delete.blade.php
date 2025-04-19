  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter_{{ $categery->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Delete Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this category? </p> 
        
        <form action=" {{route('admin.categories.destroy','delete')}}" method="POST">
            @csrf
            @method('DELETE') 
            <input type="hidden" name="id" value="{{ $categery->id }}">
            <input type="text"class="form-control"  name="name" value="{{ $categery->name }}" disabled>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </form>
      </div>
   
    </div>
  </div>
</div>