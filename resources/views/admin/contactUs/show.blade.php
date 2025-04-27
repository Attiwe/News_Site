@extends('layout.dashboard.app')

@section('title', 'Contact Us')

@section('body')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Show Contact Us</h4>
                    <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <a href="{{ route('admin.contact-us.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
             </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control" value="{{ $contact->name ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="text" class="form-control" value="{{ $contact->email ?? '' }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">title</label>
                                <input type="text" class="form-control" value="{{ $contact->title ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">phone</label>
                                <input type="text" class="form-control" value="{{ $contact->phone ?? '' }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">ip_address</label>
                                <input type="text" class="form-control" value="{{ $contact->ip_address ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Status</label>
                                <input type="text" class="form-control" value="{{ $contact->status == 1 ? 'Read' : 'Unread' }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">body</label>
                                <textarea class="form-control" rows="5" disabled>{{ $contact->body ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                      
                      <button type="button" class="btn btn-sm btn-primary mr-2"> <i class="fa-solid fa-reply"></i> Reply</button>

                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $contact->id }}">
                                        <i class="fa-solid fa-trash"></i> Delete
                               </button> 
                               <!-- {{-- Modal delete --}} -->
                               @include('admin.contactUs._modald_delete')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

