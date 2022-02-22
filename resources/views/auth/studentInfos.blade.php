@extends('layouts.app')

@section('content')
    <div class="mainn">

        <!-- Sign up form -->
        <section class="signup">
            <div class="containerr">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">{{ __('Register') }}</h2>
                        
                        <form method="POST"  action="/redirects2" class="register-form" id="register-form">
                        @csrf
                        {{ __('nom') }}
                            <div class="form-group">
                                <label for="nom"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="nom" type="text" class="" name="nom"  required autocomplete="nom" autofocus>
                            
                            </div>
                            {{ __('prenom') }}
                            <div class="form-group">
                                <label for="prenom"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="prenom" type="text" class=" " name="prenom"  required autocomplete="prenom" autofocus>
                            
                            </div>
                            {{ __('apogee') }}
                            <div class="form-group">
                                <label for="apogee"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="apogee" type="text" class=" " name="apogee"  required autocomplete="apogee" autofocus>
                            
                            </div>
                            {{ __('cne') }}
                            <div class="form-group">
                                <label for="cne"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="cne" type="text" class=" " name="cne"  required autocomplete="cne" autofocus>
                            
                            </div>
                            {{ __('cin') }}
                            <div class="form-group">
                                <label for="cin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="cin" type="text" class=" " name="cin"  required autocomplete="cin" autofocus>
                            
                            </div>
                            {{ __('date_de_naissance') }}
                            <div class="form-group">
                                <label for="date_de_naissance"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="date_de_naissance" type="date" class=" " name="date_de_naissance"  required autocomplete="date_de_naissance" autofocus>
                            
                            </div>
                            {{ __('adresse') }}
                            <div class="form-group">
                                <label for="adresse"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="adresse" type="text" class=" " name="adresse"  required autocomplete="date_de_naissance" autofocus>
                            
                            </div>
                            {{ __('email_institutionnel') }}
                            <div class="form-group">
                                <label for="email_institutionnel"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="email_institutionnel" type="email" class=" " name="email_institutionnel"  required autocomplete="email_institutionnel" autofocus>
                            
                            </div>
                            {{ __('email_personnel	') }}
                            <div class="form-group">
                                <label for="email_personnel"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                                <input id="email_personnel" type="email" class=" " name="email_personnel"  required autocomplete="email_personnel" autofocus>
                            
                            </div>
                            <div class="form-group">
                                <input type="radio" id="homme" checked name="sexe" value="male">
                                <label for="homme">Homme</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" id="femme" name="sexe" value="female">
                                <label for="femme">Femme</label>
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
                    </div>
                </div>
            </div>
        </section>
    
        
    
    </div>
@endsection

@section('breadcumb')
    <h2>{{$pageTitle}}</h2>
@endsection