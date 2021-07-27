@extends('layouts.template')
@section('title', 'Кабинет')
@section('content')
    <div class="row">
            <div class="col-md-12 table-margin">
                <div class="card my-card-nofixed">
                    <div class="row mb-4">
                        <div class="col-md-2 key">Имя</div>
                        <div class="col-md-4 value value-name">{{ $user->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 key">E-mail</div>
                        <div class="col-md-4 value value-name">{{ $user->email }}</div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 key">Телефон</div>
                        <div class="col-md-4 value value-name">{{ $user->phone }}</div>

                    </div>
                    <div class="row mb-3">
                        <a href="{{ route('profile.edit') }}"  class="btn-orange text-white">Редактировать</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 table-margin">
                <div class="card my-card-nofixed">
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
                        <div class="col-md-6">{{ $user->delivery ?? "Не указан" }}</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
