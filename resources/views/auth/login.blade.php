@extends('...layouts.app')

@section('content')
    
        
<div class="mainn">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="login2/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="/register" class="signup-image-link">Create an account</a>
                </div>
    
                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                         @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            
                                <input placeholder="Your Email" id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>

                         
                                <input placeholder="Password" id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            
                                
                                    <input class="agree-term"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                               
                           
                        </div>
                        <div class="form-group form-button"> 
                           
                               
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                @if (Route::has('password.request'))
                                    <a class=" form-submit" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection


@section('breadcumb')
<h2>S'identifier</h2>
@endsection