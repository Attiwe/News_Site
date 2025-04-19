@extends('layout.dashboard.app')

@section('title', 'Users List')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Users</h1>
        <p class="mb-4 text-secondary"> The users sign up of News Socail </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Users </h6>
            </div>
            
            <!-- filter select Search by -->
            @include('admin.users._filter_selected')


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="" >

                            <tr class="text-dark table-info"  >
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Country</th>
                                <th>City</th>
                                 <th>Phone</th>
                                <th>Opreation</th>
                            </tr>
                        </thead>        
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class=" text-primary" > {{ $loop->iteration }}</td>
                                    <td class=" text-primary" > {{ $user->name ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $user->username ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $user->email ?? 'Unknown' }}</td>
                                    <td class=" text-primary   " > <img class="rounded-circle"  src="{{ asset($user->image) ?? 'Unknown' }}" alt="User Image" style="width: 100px; height: 90px;" /></td>
                                    <td class=" text-primary" >
                                        @if($user->status == 'active' )
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class=" text-primary" > {{ $user->country ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $user->city ?? 'Unknown' }}</td>
                                     <td class=" text-danger" > {{ $user->phone ?? 'Unknown' }}</td>
                                    <td class=" text-primary" >
                                       
                                    <!-- route status -->
                                    <a href=" {{route('admin.users.status',$user->id)}} " class="btn btn-sm btn-info"> 
                                        @if($user->status == 'active')
                                        <i class="fa-regular fa-circle-stop"></i>
                                        @else
                                        <i class="fa-solid fa-play"></i>
                                        @endif
                                    </a>
                                    <!-- route edit -->
                                    <a href="{{ route('admin.users.show',$user->id) }}" class="btn btn-sm btn-primary"> <i class="fa-solid fa-eye"></i></a>
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>   
                                </td>
                                </tr>
                                {{-- Modal delete --}}
                                @include('admin.users._modald_delete')
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

@endsection