@extends('layout.dashboard.app')

 @section('title', 'Contact Us List')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Contact Us</h1>
        <p class="mb-4 text-secondary"> The contact sign up of News Socail </p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Contact </h6>
                <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <a href="{{ route('admin.contact-us.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
             </div>
            </div>
            <!-- filter select Search by -->
            @include('admin.contactUs._filter_selected')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="" >
                            <tr class="text-dark table-info"  >
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>title</th>
                                <th>phone</th>
                                <th>ip_address</th>
                                <th>Status</th>
                                <th>body</th>
                                 <th>Opreation</th>
                            </tr>
                        </thead>        
                        <tbody>
                            @forelse($contacts as $contact)
                                <tr>
                                    <td class=" text-primary" > {{ $loop->iteration }}</td>
                                    <td class=" text-primary" > {{ $contact->name ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $contact->email ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $contact->title ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $contact->phone ?? 'Unknown' }}</td>
                                    <td class=" text-primary" > {{ $contact->ip_address ?? 'Unknown' }}</td>
                                    <td class=" text-primary" >  
                                        @if($contact->status == 1)
                                        <span class="badge badge-success">Read</span>
                                        @else
                                        <span class="badge badge-danger">Unread</span>
                                        @endif
                                    </td>
                                    <td class=" text-primary" > {{ Str::limit($contact->body,20) ?? 'Unknown' }}</td>

                                    <td class=" text-primary" >                                     
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $contact->id }}">
                                        <i class="fa-solid fa-trash"></i>
                               </button> 

                                <!--  show -->
                                  <a href="{{ route('admin.contact-us.show', $contact->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                  </a>

                                </td>
                                </tr>
                                <!-- {{-- Modal delete --}} -->
                                @include('admin.contactUs._modald_delete')
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$contacts->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

@endsection