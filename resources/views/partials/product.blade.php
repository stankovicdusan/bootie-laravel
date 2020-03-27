<div class="col-md-4 product-men my-lg-4">
    <a href="{{ route("single", ['id' => $p->id]) }}">
        <div class="product-shoe-info shoe text-center">
            <div class="men-thumb-item">
                <img src="{{ asset($p->src) }}" class="img-fluid" alt="{{ $p->alt }}">
            </div>
            <div class="item-info-product">
                <h4>{{ $p->name }}</h4>
                <div class="product_price">
                    <div class="grid-price">
                        <span class="money">${{ $p->price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
