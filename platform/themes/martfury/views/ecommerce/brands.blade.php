<div class="ps-page--shop">
    <div class="ps-container">
        <div class="ps-section--default">
            <div class="ps-section__header">
                <h1>{{ __('Brands') }}</h1>
                <p>{{ __('Browse all brands available in our store.') }}</p>
            </div>

            <div class="ps-section__content">
                @if ($brands->isEmpty())
                    <p>{{ __('No brands found.') }}</p>
                @else
                    <div class="ps-shopping-product">
                        <div class="row">
                            @foreach ($brands as $brand)
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="ps-product">
                                        <div class="ps-product__thumbnail" style="display: flex; align-items: center; justify-content: center; padding: 10px; min-height: 180px;">
                                            <a href="{{ $brand->url }}">
                                                <img
                                                    src="{{ RvMedia::getImageUrl($brand->logo, null, false, RvMedia::getDefaultImage()) }}"
                                                    alt="{{ $brand->name }}"
                                                    loading="lazy"
                                                    style="max-width: 180px; max-height: 140px; width: 100%; object-fit: contain;"
                                                >
                                            </a>
                                        </div>
                                        <div class="ps-product__container"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


