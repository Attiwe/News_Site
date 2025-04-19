<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $categery->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action=" {{route('admin.categories.update','categery')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $categery->id }}">
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $categery->name }}">
            </div>
                </div>
            
            <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="{{ $categery->status }}">{{$categery->status == 1 ? 'Active' : 'Inactive'}}</option>
                    <option value="1" {{ $categery->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $categery->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            </div>


            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
   
    </div>
  </div>
</div>
