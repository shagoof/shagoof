@php
    $productCollectionsFilter = get_product_collections(
        [
            'status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED,
            'is_featured' => true,
        ],
        [],
        ['id', 'name', 'slug']
    );

    // Make collections filter behave like other filters (brands, tags, etc.)
    $requestCollections = EcommerceHelper::parseFilterParams(request(), 'collections');
@endphp

@if ($productCollectionsFilter->isNotEmpty())
    <div class="bb-product-filter">
        <h4 class="bb-product-filter-title">{{ __('Age Group') }}</h4>

        <div class="bb-product-filter-content">
            <ul class="bb-product-filter-items filter-checkbox">
                @foreach ($productCollectionsFilter as $collection)
                    <li class="bb-product-filter-item">
                        <input
                            id="attribute-collection-{{ $collection->id }}"
                            type="checkbox"
                            name="collections[]"
                            value="{{ $collection->id }}"
                            @checked(in_array($collection->id, $requestCollections))
                        />
                        <label for="attribute-collection-{{ $collection->id }}">{{ $collection->name }}</label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

