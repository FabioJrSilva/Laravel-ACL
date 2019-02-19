@extends('auth.templates.template')

@section('content-form')
<form class="form login" method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name">{{ __('Nome') }}</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="email">{{ __('E-Mail') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password">{{ __('Senha') }}</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-group">
        <button type="submit"class="btn btn-login">
            <i class="fa fa-user"></i> {{ __('Registrar') }}
        </button>
    </div>
</form>
@endsection
