@extends('layout.dashboard.app')

@section('title', 'Users List')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Categories</h1>
        <p class="mb-4 text-secondary"> The categories sign up of News Socail </p>
            <div class=" mb-4">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"> </i> Add Category </a>
            </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Categories </h6>
                <div class="d-flex flex-row-reverse bd-highlight mt-3 mb-3">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to  
                    </a>
                </div>
            </div>
            <!-- filter select Search by -->
            @include('admin.categories._filter_selected')

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center" >

                            <tr class="text-dark table-info" >
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Posts count </th>
                                <th>Status</th>
                                <th>Opreation</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" >
                            @forelse($categeries as $categery)
                               <tr>
                                <td class=" text-primary" > {{ $loop->iteration }}</td>
                                <td class=" text-primary" > {{ $categery->name ?? 'Unknown' }}</td>
                                <td class=" text-primary" > {{ $categery->slug ?? 'Unknown' }}</td>
                                <td class=" text-primary" > <span class="badge badge-danger"> {{ $categery->posts_count ?? '0' }}</span></td>
                                <td class=" text-primary" >
                                    @if($categery->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- edit -->                                  
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{ $categery->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                     <!-- modal edit -->
                               @include('admin.categories._modal_edit')
                                
                                <a href=" {{route('admin.categories.status',$categery->id)}} " class="btn btn-sm btn-info"> 
                                        @if($categery->status == 1)
                                        <i class="fa-regular fa-circle-stop "></i>
                                        @else
                                        <i class="fa-regular fa-circle-play  "></i>
                                        @endif
                                    </a>
                                     <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter_{{ $categery->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                               </tr>
                               <!-- modal delete -->
                               @include('admin.categories._modal_delete')
                               
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$categeries->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

@endsection