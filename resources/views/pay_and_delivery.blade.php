@extends('layouts.template')
@section('title', 'Оплата и доставка')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="title">Оплата</div>
                <div class="contract_text">
                    {!! $text[1]->data !!}
                </div>
                <div class="title mt-5">Доставка</div>
                <div class="contract_text">
                    {!! $text[2]->data !!}
                </div>
                @if(Auth::user()->hasPermission(['Администратор']))
                    <a href="{{ route('payAndDeliveryEdit') }}" class="btn-orange text-white">Редактировать</a>
                @endif
            </div>

        </div>

    </div>
@endsection
