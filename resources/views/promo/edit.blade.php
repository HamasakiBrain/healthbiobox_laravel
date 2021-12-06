@extends('layouts.template')
@section('title', 'Промоматериалы')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="title">Презентации</div>
                <div class="contract_text">
                    <p>
                        О продукте HEALTBIOBOX.pdf <a href="#" class="text-blue ml-4 text-decoration">Скачать</a>
                    </p>
                </div>

                <form action="{{ route('edit.promo') }}">
                    <div class="form-group">
                        <label for="">Название</label>
                        <input type="file" class="form-controll-file my-input">
                    </div>
                </form>
                <a href="#" class="btn-orange text-white">Добавить</a>
            </div>
        </div>
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="title">Фотографии продукта</div>
                <div class="slider">

                </div>
            </div>
        </div>
    </div>
@endsection
