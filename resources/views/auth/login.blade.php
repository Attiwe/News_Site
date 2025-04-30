@extends('layout.frontend.app')
@section('title', 'Login')

@section('body')
<div class="bg-light min-vh-100 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-header bg-primary text-white py-4">
                        <h3 class="text-center mb-0">
                            <i class="fas fa-newspaper me-2"></i>
                            News
                            <i class="fas fa-lock ms-2"></i>
                        </h3>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <!-- Email Field -->
                            <div class="mb-4 form-floating">
                                <input id="email" type="email" class="form-control border-primary @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       placeholder="Email Address">
                                <label for="email" class="text-primary">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4 form-floating">
                                <input id="password" type="password" class="form-control border-primary @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password" placeholder="Password">
                                <label for="password" class="text-primary">
                                    <i class="fas fa-lock me-2"></i>Password
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
                                        <input class="form-check-input border-primary" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label text-primary" for="remember">
                                            <i class="fas fa-bookmark me-1"></i>Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                            <i class="fas fa-key me-1"></i>Forgot Your Password?
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg text-white">
                                    <i class="fas fa-newspaper me-2"></i>Login
                                </button>
                            </div>

                            <!-- Divider -->
                            <div class="d-flex align-items-center my-4">
                                <hr class="flex-grow-1 border-primary">
                                <span class="mx-3 text-primary">or</span>
                                <hr class="flex-grow-1 border-primary">
                            </div>

                            <!-- Social Login -->
                            <div class="text-center">
                                <p class="mb-3 text-primary">Continue with:</p>
                                <div class="d-flex justify-content-center gap-3"> 
                                      <a href="{{ route('google.login') }}" class="btn btn-outline-primary rounded-circle">
                                        <i class="fab fa-google"></i>
                                    </a>
                                    <a href=" {{route('facebook.login' )}}" class="btn btn-outline-primary rounded-circle">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Register Link -->
                    <div class="card-footer bg-light text-center py-3">
                        <p class="mb-0 text-primary">New to News? 
                            <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">
                                <i class="fas fa-scroll me-1"></i>Register
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
