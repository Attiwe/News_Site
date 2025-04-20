@extends('layout.dashboard.app')
@section('title', 'Create User')
@section('body')

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Create User</h4>
                        <div class="d-flex flex-row-reverse bd-highlight mt-3 mb-3">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-arrow-left"></i> Back to  
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input class="form-control" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Username</label>
                                    <input class="form-control" value="{{ $user->username }}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Image</label>
                                    <img  class="rounded mx-auto d-block" src="{{ asset($user->image) }}" alt="image"  style="width: 300px; height: 300px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Status</label>
                                    <input class="form-control" value="{{ $user->status }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Country</label>
                                    <input class="form-control" value="{{ $user->country }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">City</label>
                                    <input class="form-control" value="{{ $user->city }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Street</label>
                                    <input class="form-control" value="{{ $user->street }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Phone</label>
                                    <input class="form-control" value="{{ $user->phone }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email Verified At</label>
                                    <input class="form-control" value="{{ $user->email_verified_at ?? 'Null' }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center  ">
                            <a href=" {{route('admin.users.status', $user->id)}} " class="btn btn-sm btn-info">
                                @if($user->status == 'active')
                                    <i class="fa-regular fa-circle-stop"></i>
                                @else
                                    <i class="fa-solid fa-play"></i>
                                @endif
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal"
                                data-target="#exampleModal{{ $user->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            {{-- Modal delete --}}
                            @include('admin.users._modald_delete')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection