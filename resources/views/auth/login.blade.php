@extends('layouts.app')

@include('layouts.inc.navbar')

@section('content')
    <div class="row justify-content-center mt-5">
        <form class="form-signin" method="POST" action="{{ route('login') }}" autocomplete="off">
            <h1 class="h3 mb-3 font-weight-normal text-center">Log In</h1>
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email" placeholder="E.g. alfuzzy@kpop.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        &nbsp;
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <br>

            <div class="text-center">
                <p>Don't have an account ?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Sign Up Here</a></p>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Log In</button>
                </div>
            </div>
            <hr>
            <div class="text-center text-muted">Atau Masuk Dengan</div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <div class="btn-toolbar justify-content-center">
                        <div class="btn-group mr-2" style="width: 47.5% !important;">
                            <a href="{{ route('api.login', ['provider' => 'google']) }}" class="btn btn-outline-danger btn-lg">
                                <i class="fa fa-google fa-lg"></i>oogle
                            </a>
                        </div>
                        <div class="btn-group" style="width: 47.5% !important;">
                            <a href="{{ route('api.login', ['provider' => 'facebook']) }}" class="btn btn-outline-primary btn-lg">
                                <i class="fa fa-facebook fa-lg"></i>acebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
