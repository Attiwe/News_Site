@extends('layout.dashboard.app')
@section('title')
    {{config('app.name')}} - Edit Post
@endsection

@section('body')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Post</h4>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Back to Dashboard
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.update','posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <!-- User Profile Section -->
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                            <img src="{{ asset($post->user->image ?? $post->admin->image) }}" alt="{{ $post->user->name ?? $post->admin->name }}" 
                                 class="rounded-circle me-3" style="width: 60px; height: 60px;"  > 
                            <div>
                                <h5 class="mb-0">{{ $post->user->name ?? $post->admin->name }}</h5>
                                <small class="text-muted">Posted on  </small>
                            </div>
                        </div>

                        <!-- Post Form -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Post Title -->
                                <div class="mb-3">
                                    <label for="postTitle" class="form-label">Post Title</label>
                                    <input type="text" name="title" id="postTitle" value="{{ $post->title }}" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           placeholder="Enter post title">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- smail description -->
                                <div class="mb-4">
                                    <label  class="form-label">Small Description</label>
                                    <textarea name="smail_desc" 
                                              class="form-control @error('smail_desc') is-invalid @enderror" 
                                              rows="10">{{ $post->smail_desc }}</textarea>
                                    @error('smail_desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Post Content -->
                                <div class="mb-4">
                                    <label for="postContent" class="form-label">Post Content</label>
                                    <textarea name="desc" id="postContent" 
                                              class="form-control @error('desc') is-invalid @enderror" 
                                              rows="10">{{ $post->desc }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <label for="postImage" class="form-label">Upload Images</label>
                                    <input name="images[]" type="file" id="postImage" multiple accept="image/*" 
                                           class="form-control @error('images') is-invalid @enderror">
                                    <div class="mt-2">
                                        <small class="text-muted">Select multiple images by holding Ctrl/Cmd</small>
                                    </div>
                                    @error('images')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Existing Images Preview -->
                                <div class="mb-4">
                                    <h6 class="mb-3">Existing Images</h6>
                                    <div class="row g-2">
                                        @foreach($post->images as $image)
                                            <div class="col-3">
                                                <div class="card h-100">
                                                    <img src="{{ asset($image->path) }}" alt="Post Image" 
                                                         class="card-img-top rounded">
                                                    <div class="card-body p-2">
                                                        <p class="mb-0 small text-muted">
                                                            {{ pathinfo($image->path, PATHINFO_FILENAME) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Category Dropdown -->
                                <div class="mb-4">
                                    <label for="postCategory" class="form-label">Category</label>
                                    <select name="category_id" id="postCategory" 
                                            class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="{{ $post->category_id }}" selected>
                                            {{ $post->category->name }}
                                        </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Comments Setting -->
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input name="comment_able" type="checkbox" class="form-check-input" id="commentAble" 
                                               value="1" {{ $post->comment_able ? 'checked' : '' }}>
                                        <label class="form-check-label" for="commentAble">Enable Comments</label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-sm btn-info ">
                                        <i class="fas fa-save me-2"></i> Update Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Initialize Summernote with image upload
        $('#postContent').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#postContent').summernote('insertImage', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }
        });

        // File input styling
        $('#postImage').fileinput({
            showUpload: false,
            previewFileType: 'any',
            maxFileCount: 10,
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
            previewFileIcon: '<i class="fas fa-file"></i>',
            previewSettings: {
                image: { width: "160px", height: "160px" }
            }
        });

        // Add tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush