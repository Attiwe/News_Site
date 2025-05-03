@extends('layout.dashboard.app')

@section('title', 'Related News Site')

@section('body')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800  ">Related News Site</h1>
        <p class="mb-4 text-secondary"> The related news site sign up of News Socail </p>
            <div class=" mb-4">
                <a href="{{ route('admin.related-news-sites.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"> </i> Add Related News Site </a>
            </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> List of Related News Site </h6>
                <div class="d-flex flex-row-reverse bd-highlight mt-3 mb-3">
                    <a href="{{ route( 'admin.related-news-sites.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to  
                    </a>
                </div>
            </div>
          
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center" >

                            <tr class="text-dark table-info" >
                                <th>#</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Created At</th>
                                <th>Opreation</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" >
                            @forelse($relatedNewsSites as $relatedNewsSite)
                               <tr>
                                <td class=" text-primary" > {{ $loop->iteration }}</td>
                                <td class=" text-primary" > {{ $relatedNewsSite->name ?? 'Unknown' }}</td>
                                <td class=" text-primary" > {{ $relatedNewsSite->url ?? 'Unknown' }}</td>
                                <td class=" text-primary" > {{ $relatedNewsSite->created_at->diffForHumans() ?? 'Unknown' }}</td>
                                <td>
                                    <!-- edit -->                                  
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{ $relatedNewsSite->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                     <!-- modal edit -->
                               @include('admin.relateNewSite._modal_edit')
                                
                                 
                                     <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter_{{ $relatedNewsSite->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                               </tr>
                               <!-- modal delete -->
                               @include('admin.relateNewSite._modal_delete')
                               
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$relatedNewsSites->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

@endsection