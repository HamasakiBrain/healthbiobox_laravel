@extends('layouts.template-auth')
@section('title', 'Регистрация')
@section('auth')
    <h1 class="text-center page-title">Регистрация</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group ">
                    <input type="text" class="my-input transparent @error('name') is-invalid @enderror"
                           placeholder="Введите имя" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="form-group ">
                    <input type="text" class="my-input transparent @error('email') is-invalid @enderror"
                           placeholder="Введите e-mail" name="email" value="{{ old('email') }}" required
                           autocomplete="email" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group ">
                    <input type="text" class="my-input transparent @error('phone') is-invalid @enderror"
                           placeholder="Введите номер телефона" name="phone" value="{{ old('phone') }}" required>
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
                <div class="form-group ">
                    <input type="password" class="my-input transparent @error('password') is-invalid @enderror"
                           placeholder="Подтвердите пароль" name="password_confirmation" value="{{ old('password') }}" required
                           autocomplete="password">
                </div>
                <div class="form-group ">
                    <input type="text" class="my-input transparent @error('delivery') is-invalid @enderror"
                           placeholder="Введите адрес доставки (необязательно)" name="delivery" value="{{ old('delivery') }}">
                </div>

                <div class="form-group row">
                    <button class="froud-btn bonus-btn mx-auto">Зарегистрироваться</button>
                    <div class="col-md-12 mt-3 text-center">
                        <a class="btn btn-link edited-link" href="{{ route('login') }}">
                            {{ __('Уже есть учетная запись') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
