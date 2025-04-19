@extends('admin.auth.layouts.app')
@section('title', 'Confirm Password')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body ">
                    {{ __('Please confirm your tonken before continuing.') }}

                    <form method="POST" action="{{ route('admin.password.verifyOtp.check') }} ">
                        @csrf

                        <div class="form-group row">
 
                            <div class="col-md-6">
                                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}"   >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tonken" class="col-md-4 col-form-label text-md-right">{{ __('Code : ') }}</label>

                            <div class="col-md-6">
                                <input id="tonken" type="text" class="form-control @error('tonken') is-invalid @enderror" name="tonken" required placeholder="token" " >

                                @error('tonken')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection