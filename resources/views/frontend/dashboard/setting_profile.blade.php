@extends('layout.frontend.app')
@section('title')
    {{config('app.name')}} - Settings
@endsection

@section('body')
<div class="container-fluid py-4">

 <!-- message error -->
 @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-3">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <!-- User Info Section -->
                <div class="card-body text-center p-4 border-bottom border-2 border-primary">
                    <img src="{{ asset(Auth::user()->image) }}" alt="User Image" 
                         class="rounded-circle mb-3" 
                         style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #fff; box-shadow: 0 0 15px rgba(0,0,0,0.15);">
                    <h5 class="mb-1 text-primary fw-bold">{{ Auth::user()->username }}</h5>
                    <small class="text-muted">{{ Auth::user()->name }}</small>
                </div>

                <!-- Sidebar Menu -->
                <div class="list-group list-group-flush">
                    <a href="{{ route('frontend.dashboard') }}" class="list-group-item list-group-item-action menu-item" data-section="profile">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                    <a href="{{ route('frontend.notifications-profile') }}" class="list-group-item list-group-item-action menu-item" data-section="notifications">
                        <i class="fas fa-bell me-2"></i> Notifications
                    </a>
                    <a href="{{ route('frontend.setting') }}" class="list-group-item list-group-item-action active bg-primary text-white menu-item" data-section="settings">
                        <i class="fas fa-cog me-2"></i> Settings
                    </a>
                    <a href= "javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="list-group-item list-group-item-action menu-item"
                    data-section="settings">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <!-- Settings Form -->
                    <form action="{{ route('frontend.setting') }}  " method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <!-- Personal Information -->
                        <div class="card mb-4 rounded-3">
                            <div class="card-header bg-white border-bottom border-2 border-primary">
                                <h5 class="mb-0">Personal Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" name="name" id="name" 
                                                   class="form-control border-0 shadow-sm @error('name') is-invalid @enderror" 
                                                   value="{{ $user->name }}" placeholder="Enter full name">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email" name="email" id="email" 
                                                   class="form-control border-0 shadow-sm @error('email') is-invalid @enderror" 
                                                   value="{{ $user->email }}" placeholder="Enter email">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Username -->
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-at"></i>
                                            </span>
                                            <input type="text" name="username" id="username" 
                                                   class="form-control border-0 shadow-sm @error('username') is-invalid @enderror" 
                                                   value="{{ $user->username }}" placeholder="Choose a username">
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Profile Image -->
                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Profile Image</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-image"></i>
                                            </span>
                                            <input type="file" name="image" id="image" 
                                                   class="form-control border-0 shadow-sm @error('image') is-invalid @enderror" 
                                                   accept="image/*">
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information -->
                        <div class="card mb-4 rounded-3">
                            <div class="card-header bg-white border-bottom border-2 border-primary">
                                <h5 class="mb-0">Location Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Country -->
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <input type="text" name="country" id="country" 
                                                   class="form-control border-0 shadow-sm" 
                                                   value="{{ $user->country ?? '' }}" 
                                                   placeholder="Enter country">
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-6">
                                        <label for="city" class="form-label">City</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-city"></i>
                                            </span>
                                            <input type="text" name="city" id="city" 
                                                   class="form-control border-0 shadow-sm" 
                                                   value="{{ $user->city ?? '' }}" 
                                                   placeholder="Enter city">
                                        </div>
                                    </div>

                                    <!-- Street -->
                                    <div class="col-md-6">
                                        <label for="street" class="form-label">Street</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-road"></i>
                                            </span>
                                            <input type="text" name="street" id="street" 
                                                   class="form-control border-0 shadow-sm" 
                                                   value="{{ $user->street ?? '' }}" 
                                                   placeholder="Enter street name">
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                            <input type="text" name="phone" id="phone" 
                                                   class="form-control border-0 shadow-sm" 
                                                   value="{{ $user->phone ?? '' }}" 
                                                   placeholder="Enter phone number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security -->
                        <div class="card mb-4 rounded-3">
                            <div class="card-header bg-white border-bottom border-2 border-primary">
                                <h5 class="mb-0">Security</h5>
                            </div>
                            <div class="card-body">
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group" >
                                        <span class="input-group-text bg-light border-0">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="password"   
                                               class="form-control border-0 shadow-sm @error('password') is-invalid @enderror  " 
                                               placeholder="Enter new password">
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary  btn-sm btn-lg">
                                <i class="fas fa-save me-2"></i>Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection