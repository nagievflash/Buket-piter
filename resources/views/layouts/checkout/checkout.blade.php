@extends('layouts.app')

@section('content')
    <div class="cart">
        <div class="container-fluid">
            <div class="row">
                <div class="cart-header">
                    <div class="cart-title">
                        <h1>Оформление заказа</h1>
                        <div class="cart-nav d-flex justify-content-between">
                            <a class="cart-nav-item">
                                <span class="cart-nav-number">1</span>
                                <span class="cart-nav-desc">Товары в корзине</span>
                            </a>
                            <a class="cart-nav-item active">
                                <span class="cart-nav-number">2</span>
                                <span class="cart-nav-desc">Оформление заказа</span>
                            </a>
                            <a class="cart-nav-item">
                                <span class="cart-nav-number">3</span>
                                <span class="cart-nav-desc">Оплата заказа</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-start">
                        <div class="cart-total">
                            <p class="price-total">Ваш заказ на сумму итого: <span>{{Cart::total()}}&nbsp;₽</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout">
        <div class="container-fluid">
            <div class="checkout-items w-100 d-flex">
                @foreach (Cart::content() as $item)
                    <div class="col-4">
                        <div class="checkout-item d-flex">
                            <div class="checkout-product-image">
                                <img src="{{Voyager::image($item->model->image)}}" />
                            </div>
                            <div class="checkout-product-content d-flex flex-column justify-content-center">
                                <p class="checkout-product-type">Букет</p>
                                <h3 class="checkout-product-title">{{$item->model->title}} x {{$item->qty}}</h3>
                            </div>
                            <div class="product-price">
                                {{number_format($item->model->price*$item->qty, 0, '', ' ')}} ₽
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="checkout-form">
                <form action="">
                    @csrf
                    <div class="col-12">
                        <div class="row">
                            <div class="col d-flex form-group-title">
                                <p class="">Отправитель</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="self-deliver">
                                    <label class="form-check-label" for="self-deliver">
                                        Я сам получу заказ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row customer-info">
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="customer-phone" placeholder="Ваш телефон">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="customer-email" placeholder="Ваш email">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="customer-name" placeholder="Ваше имя">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex form-group-title">
                                <p>Получатель</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="receiver-name" placeholder="Имя получателя">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="receiver-phone" placeholder="Телефон получателя">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="receiver-address" placeholder="Уточните адрес доставки">
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="deliver-text">Мы позвоним получателю и уточним удобное время и адрес доставки. При звонке мы не скажем про цветы.
                                    Приоритетным будет время и адрес доставки, которые сообщит нам получатель.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 d-flex form-group-title">
                                <p class="">Дата и время доставки</p>
                            </div>
                            <div class="col-4">
                                <p>с 9:30 до 21:00 - ночная доставка 200 ₽</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" min="{{date('Y-m-d')}}" class="form-control" name="deliver-date" value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount-time">Time</label>
                                    <input type="text" name="amount-time" id="amount-time" style="border: 0; color: #666666; font-weight: bold;" value="10:00 - 20:00"/>
                                    <div id="timepicker"></div><br>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="receiver-address" placeholder="Уточните адрес доставки">
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="deliver-text">Мы позвоним получателю и уточним удобное время и адрес доставки. При звонке мы не скажем про цветы.
                                    Приоритетным будет время и адрес доставки, которые сообщит нам получатель.</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/dot-luv/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="/js/jquery.ui.timeslider.js"> </script>
    <script>
        jQuery(function() {
            jQuery('#timepicker').slider({
                range: true,
                min: 0,
                max: 1440,
                step: 15,
                values: [ 600, 1200 ],
                slide: function( event, ui ) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if(hours1.length < 10) hours1= '0' + hours;
                    if(minutes1.length < 10) minutes1 = '0' + minutes;

                    if(minutes1 == 0) minutes1 = '00';

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if(hours2.length < 10) hours2= '0' + hours;
                    if(minutes2.length < 10) minutes2 = '0' + minutes;

                    if(minutes2 == 0) minutes2 = '00';

                    jQuery('#amount-time').val(hours1+':'+minutes1+' - '+hours2+':'+minutes2 );
                    if(ui.value > 75 && ui.value <= 1000){
                        return true;
                    }
                    else return false;
                }
            });
        });
    </script>
@endsection
