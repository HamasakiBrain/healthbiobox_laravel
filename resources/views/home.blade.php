@extends('layouts.template')
@section('title', 'Главная')
@section('content')
    <div class="row">
        
        <div class="col-md-6">
            <div class="card my-card my-card-left">
                <div class="my-card-title">Приветствуем, {{ $user->name }}</div>
                <div class="card-text">
                    Вы уже с нами {{ $user->created_at->diffForHumans(null, true) }}.
                    <div class="mt-5">Спасибо, что выбрали нас!</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card my-card my-card-right">
                <div class="my-card-title">Ваша реферальная <br>
                    ссылка</div>
                <div class="card-text">
                    <a href="javascript:;" onclick="copyToClipboard('referal_link')">
                        <img src="{{ asset('img/copy-blue.png') }}" alt="">
                        <span id="referal_link">https://haelthbiobox.ru/lk/refid269</span>
                    </a>
                    <div class="mt-5">Привлечено клиентов: <strong>3</strong></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="title">Статистика по рефералам</div>
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Дата регистрации</th>
                        <th>Сумма оплат (руб.)</th>
                        <th>Ваши бонусы (руб.)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Александра</td>
                        <td>01.08.2021</td>
                        <td>14 000</td>
                        <td>2 800</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Александра</td>
                        <td>01.08.2021</td>
                        <td>14 000</td>
                        <td>2 800</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Александра</td>
                        <td>01.08.2021</td>
                        <td>14 000</td>
                        <td>2 800</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
