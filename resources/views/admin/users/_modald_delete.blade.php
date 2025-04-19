<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h2> Are you sure you want to delete this user?</h2>
          <h4> User Name: {{ $user->name }}</h4>
        </div>
         
           <form action=" {{route('admin.users.destroy',$user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $user->id }}">
             <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </div>
          </form>
      </div>
    </div>
  </div>