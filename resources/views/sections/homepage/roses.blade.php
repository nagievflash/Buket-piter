<section class="roses">
    <div class="roses-wrapper"></div>
    <div class="container-fluid">
        <div class="row">
             <div class="section-title">
                 <h2>Букеты из роз</h2>
                 <a class="section-link" href="#" title="Смотреть все акции">Смотреть все</a>
             </div>

             <div class="section-filter outline" id="кщыуы-filter">
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

        <!-- Акционные букеты -->
        <div class="row product-list">
            <div class="col-md-6 col-lg-3 col-sm-12">
                @include ('sections.products.item', [
                    'background' => '/img/1.jpg',
                    'title' => 'яблоневый сад',
                    'price' => '1 799 Р',
                    'type' => 'букет',
                    'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                    'href' => '#',
                    'width' => '30 см',
                    'height' => '45 см',
                    'id' => '0000001'
                ])
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                @include ('sections.products.item', [
                    'background' => '/img/2.jpg',
                    'title' => 'яблоневый сад',
                    'price' => '1 799 Р',
                    'type' => 'букет',
                    'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                    'href' => '#',
                    'width' => '30 см',
                    'height' => '45 см',
                    'id' => '0000001'
                ])
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                @include ('sections.products.item', [
                    'background' => '/img/3.jpg',
                    'title' => 'яблоневый сад',
                    'price' => '1 799 Р',
                    'type' => 'букет',
                    'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                    'href' => '#',
                    'width' => '30 см',
                    'height' => '45 см',
                    'id' => '0000001'
                ])
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                @include ('sections.products.item', [
                    'background' => '/img/4.jpg',
                    'title' => 'яблоневый сад',
                    'price' => '1 799 Р',
                    'type' => 'букет',
                    'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                    'href' => '#',
                    'width' => '30 см',
                    'height' => '45 см',
                    'id' => '0000001'
                ])
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                @include ('sections.products.item', [
                    'background' => '/img/1.jpg',
                    'title' => 'яблоневый сад',
                    'price' => '1 799 Р',
                    'type' => 'букет',
                    'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                    'href' => '#',
                    'width' => '30 см',
                    'height' => '45 см',
                    'id' => '0000001'
                ])
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                @include ('sections.products.item', [
                     'background' => '/img/2.jpg',
                     'title' => 'яблоневый сад',
                     'price' => '1 799 Р',
                     'type' => 'букет',
                     'composition' => 'роза россия; гортензия (гидрангия); манус; рубус; матиола; фрезия',
                     'href' => '#',
                     'width' => '30 см',
                     'height' => '45 см',
                     'id' => '0000001'
                 ])
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="promo-showall" style="background-image:url('/img/promo_showall.jpg');">
                    <a href="#" title="Смотреть все букеты из роз">Смотреть еще</a>
                    <h3>93 букета из роз</h3>
                </div>
            </div>
        </div>
        <div class="readmore">
            <a href="#" class="btn btn-default">Загрузить еще</a>
        </div>
    </div>
</section>
