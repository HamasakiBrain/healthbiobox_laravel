@extends('layouts.template')
@section('title', 'Бонусный счет')
@section('content')
    <div class="row">
        <div class="col-md-12 table-margin">
            <div class="card my-card-nofixed">
                <div class="row">
                    <div class="col-md-4">
                        <div class="title bonus-title">Ваш бонусный счет</div>
                        <div class="balance">8 400 <small>руб.</small></div>
                        <div class="contract_text bonus_text mt-3">
                            Бонусы начисляются на счет аккаунта
                            в размере 20% от суммы заказов,
                            приведенных рефералов
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title bonus-title">Вывести средства</div>
                        <a data-toggle="modal" data-target="#froudModal" class="froud-btn bonus-btn">Оставить заявку</a>
                        <div class="contract_text bonus_text mt-3">Вы можете вывести бонусные рубли на свой личный счет</div>
                    </div>
                    <div class="col-md-4 pay">
                        <div class="title bonus-title">Купить продукт</div>
                        <a href="#" class="froud-btn bonus-btn">Купить</a>
                        <input class="styled-checkbox payBonusCheckBox" id="checkboxPay" type="checkbox" name="checkboxPay" value="1" checked>
                        <label for="checkboxPay" class="payBonusType">Списать бонусы при оплате</label>
                        <input class="styled-checkbox payBonusCheckBox" id="checkboxNoPay" type="checkbox" name="checkboxPay" value="0">
                        <label for="checkboxNoPay" class="payBonusType">Оплатить без списания бонусов</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
