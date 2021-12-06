@extends('layouts.template')
@section('title', 'Редактирование страницы')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <form action="{{ route('payAndDeliveryEdit') }}" method="POST">
                @csrf
                <div class="card my-card-nofixed">
                    <div class="title">Оплата</div>
                    <div class="contract_text">
                        <textarea type="text" class="my-input" name="settings[{{ $text[1]->id }}]" required>{{ $text[1]->data }}</textarea>
                    </div>
                    <div class="title mt-5">Доставка</div>
                    <div class="contract_text">
                        <textarea type="text" class="my-input" name="settings[{{ $text[2]->id }}]" required>{{ $text[2]->data }}</textarea>
                    </div>
                    <button class="btn-orange" type="submit">Сохранить</button>
                </div>
            </form>

        </div>

    </div>
@endsection
