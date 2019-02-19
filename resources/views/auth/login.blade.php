@extends('auth.templates.template')

@section('content-form')
<form class="login form" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-login">
            <i class="fa fa-sign-in"></i> Login
        </button>

        @if (Route::has('password.request'))
        <div class="form-group text-right">
            <a class="recuperar" href="{{ route('password.request') }}">
                {{ __('Recuperar Senha?') }}
            </a>
        </div>
        @endif
    </div>

</form>
@endsection


