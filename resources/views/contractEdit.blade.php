@extends('layouts.template')
@section('title', 'Редактирование страницы')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <form action="{{ route('contractEdit') }}" method="POST">
                @csrf
                <div class="card my-card-nofixed">
                    <div class="title">Договор</div>
                    <div class="contract_text">
                        <textarea type="text" class="my-input" name="settings[{{ $text[0]->id }}]" required>{{ $text[0]->data }}</textarea>
                    </div>
                    <button class="btn-orange" type="submit">Сохранить</button>
                </div>
            </form>

        </div>

    </div>
@endsection
