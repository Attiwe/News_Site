@extends('layout.frontend.app')
@section('title')
    {{config('app.name')}} - Profile
@endsection

@section('body')
<br>
<!-- Profile Start -->
<div class="dashboard   ">   
  <!-- Sidebar -->
   @include('frontend.dashboard._sidebar',['profile_active' => 'active'])

  <!-- Main Content -->
  <div class="main-content">
    <!-- message error -->
    @if (count($errors) > 0)
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <!-- Profile Section -->
            <form action="{{route('frontend.add-post')}}"  method="POST" enctype="multipart/form-data">
                @csrf
            <section id="profile" class="content-section active">
                <h2>{{Auth::user()->name}}</h2>
                <div class="user-profile mb-3">
                    <img name="image" src="{{Auth::user()->image}}" alt="User Image" class="profile-img rounded-circle" style="width: 100px; height: 100px;" />
                    <span class="username"> {{Auth::user()->name}}</span>
                </div>
                <br>
          <!-- Add Post Section -->
                <section id="add-post" class="  mb-5">
                    <h2>Add Post</h2>
                    <div class="post-form p-3 border rounded">
                        <!-- Post Title -->
                        <input name="title" type="text" id="postTitle" value="{{ old('title') }}" class="form-control mb-2" placeholder="Post Title" />
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                         <!-- smail description   -->
                         <textarea name="smail_desc"  value="{{ old('smail_desc') }}" class="form-control mb-2" rows="3" placeholder="Smail Description"></textarea>
                        @error('smail_desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Post Content -->
                        <textarea name="desc" id="postContent" value="{{ old('desc') }}" class="form-control mb-2" rows="3" placeholder="What's on your mind?"></textarea>
                        @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Image Upload -->
                        <input name="images[]" type="file" id="postImage"   multiple accept="image/*"  class="form-control mb-2" />
                        <div class="tn-slider mb-2">
                            <div id="imagePreview" class="slick-slider"></div>
                        </div>

                        <!-- Category Dropdown -->
                        <select name="category_id" id="postCategory"  class="form-select mb-2">
                                <option value="" class="form-select disabled text-primary " >Select Category</option>
                        @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <!-- Enable Comments Checkbox -->
                        <div class="form-check mb-2">
                            <label class="form-check-label mb-2">
                                <input name="comment_able"  type="checkbox" class="form-check-input" /> <strong> Enable Comments</strong>
                            </label><br>
                        </div>

                        <!-- Post Button -->
                        <button type="submit" class="btn btn-primary  post-btn">Post</button>
                    </div>
                </section>
            </form>

                <!-- Posts Section -->
                <section id="posts" class="posts-section">
                    <h2>Recent Posts</h2>
                    <div class="post-list">
                    
                    <!-- Post Item -->
                    @forelse ($posts as $post)
            <div class="post-item mb-4 p-3 border rounded">
                <!-- Post Header -->
                <div class="post-header d-flex align-items-center mb-2">
                    <img title="{{ Auth::user()->name }}" src="{{ Auth::user()->image }}" alt="User Image" class="rounded-circle" style="width: 50px; height: 50px;" />
                    <div class="ms-3">
                        <h5 class="mb-0"> {{ Auth::user()->username }} </h5>
                        <small class="text-muted"> {{ Auth::user()->created_at->diffForHumans() }} </small>
                    </div>
                </div>

                <!-- Post Content -->
                <h4 class="post-title"> <strong>Post Title:</strong> {{ $post->title }} </h4>
                <p class="post-content"> <strong>Description:</strong>  {!! $post->desc !!} </p>
                <p class="post-content"> <strong>Small Description:</strong> {!! $post->smail_desc !!} </p>
                <p class="post-content"> <strong>Category:</strong> {{ $post->category->name }} </p>
                 <hr>

                <!-- Carousel -->
                <div id="newsCarousel{{ $post->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($post->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img style="width: 100%;" src="{{ asset($image->path) }}" class="d-block w-100" alt="Slide">
                            </div>
                           
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#newsCarousel{{ $post->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#newsCarousel{{ $post->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <!-- Actions -->
                <div class="post-actions d-flex justify-content-between mt-3">
                    <span><i class="fas fa-eye"></i> {{ $post->number_view }}</span>
                    <div class="d-flex gap-2">
                             <!-- edite  -->
                            <a href="{{ route('frontend.edit-post',$post->slug) }}" class="btn btn-sm btn-outline-danger mr-2 ml-2"><i class="fas fa-trash"></i> Edite</a>
                              <!-- end edite -->
                              
                        <form action="{{ route('frontend.delete-post', 'delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-sm btn-outline-danger mr-2 "><i class="fas fa-trash"></i> Delete</button>
                        </form>
                           <!-- comments -->
                        <a   class="btn btn-sm btn-outline-secondary show-comment" post_id= "{{ $post->id }}" ><i class="fas fa-comment"></i> Comments</a>
                    </div>
                </div>

                <!--  show Comments   -->
                <div id="display-comments{{$post->id}}" class="comments mt-3" style="display: none;">
            </div>
            </div>
            <br>
            
                @empty
                    <div class="alert alert-info text-center">No posts available</div>
                @endforelse

                  <!-- Add more posts here dynamically -->
              </div>
          </section>
      </section>
   </div>
</div>
<!-- Profile End -->
<br>
@endsection


  <!-- package bootstrap-fileinput -->
@push('js')
<script>
    $(document).ready(function() {
        // File input without upload button
        $("#postImage").fileinput({
            showUpload: false,
            previewFileType: 'any'
        });

        // Initialize summernote
        $('#postContent').summernote({
            height: 300
        });
    });
</script>

 <!-- show comments in dashboard -->
<script>
    $(document).on('click', '.show-comment', function($e) {                         
        $e.preventDefault(); 
        var post_id = $(this).attr('post_id');
        $.ajax({
            type: "GET",
            url: '{{ route("frontend.show-more-comments-dashbord",":post_id") }}'.replace(':post_id', post_id),

            success:function(data){
                $('#display-comments' + post_id).empty();
                $.each(data, function(index, comment) {
                    $('#display-comments' + post_id).append(`
                        <div class="comment">
                            <img src="${comment.user.image}" alt=" ${comment.user.name}" class="comment-img" />
                            <div class="comment-content">
                                <span class="username"> ${comment.user.name} </span>
                                <p class="comment-text">${comment.commit}</p>
                            </div>
                        </div>
                    `);
                })
                $('#display-comments' + post_id).show();
                // $('.show-comment').hide();  
            },
            
           

            
        })
        
    })
</script>

@endpush


 