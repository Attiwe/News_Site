<!-- Modal -->
<div class="modal fade" id="exampleModalLong_{{ $user->id }}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h2>{{ $user->name }} {{ $user->username }}</h2>
            <p class="text-secondary ">Status : {{ $user->status }}</p>
            
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item @if($loop->first) active @endif">
                  <img src="{{ asset($user->image) }}" class="d-block w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer  d-flex justify-content-center  ">
        <button type="button" class="btn btn-primary mr-3" data-dismiss="modal">Close</button>

        <div>
          <a href=" {{route('admin.users.status', $user->id)}} " class="btn btn-sm btn-info">
            @if($user->status == 'active')
              <i class="fa-regular fa-circle-stop"></i>
            @else
              <i class="fa-solid fa-play"></i>
            @endif
          </a>
        </div>
      </div>
    </div>
  </div>
</div>