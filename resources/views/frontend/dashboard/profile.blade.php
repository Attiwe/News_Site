@extends('layout.frontend.app')
@section('title')
    {{config('app.name')}} - Profile
@endsection

@section('body')
<br>
<!-- Profile Start -->
<div class="dashboard container">   
  <!-- Sidebar -->
  <aside class="col-md-3 nav-sticky dashboard-sidebar">
      <!-- User Info Section -->
      <div class="user-info text-center p-3">
          <img src="{{Auth::user()->image}}" alt="User Image" class="rounded-circle mb-2"
              style="width: 80px; height: 80px; object-fit: cover" />
          <h5 class="mb-0 text-info" > {{Auth::user()->username}}</h5>
      </div>

      <!-- Sidebar Menu -->
      <div class="list-group profile-sidebar-menu">
          <a href="./dashboard.html" class="list-group-item list-group-item-action active menu-item" data-section="profile">
              <i class="fas fa-user"></i> Profile
          </a>
          <a href="./notifications.html" class="list-group-item list-group-item-action menu-item" data-section="notifications">
              <i class="fas fa-bell"></i> Notifications
          </a>
          <a href="./setting.html" class="list-group-item list-group-item-action menu-item" data-section="settings">
              <i class="fas fa-cog"></i> Settings
          </a>
      </div>
  </aside>

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
          <section id="add-post" class="add-post-section mb-5">
              <h2>Add Post</h2>
              <div class="post-form p-3 border rounded">
                  <!-- Post Title -->
                  <input name="title" type="text" id="postTitle" value="{{ old('title') }}" class="form-control mb-2" placeholder="Post Title" />
                  @error('title')
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

                  <!-- Enable Comments Checkbox -->
                  <label class="form-check-label mb-2">
                      <input name="comment_able"  type="checkbox" class="form-check-input" /> Enable Comments
                  </label><br>

                  <!-- Post Button -->
                  <button type="submit" class="btn btn-primary btn-sm post-btn">Post</button>
              </div>
          </section>
    </form>

          <!-- Posts Section -->
          <section id="posts" class="posts-section">
              <h2>Recent Posts</h2>
              <div class="post-list">
                  <!-- Post Item -->

                  @foreach ($posts as $post )
                  
                  <div class="post-item mb-4 p-3 border rounded">
                      <div class="post-header d-flex align-items-center mb-2">
                          <img title="{{Auth::user()->name}}" src="{{Auth::user()->image}}" alt="User Image" class="rounded-circle" style="width: 50px; height: 50px;" />
                          <div class="ms-3">
                              <h5 class="mb-0"> {{Auth::user()->username}} </h5>
                              <small class="text-muted"> {{Auth::user()->created_at->diffForHumans()}} </small>
                          </div>
                      </div>
                          <h4 class="post-title"> {{ $post->title }} </h4>
                      <p class="post-content"> {!!$post->desc!!} </p>

                      <div id="newsCarousel" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                              <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#newsCarousel" data-slide-to="1"></li>
                              <li data-target="#newsCarousel" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                              @foreach ($post->images as $image)
                              <div class="carousel-item @if($loop->index == 0 ) active @endif">
                                  <img style="width: 1280px;  : 900px;" src="{{asset($image->path)}}" class="d-block w-100" alt="First Slide">
                                  <div class="carousel-caption d-none d-md-block">
                                      <h5> {{ $post->title }} </h5>
                                       
                                  </div>
                                </div>
                                @endforeach
                              <!-- Add more carousel-item blocks for additional slides -->
                          </div>
                          <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a>
                      </div>
                      
                      <div class="post-actions d-flex justify-content-between ">
                        <div class="post-stats">
                            <!-- View Count -->
                            <span class="me-3">
                                <i class="fas fa-eye"></i> {{ $post->number_view }}
                            </span>
                        </div>

                        <div class="d-flex gap-2">
                            <!-- Edit -->
                            <a href=" " class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('frontend.delete-post', 'delete') }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $post->id }}" >
                                <button type="submit" class="btn  btn-sm btn-outline-danger mr-2 ml-2">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            <!-- Comments -->
                            <a href=" " class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-comment"></i> Comments
                            </a>
                        </div>
                    </div>

                        <!-- Display Comments -->
                        <div class="comments">
                              <div class="comment">
                                  <img src="{{asset('test.jpg')}}" alt="User Image" class="comment-img" />
                                  <div class="comment-content">
                                      <span class="username"></span>
                                      <p class="comment-text">first comment</p>
                                  </div>
                              </div>
                          <!-- Add more comments here for demonstration -->
                         </div>
                  </div>
                  @endforeach
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

@endpush


 