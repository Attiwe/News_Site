@extends('layout.dashboard.app')

 @section('title', 'Authorization List')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Authorization</h1>
        <p class="mb-4 text-secondary"> The permissions sign up of News Socail </p>
        <div class=" mb-4">
                <a wire:navigate href=" {{ route('admin.authorization.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"> </i> Add Permission </a>
            </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Permissions </h6>
                <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <a href="{{ route('admin.authorization.index',['page' => request()->page]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
             </div>
            </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center" >
                            <tr class="text-dark table-info"  >
                                <th>#</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Opreation</th>
                            </tr>
                        </thead>        
                        <tbody class=" text-center" >
                            @forelse($authorizations as $authorization)
                                <tr>
                                    <td class=" text-primary" > {{ $loop->iteration }}</td>
                                    <td class=" text-primary" > {{ $authorization->role ?? 'Unknown' }}</td>    
                                    <td class=" text-primary" >  
                                       @foreach($authorization->permissions as $permission)
                                            <span class="badge badge-success">{{ $permission }}</span>
                                        @endforeach 
                                    </td>
                                    <td > <span class="badge badge-danger">{{ $authorization->admins->count() ?? 'Unknown' }}</span></td>
                                    <td class=" text-primary" > {{ $authorization->created_at ->format('Y-m-d H:i') ?? 'Unknown' }}</td>
                                    <td class=" text-primary" >
                                          <!-- edit -->
                                 <a href="{{ route('admin.authorization.edit',  [ $authorization->id , 'page'=>request()->page]) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $authorization->id }}">
                                        <i class="fa-solid fa-trash"></i>
                               </button> 

                                </td>
                                </tr>
                                {{-- Modal delete --}}
                                @include('admin.authorization._modald_delete')
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$authorizations->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

@endsection