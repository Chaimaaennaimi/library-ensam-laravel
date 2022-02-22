@extends('layouts.app')

@section('content')
    <div class="mainn">

        <!-- Sign up form -->
        <section class="signup">
            <div class="containerr">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">{{ __('Register') }}</h2>
                        
                        <form method="POST"  action="{{ route('register') }}" class="register-form" id="register-form">
                        @csrf
                        {{ __('Name') }}
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                            {{ __('Email Address') }}
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                            {{ __('Password') }}
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                            </div>
                            {{ __('Confirm Password') }}
                            <div class="form-group">
                                <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                            
                                
                            </div>
                            <div class="form-group form-button">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img  style=" max-width: 100% !important;
                        height: auto !important;" src="login2/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    
        
    
    </div>
@endsection

@section('breadcumb')
    <h2>Creer votre compte</h2>
@endsection