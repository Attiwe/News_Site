@extends('layout.dashboard.app')

@section('title', 'Posts List')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Posts</h1>
        <p class="mb-4 text-secondary"> The posts sign up of News Socail </p>
           
         <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Posts </h6>
                <div class="d-flex flex-row-reverse bd-highlight mb-3">
                     
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to  
                    </a>
                  
                </div>
             </div>
            <!-- filter select Search by -->
            @include('admin.posts._filter_selected')

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="" >
                            <tr class="text-dark table-info">
                                <th>#</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Opreation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                               <tr>
                                <td class=" text-primary" > {{ $loop->iteration }}</td>
                                <td class=" text-primary" > {{ $post->user->name ??   $post->admin->name  }} </td>
                                 <td class=" text-primary" > {{ $post->category->name ?? 'Unknown' }}</td>
                                <td class=" text-primary" > {{ $post->title ?? 'Unknown' }}</td>
 
                                <td class=" text-primary" >
                                    @if($post->comment_able == 1)
                                        <span class="badge badge-success">Allow</span>
                                    @else
                                        <span class="badge badge-danger">Not Allow</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    
                                    <a class="btn btn-sm btn-success" href="{{route('admin.posts.commentable', $post->id)}}">
                                       @if($post->comment_able == 1)
                                        <i class="fa-regular fa-circle-stop"></i>
                                        @else
                                        <i class="fa-solid fa-play"></i>
                                        @endif
                                    </a>
                               
                                     <!-- Button trigger modal Delete -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter_{{ $post->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Button trigger modal View -->
                              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong_{{ $post->id }}">
                              <i class="fa-solid fa-eye"></i>
                              </button>
                              @include('admin.posts._modal_view')

                              <a class="btn btn-sm btn-success" href="{{route('admin.posts.status', $post->id)}}">
                                       @if($post->status == 1)
                                       <i class="fa-solid fa-check"></i>
                                        @else
                                        <i class="fa-solid fa-play"></i>  
                                        @endif
                                    </a>
                                   @if($post->user_id == null)
                                       <!-- edit -->
                                 <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                @endif
                                </td>                         
                               </tr>
                               <!-- modal delete -->
                                @include('admin.posts._modal_delete')
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No posts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    
@endsection