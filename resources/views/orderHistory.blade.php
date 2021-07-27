@extends('layouts.template')
@section('title', 'История заказов')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="title d-flex">История Ваших заказов <button data-toggle="modal" data-target="#froudModal" class="border-0 ml-auto froud">Оформить возврат денег</button></div>
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Дата оплаты</th>
                        <th>Кол-во месяцев</th>
                        <th>Сумма оплаты (руб.)</th>
                        <th>Списанные бонусы (руб.)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>01.08.2021</td>
                        <td>1</td>
                        <td>14 000</td>
                        <td>2 800</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>01.08.2021</td>
                        <td>1</td>
                        <td>14 000</td>
                        <td>2 800</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>01.08.2021</td>
                        <td>1</td>
                        <td>14 000</td>
                        <td>2 800</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
