@extends('layout.dashboard.app')
@section('title')
    - Edit Post
@endsection

{{-- plugin dropify --}}
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" /> 
@endpush

@section('body')

<style> 
    .custom-card {
        max-width: 90%;
        width: 100%;
        margin: 0 auto;
    }
</style>

<div class="container-fluid mt-5">  
    <div class="card custom-card">  
        <div class="card-header">
            <h2>Edit Settings</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input name="id" value="{{ $getSetting->id }}" hidden>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="site_name">Site Name</label>
                        <input type="text" name="stie_name" required class="form-control form-control-lg" id="stie_name" placeholder="Enter site name" value="{{ old('stie_name', $getSetting->site_name) }}">
                        @error('stie_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" required class="form-control form-control-lg" id="email" placeholder="Enter email" value="{{ old('email', $getSetting->email) }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" required class="form-control form-control-lg" id="phone" placeholder="Enter phone number" value="{{ old('phone', $getSetting->phone) }}">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="facebook">Facebook URL</label>
                        <input type="text" name="facebook" required class="form-control form-control-lg" id="facebook" placeholder="Enter Facebook URL" value="{{ old('facebook', $getSetting->facebook) }}">
                        @error('facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="linkedin">LinkedIn URL</label>
                        <input type="text" name="linkendin" required class="form-control form-control-lg" id="linkedin" placeholder="Enter LinkedIn URL" value="{{ old('linkendin', $getSetting->linkendin) }}">
                        @error('linkendin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="twitter">Twitter URL</label>
                        <input type="text" name="twitter" required class="form-control form-control-lg" id="twitter" placeholder="Enter Twitter URL" value="{{ old('twitter', $getSetting->twitter) }}">
                        @error('twitter')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="youtube">YouTube URL</label>
                        <input type="text" name="youtube" required class="form-control form-control-lg" id="youtube" placeholder="Enter YouTube URL" value="{{ old('youtube', $getSetting->youtube) }}">
                        @error('youtube')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="instagram">Instagram URL</label>
                        <input type="text" name="instagram" required class="form-control form-control-lg" id="instagram" placeholder="Enter Instagram URL" value="{{ old('instagram', $getSetting->instagram) }}">
                        @error('instagram')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <input type="text" name="country" required class="form-control form-control-lg" id="country" placeholder="Enter country" value="{{ old('country', $getSetting->country) }}">
                        @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" name="city" required class="form-control form-control-lg" id="city" placeholder="Enter city" value="{{ old('city', $getSetting->city) }}">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="street">Street</label>
                        <input type="text" name="street" required class="form-control form-control-lg" id="street" placeholder="Enter street" value="{{ old('street', $getSetting->street) }}">
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="small_desc">Small Description</label>
                        <textarea name="small_desc" required class="form-control form-control-lg" id="small_desc" rows="3" placeholder="Enter small description">{{ old('small_desc', $getSetting->small_desc) }}</textarea>
                        @error('small_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="mb-3 form-group col-md-6">
                        <label for="logoInput"  required class="form-label">Logo</label>
                        <input class="dropify" type="file" accept="image/*" name="logo" id="logoInput" data-default-file="{{ asset($getSetting->logo) }}">
                    </div>

                    <div class="mb-3 form-group col-md-6">
                        <label for="faviconInput" required class="form-label">Favicon</label>
                        <input class="dropify" type="file" accept="image/*" name="favicon" id="faviconInput" data-default-file="{{ asset($getSetting->favicon) }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
            </form>
        </div>
    </div>
</div>
<br>
<br>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>  
@endpush
