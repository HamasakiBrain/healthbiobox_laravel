@extends('layouts.template')
@section('title', 'Договор')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="title">Договор</div>
                <div class="contract_text">
                    {{ $text->data }}
                </div>
                @if(Auth::user()->hasPermission(['Администратор']))
                    <a href="{{ route('contractEdit') }}" class="btn-orange text-white">Редактировать</a>
                @endif
            </div>
        </div>
    </div>
@endsection
