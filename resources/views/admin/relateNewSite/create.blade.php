@extends('layout.dashboard.app')
@section('title', 'Create Related News Site')
@section('body')
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Create Related News Site</h4>
                    <div class="d-flex flex-row-reverse bd-highlight mt-3 mb-3">
                        <a href="{{ route('admin.related-news-sites.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to  
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.related-news-sites.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"  >
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">URL</label>
                                    <input type="text" name="url" class="form-control" value="{{ old('url') }}"  >
                                </div>
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                     
                        </div>
                       
                        <button type="submit" class="btn btn-primary pull-right ">Create</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection