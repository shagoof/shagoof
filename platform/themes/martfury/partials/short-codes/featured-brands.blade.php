<div class="mt-40 mb-40">
    <div class="ps-container">
        @if($title)
            <div class="ps-top-categories">
                <div class="ps-section__header">
                    <h3>{!! BaseHelper::clean($title) !!}</h3>
                </div>
            </div>
        @endif
        <div class="ps-carousel--nav owl-slider enhanced-brand-carousel"
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
        >
            @foreach($brands as $brand)
                <div class="brand-item-wrapper">
                    @if($brand->website)
                        <a href="{{ $brand->website }}" class="brand-link" target="_blank" rel="noopener">
                    @endif
                    <div class="brand-item">
                        <div class="brand-logo-container">
                            <img src="{{ RvMedia::getImageUrl($brand->logo, null, false, RvMedia::getDefaultImage()) }}" 
                                 alt="{{ $brand->name }}" 
                                 class="brand-logo"
                                 loading="lazy"/>
                        </div>
                        @if($brand->name)
                            <div class="brand-name">{{ $brand->name }}</div>
                        @endif
                    </div>
                    @if($brand->website)
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.enhanced-brand-carousel {
    padding: 20px 0;
}

.brand-item-wrapper {
    padding: 10px;
}

.brand-item {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border: 1px solid #f0f0f0;
    height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.brand-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(252,184,0,0.05) 0%, rgba(34,34,34,0.05) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.brand-item:hover::before {
    opacity: 1;
}

.brand-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: #fcb800;
}

.brand-logo-container {
    position: relative;
    z-index: 2;
    margin-bottom: 8px;
}

.brand-logo {
    max-height: 50px;
    max-width: 100px;
    width: auto;
    height: auto;
    object-fit: contain;
    transition: all 0.3s ease;
    filter: grayscale(100%) opacity(0.7);
}

.brand-item:hover .brand-logo {
    filter: grayscale(0%) opacity(1);
    transform: scale(1.05);
}

.brand-name {
    font-size: 12px;
    font-weight: 500;
    color: #666;
    margin-top: 5px;
    position: relative;
    z-index: 2;
    transition: color 0.3s ease;
}

.brand-item:hover .brand-name {
    color: #fcb800;
}

.brand-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.brand-link:hover {
    text-decoration: none;
    color: inherit;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .brand-item {
        height: 100px;
        padding: 15px;
    }
    
    .brand-logo {
        max-height: 40px;
        max-width: 80px;
    }
    
    .brand-name {
        font-size: 11px;
    }
}

@media (max-width: 480px) {
    .brand-item {
        height: 90px;
        padding: 12px;
    }
    
    .brand-logo {
        max-height: 35px;
        max-width: 70px;
    }
}
</style>
