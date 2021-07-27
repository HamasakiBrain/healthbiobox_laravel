@extends('layouts.template')
@section('title', 'Редактирование профиля')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <form class="card my-card-nofixed" action="{{ route('profile.edit') }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-2 key">Имя</div>
                    <div class="col-md-4 value value-name">
                        <input type="text" class="my-input mb-1" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 key">E-mail</div>
                    <div class="col-md-4 value value-name">
                        <input type="text" class="my-input mb-1" name="email" value="{{ $user->email }}">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-2 key">Телефон</div>
                    <div class="col-md-4 value value-name">
                        <input type="text" class="my-input mb-1" value="{{ $user->phone }}" name="phone">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-2 key">Старый пароль</div>
                    <div class="col-md-3 value value-name">
                        <input type="password" value="" name="old_password" class="w-100 my-input mb-1">
                    </div>
                    @error('password')
                       <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 key">Новый парль</div>
                    <div class="col-md-3 value value-name">
                        <input type="password" value="" name="password" class=" w-100 my-input mb-1">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3 key">Способ доставки</div>
                    <div class="ml-2">
                        <input class="styled-checkbox payBonusCheckBox" id="checkboxPay" type="checkbox" name="checkboxPay" value="1" checked>
                        <label for="checkboxPay" class="payBonusType">До двери СДЕК</label>
                    </div>
                    <div class="ml-2">
                        <input class="styled-checkbox payBonusCheckBox" id="checkboxPay1" type="checkbox" name="checkboxPay" value="1" checked>
                        <label for="checkboxPay1" class="payBonusType">Пункт СДЕК</label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3 key">Адрес доставки</div>
                    <div class="col-md-6">
                        <input type="text" class="my-input" name="delivery" value="{{ $user->delivery ?? "Не указан" }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <button class="btn-orange">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
