<div class="mt-40 mb-40">
    <div class="ps-container">
        @if($title)
            <div class="ps-top-categories">
                <div class="ps-section__header">
                    <h3>{!! BaseHelper::clean($title) !!}</h3>
                </div>
            </div>
        @endif
        <div class="ps-carousel--nav owl-slider"
             data-owl-auto="true"
             data-owl-loop="false"
             data-owl-speed="10000"
             data-owl-gap="30"
             data-owl-nav="false"
             data-owl-dots="true"
             data-owl-item="7"
             data-owl-item-xs="2"
             data-owl-item-sm="2"
             data-owl-item-md="3"
             data-owl-item-lg="4"
             data-owl-item-xl="6"
             data-owl-duration="1000"
             data-owl-mousedrag="on"
             data-owl-center="true"
             style="display: flex; justify-content: center; align-items: center;"
        >
            @foreach($productCollections->skip(1) as $collection)
                <div class="ps-collection-item text-center" style="margin: 0 auto;">
                    <a href="{{ $collection->url }}" style="cursor: pointer; display: flex; flex-direction: column; align-items: center;" title="{{ $collection->name }}">
                        <img src="{{ RvMedia::getImageUrl($collection->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $collection->name }}" loading="lazy" style="margin: 0 auto;"/>
                        <p class="ps-collection-name mt-2" style="text-align: center;">{{ $collection->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
