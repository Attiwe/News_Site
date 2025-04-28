@extends('layout.dashboard.app')

@section('title', 'Admins List')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Admins</h1>
        <p class="mb-4 text-secondary"> The admins sign up of News Socail </p>
        <div class=" mb-4">
                <a href="{{ route('admin.admins.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"> </i> Add Admin </a>
            </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Admins </h6>
                <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <a href="{{ route('admin.admins.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
             </div>
            </div>
            <!-- filter select Search by -->
            @include('admin.admins._filter_selected')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="" >
                            <tr class="text-dark table-info"  >
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Opreation</th>
                            </tr>
                        </thead>        
                        <tbody>
                            @forelse($admins as $admin)
                                <tr>
                                    <td class=" text-primary" > {{ $loop->iteration }}</td>
                                    <td class=" text-primary" > {{ $admin->name ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $admin->username ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $admin->email ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $admin->created_at->format('Y-m-d H:i') ?? 'Unknown' }}</td>
                                    <td class=" text-primary" >
                                        @if($admin->status == 1 )
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class=" text-primary" >
                                        <span class="badge badge-success"> {{ $admin->role->role ?? 'Unknown' }} </span>
                                    </td>
                                    <td class=" text-primary">   
                                        <!-- edit -->
                                    <a href="{{route('admin.admins.edit', [$admin->id , 'page' => request()->page])}}" class="btn btn-sm btn-info"><i class="fa-solid fa-user-pen"></i></a>
                                 
                                    
                                    <!-- route status -->
                                    <a href=" {{route('admin.admins.status',$admin->id)}} " class="btn btn-sm btn-primary"> 
                                        @if($admin->status == 1)
                                        <i class="fa-regular fa-circle-stop"></i>
                                        @else
                                        <i class="fa-solid fa-play"></i>
                                        @endif
                                    </a>
                                    
                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $admin->id }}">
                                        <i class="fa-solid fa-trash"></i>
                               </button> 
                               
                                </td>
                                </tr>
                                {{-- Modal delete --}}
                                @include('admin.admins._modald_delete')
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$admins->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

@endsection