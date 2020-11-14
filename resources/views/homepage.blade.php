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
                    <div class="item d-flex buket-of-day w-100 h-100 flex-column">
                    @include ('sections.products.item', [
                        'background' => '/img/2.jpg',
                        'title' => 'яблоневый сад',
                        'price' => '1 799 Р',
                        'type' => 'buket-of-day',
                        'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                        'href' => '#',
                        'width' => '30 см',
                        'height' => '45 см',
                        'id' => '0000001'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    @include('sections.homepage.actions')
    @include('sections.homepage.roses')
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
        //return console.log('fsdf');
    }
});


</script>
@endsection
