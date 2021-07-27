@extends('layouts.template-auth')
@section('title', 'Авторизация')
@section('auth')
    <h1 class="text-center page-title">Вход в личный кабинет</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <form method="POST" action="{{ route('login') }}" class="col-md-4 form-100">
                @csrf
                <div class="form-group ">
                    <input type="text" class="my-input transparent  @error('email') is-invalid @enderror"
                           placeholder="Введите e-mail" name="email" value="{{ old('email') }}" required
                           autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group ">
                    <input type="password" class="my-input transparent @error('password') is-invalid @enderror"
                           placeholder="Введите пароль" name="password" value="{{ old('password') }}" required
                           autocomplete="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a href=""></a>

                <div class="form-group ">
                        <div class="col-md-12  text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link edited-link" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif
                        </div>
                       <button class="froud-btn bonus-btn mx-auto">Войти</button>
                    <div class="col-md-12 mt-3 text-center">
                        <a class="btn btn-link edited-link" href="{{ route('register') }}">
                            {{ __('Регистрация') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
