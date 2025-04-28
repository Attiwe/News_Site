@extends('layout.dashboard.app')
@section('title', 'Create Permission')
@section('body')
<br>
<br>
 
<div class="card card-body" >
    <h3 class="mb-3" > Create Permission </h3>
    <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <a wire:navigate href="{{ route('admin.authorization.index',['page' => request()->page]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
             </div>
        
 <form action="{{  route('admin.authorization.store') }}" method="POST">
    @csrf
    <div class="row ">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body mt-3">
                    <div class="main-content-label mg-b-5">
                        <div class="col-xs-7 col-sm-7 col-md-12 ">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Name Permission </label>
                                <input type="text" name="role" class="form-control" value="{{ old('role') }}">
                            </div>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul id="treeview1">
                                <li><h6 class="mt-3 text-primary" >Permission</h6>
                                    <ul>
                                        @foreach(Config('Authorization.permissions') as $key => $value)
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                            <label style="font-size: 20px;">
                                                <input type="checkbox" name="permissions[]" value="{{ $key }}" class="name">
                                                {{  $value  }} :
                                            </label>
                                            </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /col -->
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm btn-primary"> Add Permission </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
      

 </div>

@endsection