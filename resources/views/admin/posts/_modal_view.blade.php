<!-- Modal -->
<div class="modal fade" id="exampleModalLong_{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-primary">{{ $post->title }}</h2>
                     <p class="mb-2">  Category: <strong class="text-primary">{{ $post->category->name }}</strong></p>
                    <div class="row">
                        <div class="col-md-12">
                          <label for="smail_desc">Smail Description</label>
                            <p class="mb-2">    <strong class="text-dark">{!! $post->smail_desc !!}</strong></p>
                        </div> 
                        <div class="col-md-12">
                            <label class="mt-3" for="desc">Description</label>
                            <p class="mb-2">   <strong class="text-dark">{!! $post->desc !!}</strong></p>
                        </div>
                    </div>
                    @if ($post->images->count() > 0)
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($post->images as $image)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img src="{{ asset($image->path) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
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
                    @endif
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer  d-flex justify-content-center  ">
        <button type="button" class="btn btn-secondary mr-3"  data-dismiss="modal">Close</button>
        <i class="fa-solid fa-eye"></i> <strong class="text-secondary "> {{ $post->number_view ?? '0' }} Views</strong>
       </div>
    </div>
  </div>
</div>