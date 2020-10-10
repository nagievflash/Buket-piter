@extends('layouts.app')

@section('content')
<div class="container-fluid main-top">
    <div class="row">
        <div class="col">
            <div id="main-slider" class="carousel slide bordered" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Control dots -->
                    <ol class="carousel-indicators">
                        <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#main-slider" data-slide-to="1"></li>
                        <li data-target="#main-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-item active " style="background-image: url(https://2kartinki.ru/files/products/m45_zx8498_1.1500x1500.jpg?756a37fda1be0a9f846d637a1b1d9006)">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Example headline.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item " style="background-image: url(https://w-dog.ru/wallpapers/11/18/456004843638851.jpg)">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item " style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyYQ7_45baKRUIhmCyklxhbJlE6Rb23BEFDw&usqp=CAU)">
                    </div>
                </div>
            </div>
        </div>
        <div class="col buket-block">
            <div class="d-flex h-100 align-items-center">
                <div class="item d-flex buket-of-day align-items-center justify-content-center w-100 h-100 flex-column">
                    <div class="buket-of-day-header">Букет дня</div>
                    <div class="item-image" style="background-image:url(https://rus-buket.ru/files/icons/icon-2695.png)"></div>
                    <div class="item-content">
                        <h3 class="item-title">Коробка с Розами + RAFFAELLO!</h3>
                        <div class="item-price d-flex justify-content-between align-items-center"><span>1 550 ₽</span> <a href="" class="item-buy btn btn-primary">Купить</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <section class="action">
        <div class="container-fluid">
            <div class="row">
                 <div class="section-title">
                     <h2>Сегодня по акции</h2>
                     <a class="section-link" href="#" title="Смотреть все акции">Смотреть все</a>
                 </div>

                 <div class="section-filter" id="actions-filter">
                    <div class="control-group">
                        <select class="product-filter" id="action-filter__price" multiple placeholder="По цене">
                            <option>0 - 1000</option>
                            <option>1000 - 2000</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <select class="product-filter" id="action-filter__count" multiple placeholder="По количеству">
                            <option>0 - 5</option>
                            <option>5 - 10</option>
                            <option>10 - 15</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <select class="product-filter" id="action-filter__color" multiple placeholder="По цвету">
                            <option>Белый</option>
                            <option>Крайсный</option>
                            <option>Синий</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <select class="product-filter" id="action-filter__view" multiple placeholder="Выберите вид">
                        </select>
                    </div>
                    <div class="control-group">
                        <select class="product-filter" id="action-filter__form" multiple placeholder="По форме букета">
                        </select>
                    </div>
                 </div>
            </div>
            <div class="row product-list">
                <div class="col">
                    <a class="product" href="#">
                        <div class="product-image" style="background-image:url(/img/1.jpg)"></div>
                        <div class="product-header">
                            <div class="product-badge">
                                <span><i class="badge-icon special"></i><span>Спецпредложение</span></span>
                            </div>
                            <div class="bouquet-size">
                                <span class="bouquet-height">30 см</span>
                                <span class="bouquet-width">45 см</span>
                            </div>
                        </div>
                        <div class="product-price">1 799 Р</div>
                        <div class="product-content">
                            <p class="product-type">букет</p>
                            <h3 class="product-title">яблоневый сад</h3>
                            <p class="product-composition">роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия</p>
                        </div>
                        <div class="button-wrapper">
                            <i class="btn btn-buy">Купить</i>
                            <i class="btn btn-primary btn-oneclick">Купить в один клик</i>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="product" href="#">
                        <div class="product-image" style="background-image:url(/img/2.jpg)"></div>
                        <div class="product-header">
                            <div class="product-badge">
                                <span><i class="badge-icon special"></i><span>Спецпредложение</span></span>
                            </div>
                            <div class="bouquet-size">
                                <span class="bouquet-height">30 см</span>
                                <span class="bouquet-width">45 см</span>
                            </div>
                        </div>
                        <div class="product-price">1 799 Р</div>
                        <div class="product-content">
                            <p class="product-type">букет</p>
                            <h3 class="product-title">яблоневый сад</h3>
                            <p class="product-composition">роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия</p>
                        </div>
                        <div class="button-wrapper">
                            <i class="btn btn-buy">Купить</i>
                            <i class="btn btn-primary btn-oneclick">Купить в один клик</i>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="product" href="#">
                        <div class="product-image" style="background-image:url(/img/3.jpg)"></div>
                        <div class="product-header">
                            <div class="product-badge">
                                <span><i class="badge-icon special"></i><span>Спецпредложение</span></span>
                            </div>
                            <div class="bouquet-size">
                                <span class="bouquet-height">30 см</span>
                                <span class="bouquet-width">45 см</span>
                            </div>
                        </div>
                        <div class="product-price">1 799 Р</div>
                        <div class="product-content">
                            <p class="product-type">букет</p>
                            <h3 class="product-title">яблоневый сад</h3>
                            <p class="product-composition">роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия</p>
                        </div>
                        <div class="button-wrapper">
                            <i class="btn btn-buy">Купить</i>
                            <i class="btn btn-primary btn-oneclick">Купить в один клик</i>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="product" href="#">
                        <div class="product-image" style="background-image:url(/img/4.jpg)"></div>
                        <div class="product-header">
                            <div class="product-badge">
                                <span><i class="badge-icon special"></i><span>Спецпредложение</span></span>
                            </div>
                            <div class="bouquet-size">
                                <span class="bouquet-height">30 см</span>
                                <span class="bouquet-width">45 см</span>
                            </div>
                        </div>
                        <div class="product-price">1 799 Р</div>
                        <div class="product-content">
                            <p class="product-type">букет</p>
                            <h3 class="product-title">яблоневый сад</h3>
                            <p class="product-composition">роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия</p>
                        </div>
                        <div class="button-wrapper">
                            <i class="btn btn-buy">Купить</i>
                            <i class="btn btn-primary btn-oneclick">Купить в один клик</i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="readmore">
                <a href="#" class="btn btn-default">Загрузить еще</a>
            </div>
        </div>
    </section>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>

<script>
$(document).ready(function () {
    $(".carousel").carousel({

        interval: 7000,
        pause: true,
    });

    $(".carousel .carousel-inner").swipe({
        swipeLeft: function (event, direction, distance, duration, fingerCount) {
            this.parent().carousel("next");
        },
        swipeRight: function () {
            this.parent().carousel("prev");
        },
        threshold: 0,
        tap: function (event, target) {
            // get the location: in my case the target is my link
            //window.location = $(this).find(".carousel-item.active a").attr("href");
        },
        //เอา  a ออกถ้าต้องการให้ slide ที่เป็น tag a สามารถคลิกได้
        excludedElements: "label, button, input, select, textarea, .noSwipe",
    });

    $(".carousel .carousel-inner").on("dragstart", "a", function () {
        return false;
    });
});

$('select').selectize({
    plugins: ['remove_button'],
    persist: false,
    create: true,
    render: {
        item: function(data, escape) {
            return '<div>' + escape(data.text) + '</div>';
        }
    },
    onDelete: function(values) {
        return console.log('fsdf');
    }
});

$('.product').hover(

    function(e) {
        let height = $(this).innerHeight();
    },
    function(e) {
        let height = $(this).innerHeight();
    }, 300)
</script>
@endsection
