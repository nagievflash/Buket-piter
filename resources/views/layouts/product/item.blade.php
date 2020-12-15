@extends('layouts.app')

@section('content')

    <div class="product-item" data-id="{{$product->id}}">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" title="Доставка цветов по Санкт-Петербургу">Доставка цветов по Санкт-Петербургу</a></li>
                        <li class="breadcrumb-item"><a href="#" title="Букеты | Доставка цветов по Санкт-Петербургу">Букеты</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-7 product-gallery product-left">
                    <div class="row">
                        <div class="col-3 image-thumbnails">
                            <div class="row">
                                <div id="gallery_01" class="d-flex flex-wrap justify-content-between">
                                    @foreach (json_decode($product->images, true) as $image)
                                        @if ($loop->first)
                                            <a href="#" class="active" data-image="{{ Voyager::image( $image ) }}" data-zoom-image="{{ Voyager::image( $image ) }}">
                                                <img class="image-gallery" id="img_01" src="{{ Voyager::image( $image ) }}"/>
                                            </a>
                                        @else
                                            <a href="#" data-image="{{ Voyager::image( $image ) }}" data-zoom-image="{{ Voyager::image( $image ) }}">
                                                <img class="image-gallery" id="" src="{{ Voyager::image( $image ) }}"/>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-9 image-fullsize">
                            <div class="image-gallery-wrapper">
                                <img class="image-gallery" id="zoom_06"  src="{{Voyager::image( json_decode($product->images, true)[0])}}" data-zoom-image="{{Voyager::image( json_decode($product->images, true)[0])}}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 product-right pl-5">
                    <div class="row">
                        <div class="product-header d-flex justify-content-between w-100 align-items-center">
                            <div class="product-review d-flex align-items-center">
                                <div class="product-rating mr-4">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="product-reviews-count">
                                    <a href="#" class="product-reviews-readmore">28 отзывов</a>
                                </div>
                            </div>
                            <a href="#" class="add-to-wishlist">
                                <svg width="30" viewBox="0 0 33 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6237 5.57827L16.5 7.17245L17.3763 5.57829C17.8821 4.65821 18.7254 3.42552 19.9648 2.47131L19.3548 1.67892L19.9648 2.4713C21.2408 1.48898 22.669 1 24.2344 1C28.6084 1 32 4.54747 32 9.46439C32 12.0699 30.9631 14.3052 28.9912 16.6738C26.994 19.0728 24.1166 21.518 20.5352 24.5561L20.5352 24.5561L20.5346 24.5565C19.3259 25.5819 17.9516 26.7478 16.5222 27.9921L16.5219 27.9924C16.5171 27.9966 16.5097 28 16.5 28C16.4903 28 16.483 27.9966 16.4783 27.9925L16.4778 27.9921C15.0494 26.7487 13.6757 25.5833 12.4682 24.5589L12.4656 24.5567L12.4656 24.5567C8.8838 21.5183 6.0062 19.0729 4.00889 16.6739C2.03691 14.3052 1 12.0699 1 9.46439C1 4.54747 4.39157 1 8.76562 1C10.331 1 11.7592 1.48898 13.0352 2.4713L13.6452 1.67892L13.0352 2.47131C14.2746 3.42553 15.1179 4.65816 15.6237 5.57827Z" stroke="url(#paint0_angular)" stroke-width="2"/>
                                    <defs>
                                        <radialGradient id="paint0_angular" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(16.5 14.5) rotate(90) scale(14.5 16.5)">
                                            <stop stop-color="#BE4AC2"/>
                                            <stop offset="0.53125" stop-color="#AE48D2"/>
                                            <stop offset="1" stop-color="#F24A7C"/>
                                        </radialGradient>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-info">
                                <p class="product-type">букет</p>
                                <h1 class="product-title">{{$product->title}}</h1>
                                <p class="product-composition">
                                    @foreach($product->products()->get() as $item)
                                        @if (!$loop->last)
                                            {{$item->title}},
                                        @else
                                            {{$item->title}}
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="product-action">
                                <div class="product-price-block d-flex w-100 align-items-center justify-content-between">

                                    <div class="product-sizes">
                                        {!! $product->getCollectionList() !!}
                                    </div>
                                    <div class="product-price">
                                        {{number_format($product->price, 0, '', ' ')}} ₽
                                    </div>
                                </div>
                                <div class="product-actions w-100 d-flex">
                                    <div class="product-count d-flex">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input class="form-control quantity" min="1" name="quantity" value="1" type="number">
                                        <div class="input-group-append">
                                            <button class="btn btn-light btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="button-wrapper d-flex flex-row align-items-center">
                                        <span class="btn btn-buy">Купить</span>
                                        <span class="btn btn-primary btn-oneclick">Купить в один клик</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="product-features">
                            <div class="card">
                                <div class="card-header" id="sostav">
                                    <h3 data-toggle="collapse" data-target="#collapseSostav" aria-expanded="true" aria-controls="collapseOne">
                                        Состав
                                    </h3>
                                </div>

                                <div id="collapseSostav" class="collapse " aria-labelledby="sostav" data-parent="#product-features">
                                    <div class="card-body">
                                        <p>Доставка цветов в Санкт-Петербурге - наша основная деятельность. С каждым годом
                                            доставка цветов в Санкт-Петербурге становится всё более востребованной. А все
                                            потому, что это очень удобно, ведь Вы можете заказать доставку, не выходя из
                                            дома или офиса! Помимо того, цены на цветы ниже, чем в обычных магазинах, а
                                            самое главное - близкий Вам человек получает цветы в самое ближайшее время! Мы
                                            работаем для Вас круглосуточно и без выходных. Наши курьеры вручат букет в любое
                                            удобное для Вас и получателя время!</p>

                                        <p>Для того, чтобы сделать заказ, позвоните нам по телефону: +7(812)309-38-84 или
                                            оформите заказ через сайт.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="dostavka">
                                    <h3 class="collapsed" data-toggle="collapse" data-target="#collapseDostavka" aria-expanded="false" aria-controls="collapseTwo">
                                        Доставка
                                    </h3>
                                </div>
                                <div id="collapseDostavka" class="collapse" aria-labelledby="dostavka" data-parent="#product-features">
                                    <div class="card-body">
                                        <p>Компания "Букет-Спб" - интернет-магазин доставки цветов, это целый мир,
                                            попадая в который, Вы можете реализовать свои цветочные фантазии. C нами
                                            доставка цветов и подарков становится простой и приятной. У нас Вы всегда
                                            сможете выбрать и купить прекрасные букеты, оригинальные композиции из
                                            свежих цветов или подарки в виде мягких игрушек, воздушных шариков и многое
                                            другое. Мы всегда рады помочь клиенту реализовать идею о доставке цветов,
                                            самым шикарным образом.</p>

                                        <a href="#">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="oplata">
                                    <h3 class="collapsed" data-toggle="collapse" data-target="#collapseOplata" aria-expanded="false" aria-controls="collapseThree">
                                        Оплата
                                    </h3>
                                </div>
                                <div id="collapseOplata" class="collapse" aria-labelledby="oplata" data-parent="#product-features">
                                    <div class="card-body">
                                        Заказы принимаются 24 часа в сутки, через сайт или по телефону +7 (812) 309-38-84.
                                        Также Вы можете оставить свой заказ в нашем магазине по адресу ул. Марата д.35.
                                        Карта проезда.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="bonusi">
                                    <h3 class="collapsed" data-toggle="collapse" data-target="#collapseBonusi" aria-expanded="false" aria-controls="collapseFour">
                                       Бонусы
                                    </h3>
                                </div>
                                <div id="collapseBonusi" class="collapse" aria-labelledby="bonusi" data-parent="#product-features">
                                    <div class="card-body">
                                        <p>Основным направлением компании «Букет-СПБ» - доставка цветов по Петербургу и
                                            области. Доставка осуществляется 24 часа в сутки, нашей курьерской службой. Все
                                            заказы выполняются профессиональными курьерами на автомобилях. Вы можете быть
                                            уверены, что цветы доедут до Вас, свежие и красивые.</p>
                                        <p>Если Вам удобнее самим забрать заказанные цветы или букет, пожалуйста, мы будем
                                            рады видеть Вас в одном из наших магазинов. Перед приездом в наши магазины,
                                            обязательно уточните наличие именно того цветка, который Вам нужен. Сделать это
                                            можно по телефону +7 (812) 309-38-84 или с помощью электронной почты
                                            zakaz@buket-piter.ru.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-item-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 product-description">
                    <div class="row">
                        <h3>Описание</h3>
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="col-md-5 product-reviews-block pl-5">
                    <div class="row">
                        <h3>Отзывы</h3>
                    </div>
                    <div class="row product-reviews">
                        <div class="review">
                            <div class="review-header d-flex align-items-center w-100">
                                <div class="review-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="review-author">Алла М.</div>
                                <div class="review-date">август 2020</div>
                            </div>
                           <div class="review-text">
                               <p>Доставка цветов по Санкт-Петербургу (СПБ), осуществляется круглосуточно по заказу с сайта или по телефону +7-812-309-38-84 в Петербурге. В Санкт-Петербурге недорогие цветы с доставкой стало возможно.</p>
                           </div>
                        </div>
                        <div class="review">
                            <div class="review-header d-flex align-items-center w-100">
                                <div class="review-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="review-author">Максим Б.</div>
                                <div class="review-date">сентябрь 2019</div>
                            </div>
                           <div class="review-text">
                               <p>Доставка цветов по Санкт-Петербургу (СПБ), осуществляется круглосуточно по заказу с сайта или по телефону.</p>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="readmore">
                            <a href="#" class="btn btn-default">Все отзывы</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/igorlino/elevatezoom-plus@1.2.3/src/jquery.ez-plus.js"></script>
    <script>

        $('#zoom_06').ezPlus({
            gallery: 'gallery_01',
            cursor: 'pointer',
            galleryActiveClass: "active",
            imageCrossfade: true,
            zoomType: 'lens',
            lensShape: 'round',
            lensSize: 200
        });


        $('.btn-plus, .btn-minus').on('click', function(e) {
            const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
            const input = $(e.target).closest('.product-count').find('input');
            if (input.is('input')) {
                input[0][isNegative ? 'stepDown' : 'stepUp']()
            }
        })

        $('.button-wrapper .btn-buy').click(function() {
            let id = $('.product-item').data('id')
            let quantity = $('input[name="quantity"]').val();
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url          : '/cart',
                method       : 'POST',
                dataType     : "json",
                data : {
                    id       : id,
                    quantity : quantity,
                    _token   : _token
                },
                success: function (data) {
                    $('#cart .count').html(data.count)
                }
            })
        })

    </script>
@endsection
