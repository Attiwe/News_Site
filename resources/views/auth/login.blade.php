@extends('layout.frontend.app')
@section('title', 'Login')

@section('body')
<div class="bg-primary bg-gradient min-vh-100 d-flex align-items-center py-5" style="--bs-bg-opacity: 0.8;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <!-- Magical Header -->
                    <div class="card-header bg-purple bg-gradient text-white py-4 position-relative">
                        <h3 class="text-center mb-0">
                            <i class="fas fa-hat-wizard me-2"></i>
                            {{ __('Login') }}
                            <i class="fas fa-wand-sparkles ms-2"></i>
                        </h3>
                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                            <i class="fas fa-stars fa-spin text-warning"></i>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <!-- Wizard Animation (using Bootstrap + Font Awesome) -->
                            <div class="text-center mb-4">
                                <div class="d-inline-block position-relative">
                                    <i class="fas fa-hat-wizard text-purple fa-4x"></i>
                                    <div class="position-absolute top-100 start-50 translate-middle">
                                        <div class="bg-light rounded-circle p-1 shadow-sm">
                                            <div class="d-flex justify-content-center gap-2">
                                                <span class="d-inline-block rounded-circle bg-dark" style="width: 10px; height: 10px;"></span>
                                                <span class="d-inline-block rounded-circle bg-dark" style="width: 10px; height: 10px;"></span>
                                            </div>
                                            <div class="bg-dark rounded-pill mx-auto mt-1" style="width: 20px; height: 3px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4 form-floating">
                                <input id="email" type="email" class="form-control border-purple @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       placeholder="Email Address">
                                <label for="email" class="text-purple">
                                    <i class="fas fa-envelope me-2"></i>{{ __('Email Address') }}
                                </label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4 form-floating">
                                <input id="password" type="password" class="form-control border-purple @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password" placeholder="Password">
                                <label for="password" class="text-purple">
                                    <i class="fas fa-lock me-2"></i>{{ __('Password') }}
                                </label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input border-purple" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label text-purple" for="remember">
                                            <i class="fas fa-bookmark me-1"></i>{{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none text-purple" href="{{ route('password.request') }}">
                                            <i class="fas fa-key me-1"></i>{{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-purple btn-lg text-white">
                                    <i class="fas fa-hat-wizard me-2"></i>{{ __('Cast Login Spell') }}
                                </button>
                            </div>

                            <!-- Divider -->
                            <div class="d-flex align-items-center my-4">
                                <hr class="flex-grow-1 border-purple">
                                <span class="mx-3 text-purple">or</span>
                                <hr class="flex-grow-1 border-purple">
                            </div>

                            <!-- Social Login -->
                            <div class="text-center">
                                <p class="mb-3 text-purple"><i class="fas fa-magic me-1"></i> Continue with magic from:</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" class="btn btn-outline-purple rounded-circle">
                                        <i class="fab fa-google"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-purple rounded-circle">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-purple rounded-circle">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Register Link -->
                    <div class="card-footer bg-light text-center py-3">
                        <p class="mb-0 text-purple">New to our magical realm? 
                            <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-purple">
                                <i class="fas fa-scroll me-1"></i>Create an account
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add these style tags in your layout file or create a custom CSS file -->
<style>
    /* Custom purple color using Bootstrap variables */
    :root {
        --bs-purple:rgb(41, 128, 185);
    }
    
    .bg-purple {
        background-color: var(--bs-purple) !important;
    }
    
    .text-purple {
        color: var(--bs-purple) !important;
    }
    
    .border-purple {
        border-color: var(--bs-purple) !important;
    }
    
    .btn-purple {
        background-color: var(--bs-purple) !important;
        border-color: var(--bs-purple) !important;
    }
    
    .btn-outline-purple {
        color: var(--bs-purple) !important;
        border-color: var(--bs-purple) !important;
    }
    
    .btn-outline-purple:hover {
        background-color: var(--bs-purple) !important;
        color: white !important;
    }
    
    .bg-purple.bg-gradient {
        background-image: linear-gradient(135deg, var(--bs-purple) 0%, #4a00e0 100%) !important;
    }
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection