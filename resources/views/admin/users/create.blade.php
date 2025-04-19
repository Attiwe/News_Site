@extends('layout.dashboard.app')
@section('title', 'Create User')
@section('body')

<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Create User</h4>
                </div>
                <div class="card-body">
                    <form action=" {{ route('admin.users.store') }} " method="POST" enctype="multipart/form-data"   >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Username</label>
                                    <input type="text" name="username" class="form-control"  value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Image</label>
                                    <input type="file"  accept="image/*"    name="image" class="form-control">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">In Active</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Country</label>
                                    <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                                </div>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                </div>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Street</label>
                                    <input type="text" name="street" class="form-control" value="{{ old('street') }}">
                                </div>
                                @error('street')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email Verified At</label>
                                    <select name="email_verified_at" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                </div>
                                @error('email_verified_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                           
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection