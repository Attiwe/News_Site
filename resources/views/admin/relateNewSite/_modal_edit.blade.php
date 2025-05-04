<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $relatedNewsSite->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> Edit Related News Site</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action=" {{route('admin.related-news-sites.update','relatedNewsSite')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $relatedNewsSite->id }}">
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">  
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $relatedNewsSite->name }}">
            </div>
                </div>
            
            <div class="col-md-6">
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ $relatedNewsSite->url }}">
            </div>
            </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
   
    </div>
  </div>
</div>
