<div class="product" style="background-image:url({{ $background }})" id="{{ $id }}">
    <div class="product-image"></div>
    <div class="product-header">
        @if ($type == 'buket-of-day')
            <div class="buket-of-day-header">Букет дня</div>
            @php $type = 'букет'; @endphp
        @else
        <div class="product-badge">
            <span><i class="badge-icon special"></i><span>Спецпредложение</span></span>
        </div>
        @endif
        <div class="bouquet-size">
            <span class="bouquet-height">{{ $width }}</span>
            <span class="bouquet-width">{{ $height }}</span>
        </div>
    </div>
    <div class="product-price">{{ $price }}</div>
    <div class="product-content">
        <p class="product-type">{{ $type }}</p>
        <h3 class="product-title">{{ $title }}</h3>
        <p class="product-composition">{{ $composition }}</p>
    </div>
    <div class="button-wrapper">
        <span class="btn btn-buy">Купить</span>
        <span class="btn btn-primary btn-oneclick">Купить в один клик</span>
    </div>
</div>
