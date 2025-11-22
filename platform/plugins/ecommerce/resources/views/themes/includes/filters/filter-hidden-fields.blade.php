<div class="bb-ecommerce-filter-hidden-fields">
    @foreach ([
        'layout',
        'page',
        'per-page',
        'num',
        'sort-by',
        'collection',
        'discounted_only',
    ] as $item)
        <input
            name="{{ $item }}"
            type="hidden"
            class="product-filter-item"
            value="{{ BaseHelper::stringify(request()->input($item)) }}"
        >
    @endforeach

    @if (request()->has('categories') && ! isset($category))
        @php
            $categories = EcommerceHelper::parseFilterParams(request(), 'categories');
        @endphp
        @foreach ($categories as $category)
            <input
                name="categories[]"
                type="hidden"
                class="product-filter-item"
                value="{{ $category }}"
            >
        @endforeach
    @endif
</div>
