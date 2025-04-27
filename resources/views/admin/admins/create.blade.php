@extends('layout.dashboard.app')
@section('title', 'Create Admin')
@section('body')

<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Create admin</h4>
                    <div class="d-flex flex-row-reverse bd-highlight mt-3 mb-3">
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action=" {{ route('admin.admins.store') }} " method="POST"   >
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
                                    <label class="bmd-label-floating">User Name</label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email </label>
                                    <input type="email" name="email" class="form-control"  value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                   <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                             </div>
                                
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Status</label>
                                    <select name="status" class="form-control">
                                        <option   selected disabled >Select Status</option>
                                        <option value= 1>Active</option>
                                        <option value= 0>In Active</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Role</label>
                                    <select name="role_id" class="form-control">
                                        <option   selected disabled >Select Role</option>
                                         @forelse($authorizations as $authorization)
                                            <option value="{{ $authorization->id }}">{{ $authorization->role }}</option>
                                         @empty
                                            <option value="">No Roles Available</option>
                                         @endforelse    
                                    </select>
                                </div>
                                @error('role_id')
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