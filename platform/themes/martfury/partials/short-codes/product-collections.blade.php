<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes scaleIn {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }
    
    .ps-collection-item {
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
    }
    
    .ps-collection-item:hover img {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
    
    .ps-collection-item img {
        transition: transform 0.3s ease;
    }
    
    .ps-collection-item:hover .ps-collection-name {
        color: #fcb800;
        transition: color 0.3s ease;
    }
    
    .ps-collection-name {
        transition: color 0.3s ease;
    }
</style>

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
             data-owl-auto="false"
             data-owl-loop="false"
             data-owl-speed="500"
             data-owl-gap="30"
             data-owl-nav="false"
             data-owl-dots="true"
             data-owl-item="7"
             data-owl-item-xs="2"
             data-owl-item-sm="2"
             data-owl-item-md="3"
             data-owl-item-lg="4"
             data-owl-item-xl="6"
             data-owl-duration="500"
             data-owl-mousedrag="on"
             data-owl-center="true"
        >
            @foreach($productCollections->skip(1) as $index => $collection)
                <div class="ps-collection-item text-center" style="margin: 0 auto; animation-delay: {{ $index * 0.1 }}s;">
                    <a href="{{ $collection->url }}" style="cursor: pointer; display: flex; flex-direction: column; align-items: center;" title="{{ $collection->name }}">
                        <img src="{{ RvMedia::getImageUrl($collection->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $collection->name }}" loading="lazy" style="margin: 0 auto;"/>
                        <p class="ps-collection-name mt-2" style="text-align: center;">{{ $collection->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
