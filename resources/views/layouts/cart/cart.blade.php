@extends('layouts.app')

@section('content')
<div class="cart">
    <div class="container-fluid">
        <div class="row">
            <div class="cart-header">
                <div class="cart-title">
                    <h1>Корзина</h1>
                    <div class="cart-nav d-flex justify-content-between">
                        <a class="cart-nav-item active">
                            <span class="cart-nav-number">1</span>
                            <span class="cart-nav-desc">Товары в корзине</span>
                        </a>
                        <a class="cart-nav-item">
                            <span class="cart-nav-number">2</span>
                            <span class="cart-nav-desc">Оформление заказа</span>
                        </a>
                        <a class="cart-nav-item">
                            <span class="cart-nav-number">3</span>
                            <span class="cart-nav-desc">Оплата заказа</span>
                        </a>
                    </div>
                </div>
                <div class="cart-content">
                    @foreach (Cart::content() as $item)
                    <div class="col-12 cart-item" data-id="{{$item->rowId}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <a href="/product/{{$item->model->slug}}" class="cart-product d-flex align-items-center">
                                        <div class="cart-product-image">
                                            <img src="{{Voyager::image($item->model->image)}}" />
                                        </div>
                                        <div class="cart-product-content">
                                            <p class="cart-product-type">Букет</p>
                                            <h3 class="cart-product-title">{{$item->model->title}}</h3>
                                            <p class="cart-product-composition">
                                                @foreach($item->model->products()->get() as $composition)
                                                    @if (!$loop->last)
                                                        {{$composition->title}},
                                                    @else
                                                        {{$composition->title}}
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row h-100">
                                    <div class="product-actions w-100 d-flex align-items-center justify-content-around">
                                        <a class="product-delete">
                                            <svg width="27" height="34" viewBox="0 0 27 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.3844 2.05237H16.0668V3.00851H18.1189V1.91852C18.1192 0.860687 17.259 0 16.2017 0H10.2495C9.1922 0 8.33203 0.860687 8.33203 1.91852V3.00851H10.3844V2.05237Z" fill="url(#paint0_diamond)"/>
                                                <path d="M22.8574 11.1396H3.59237C3.06449 11.1396 2.64893 11.59 2.69148 12.1163L4.30209 32.0319C4.39184 33.1437 5.31919 34 6.43331 34H20.0162C21.1304 34 22.0577 33.1437 22.1475 32.0317L23.7581 12.1163C23.8009 11.59 23.3853 11.1396 22.8574 11.1396ZM8.25715 31.8758C8.23562 31.8771 8.21409 31.8779 8.19282 31.8779C7.65482 31.8779 7.20321 31.4589 7.16975 30.9147L6.16042 14.565C6.12566 13.9993 6.55601 13.5124 7.1215 13.4776C7.68517 13.4434 8.17414 13.8727 8.2089 14.4387L9.21796 30.7884C9.25298 31.3541 8.82264 31.8408 8.25715 31.8758ZM14.2625 30.8517C14.2625 31.4182 13.8031 31.8776 13.2363 31.8776C12.6695 31.8776 12.2101 31.4182 12.2101 30.8517V14.5017C12.2101 13.9349 12.6695 13.4755 13.2363 13.4755C13.8028 13.4755 14.2625 13.9349 14.2625 14.5017V30.8517ZM20.2894 14.5622L19.3257 30.9118C19.2938 31.4571 18.8414 31.8776 18.3024 31.8776C18.2822 31.8776 18.2617 31.8771 18.2412 31.876C17.6754 31.8426 17.2438 31.357 17.2772 30.7912L18.2407 14.4413C18.2739 13.8755 18.7579 13.4439 19.3252 13.4774C19.891 13.5106 20.3226 13.9964 20.2894 14.5622Z" fill="url(#paint1_diamond)"/>
                                                <path d="M26.4063 7.97305L25.7324 5.95285C25.5547 5.4203 25.0561 5.06104 24.4945 5.06104H1.95558C1.39424 5.06104 0.895412 5.4203 0.717983 5.95285L0.0440629 7.97305C-0.0858961 8.36267 0.0832323 8.76007 0.398921 8.95825C0.527583 9.03893 0.679851 9.08743 0.847163 9.08743H25.6032C25.7705 9.08743 25.923 9.03893 26.0514 8.95799C26.3671 8.75981 26.5363 8.36241 26.4063 7.97305Z" fill="url(#paint2_diamond)"/>
                                                <defs>
                                                    <radialGradient id="paint0_diamond" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(10.2294 2.48661) rotate(-12.6436) scale(11.3606 2765.18)">
                                                        <stop offset="0.0159384" stop-color="#3C33A3"/>
                                                        <stop offset="0.291667" stop-color="#D04AB3"/>
                                                        <stop offset="0.682292" stop-color="#F71458"/>
                                                    </radialGradient>
                                                    <radialGradient id="paint1_diamond" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(6.77384 30.0343) rotate(-38.367) scale(30.4417 16883.4)">
                                                        <stop offset="0.0159384" stop-color="#3C33A3"/>
                                                        <stop offset="0.291667" stop-color="#D04AB3"/>
                                                        <stop offset="0.682292" stop-color="#F71458"/>
                                                    </radialGradient>
                                                    <radialGradient id="paint2_diamond" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(5.12795 8.38895) rotate(-6.33871) scale(30.1433 3769.52)">
                                                        <stop offset="0.0159384" stop-color="#3C33A3"/>
                                                        <stop offset="0.291667" stop-color="#D04AB3"/>
                                                        <stop offset="0.682292" stop-color="#F71458"/>
                                                    </radialGradient>
                                                </defs>
                                            </svg>
                                        </a>
                                        <div class="product-count d-flex">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-light btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input class="form-control quantity" min="1" name="quantity" value="{{$item->qty}}" type="number">
                                            <div class="input-group-append">
                                                <button class="btn btn-light btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-sizes d-flex flex-row align-items-center">
                                            <a class="product-size active"><span>Малый</span></a>
                                            <a class="product-size"><span>Средний</span></a>
                                            <a class="product-size"><span>Большой</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row h-100 align-items-center">
                                    <div class="product-price">
                                        {{number_format($item->model->price, 0, '', ' ')}} ₽
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="cart-footer">
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="cart-bonus">
                                        <p>Бонусы</p>
                                        <a>Ввести промокод</a>
                                    </div>
                                    <div class="bonus-desc">
                                        Вам будет зачислено <span>{{number_format((Cart::total(0, '', '') * 0.03 ), 0, '', ' ')}} Рублей </span><br />
                                        (3% от стоимости заказа)
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-end">
                                    <div class="cart-total">
                                        <p class="price-total">Итого: <span>{{Cart::total()}}&nbsp;₽</span></p>
                                        <p class="price-total-desc">* Без учета стоимости доставки</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between mt-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <a href="{{url()->previous()}}" class="btn btn-default">Вернуться к покупкам</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-end">
                                    <a href="/checkout/" class="btn btn-primary">Оформить заказ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.btn-plus, .btn-minus').on('click', function(e) {
        const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
        const input = $(e.target).closest('.product-count').find('input');
        if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
        }
        input.change()
    })

    $('input[name="quantity"]').on('keyup change', function(e){
        e.stopPropagation();
        let qty = $(this).val();
        let id = $(e.target).closest('.cart-item').data('id');

        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url          : '/cart/' + id,
            method       : 'PUT',
            dataType     : "json",
            data : {
                id       : id,
                quantity : qty,
                _token   : _token
            },
            success: function (data) {
                $('#cart .count').html(data.count)
                $('.bonus-desc span').html(data.bonus + ' рублей')
                $('.price-total span').html(data.total)
                console.log('success')
            }
        })
    });

    $('.product-delete').click(function(e){
        let id = $(e.target).closest('.cart-item').data('id');
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url          : '/cart/' + id,
            method       : 'DELETE',
            dataType     : "json",
            data : {
                id       : id,
                _token   : _token
            },
            success: function (data) {
                $('#cart .count').html(data.count)
                $(e.target).closest('.cart-item').fadeOut(300);
                $('.bonus-desc span').html(data.bonus + ' рублей')
                $('.price-total span').html(data.total)
                console.log('success')
            }
        })
    })
</script>
@endsection
