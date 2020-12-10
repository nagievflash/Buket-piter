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

        <!-- Акционные букеты -->
        <div class="row product-list">
            @foreach ($data['actions'] as $action)
            <div class="col-md-3 col-sm-12">
                @php
                    $composition = '';
                    foreach ($action->products()->get() as $product) {
                        $composition .= $product->title. ', ';
                    }
                @endphp
                @include ('sections.products.item', [
                    'background' => Voyager::image( $action->image ),
                    'title' => $action->title,
                    'price' => number_format($action->price, 0, '', ' ') . ' ₽',
                    'type' => 'букет',
                    'composition' => mb_substr($composition, 0, -2),
                    'href' => '/product/' . $action->slug,
                    'width' => $action->width . ' см',
                    'height' => $action->height . ' см',
                    'id' => $action->id
                ])
            </div>
            @endforeach
        </div>
        <div class="readmore">
            <a href="#" class="btn btn-default">Загрузить еще</a>
        </div>
    </div>
</section>
