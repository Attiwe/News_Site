@extends('layout.dashboard.app')
@section('title', 'Create Post')
@section('body')

<br>
<div class=" container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Create Posts</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating"> <strong>Title</strong> </label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"  >
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                 <!-- Category Dropdown -->
                                 <div class="form-group">
                                    <label class="bmd-label-floating"> <strong>Category</strong></label>
                                    <select name="category_id" class="form-control">
                                        <option  selected disabled> select category</option>
                                        @foreach ($categories as $category) 
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
 
                        </div>

                        <div class="row mb-3">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating"> <strong>Status</strong></label>
                                    <select name="status" class="form-control">
                                        <option  selected disabled> select status</option>
                                        <option value= 1>Active</option>
                                        <option value= 0>In Active</option>
                                    </select>
                                </div>
                                @error('comment_able')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating"> <strong>Enable Comments</strong></label>
                                    <select name="comment_able" class="form-control">
                                        <option  selected disabled> select status</option>
                                        <option value= 1>Active</option>
                                        <option value= 0>In Active</option>
                                    </select>
                                </div>
                                @error('comment_able')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <!-- smail description   -->
                                <textarea name="smail_desc"  value="{{ old('smail_desc') }}" class="form-control mb-2" rows="3" placeholder="Smail Description"></textarea>
                                @error('smail_desc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <!-- Post Content -->
                                <textarea name="desc" id="postContent" value="{{ old('desc') }}" class="form-control mb-2" rows="3" placeholder="What's on your mind?"></textarea>
                                @error('desc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input name="images[]" type="file" id="postImage"   multiple accept="image/*"  class="form-control mb-2" />
                                <div class="tn-slider mb-2">
                                    <div id="imagePreview" class="slick-slider"></div>
                                </div>
                                @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-primary pull-right mt-3 ">Create</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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
