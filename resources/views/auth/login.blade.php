@extends('layouts.app')

@section('content')
<style>
    body{
        background-image: url('http://img46.xooimage.com/files/b/e/e/abstract-wallpapers_00047-1923dbb.jpg');
        /* background-color: black; */
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    /* .card{
         opacity: 0.8; 
        border-color: black; 
    } */
</style>
<br><br>
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                   <center><img src="https://pngimage.net/wp-content/uploads/2018/06/logo-user-png-5.png" style="width:170px" ></center> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                       
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text"><img src="https://image.flaticon.com/icons/svg/74/74472.svg" style="width:22px"></span>
                                    <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text"><img src="https://image.flaticon.com/icons/svg/56/56255.svg" style="width:22px"></span>
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- form-grup para estilo del boton -->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary" style="width:100%">Login</button>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------------->
                        <div class="form-group row">
                            <div class="col-md-12 offset-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Recordar
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                    <!-- @if (Route::has('register'))
                                        <a class="btn btn-link" href="{{ route('register') }}">
                                            {{ __('Registrarse') }}
                                        </a>
                                    @endif 
                                    <a href="/">volver</a> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
