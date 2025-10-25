<div class="ps-download-app enhanced-download-app">
    <div class="ps-container">
        <div class="ps-block--download-app">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="ps-block__thumbnail">
                            <div class="app-screenshot-wrapper">
                                {!! RvMedia::image($screenshot, __('Screenshot')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="ps-block__content">
                            <h3 class="app-title">{!! BaseHelper::clean($title) !!}</h3>
                            @if ($description)
                                <p class="app-description">{!! BaseHelper::clean($description) !!}</p>
                            @endif
                            @if ($subtitle)
                                <p class="app-subtitle">{!! BaseHelper::clean($subtitle) !!}</p>
                            @endif
                            
                            {{-- Codeavour Egypt Competition Button --}}
                            <div class="codeavour-section">
                                <a href="https://codeavour-egypt.org" target="_blank" rel="noopener" class="btn-codeavour" style="background: {{ theme_option('secondary_color', '#222222') }}; box-shadow: 0 4px 15px {{ theme_option('secondary_color', '#222222') }}4D;">
                                    <span class="btn-icon">🏆</span>
                                    <div class="btn-content">
                                        <span class="btn-label">Join Competition</span>
                                        <span class="btn-title">Codeavour Egypt</span>
                                    </div>
                                    <span class="btn-arrow">→</span>
                                </a>
                            </div>
                            
                            @if ($androidAppUrl || $iosAppUrl)
                                <div class="download-links">
                                    @if ($androidAppUrl)
                                        <a href="{{ (string) $androidAppUrl }}" class="app-store-link" target="_blank" rel="noopener">
                                            <img src="{{ Theme::asset()->url('img/google-play.png') }}" alt="{{ __('Google Play') }}">
                                        </a>
                                    @endif

                                    @if ($iosAppUrl)
                                        <a href="{{ (string) $iosAppUrl }}" class="app-store-link" target="_blank" rel="noopener">
                                            <img src="{{ Theme::asset()->url('img/app-store.png') }}" alt="{{ __('App Store') }}">
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced Download App Component */
.enhanced-download-app {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.enhanced-download-app::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(252,184,0,0.1) 0%, transparent 70%);
    border-radius: 50%;
}

.enhanced-download-app .ps-block--download-app {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    padding: 40px;
    position: relative;
    z-index: 1;
}

/* Screenshot */
.app-screenshot-wrapper {
    position: relative;
    text-align: center;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.app-screenshot-wrapper img {
    max-width: 100%;
    height: auto;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.2));
}

/* Content */
.ps-block__content {
    padding: 20px;
}

.app-title {
    font-size: 32px;
    font-weight: 700;
    color: #222;
    margin-bottom: 15px;
    line-height: 1.3;
}

.app-description {
    font-size: 16px;
    color: #666;
    margin-bottom: 10px;
    line-height: 1.6;
}

.app-subtitle {
    font-size: 14px;
    color: #999;
    margin-bottom: 25px;
}

/* Codeavour Egypt Button */
.codeavour-section {
    margin: 30px 0;
}

.btn-codeavour {
    display: flex;
    align-items: center;
    gap: 15px;
    color: #fff;
    padding: 18px 30px;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    max-width: 400px;
}

.btn-codeavour:hover {
    transform: translateY(-3px);
    filter: brightness(1.1);
    color: #fff;
    text-decoration: none;
    border-color: #fff;
}

.btn-codeavour .btn-icon {
    font-size: 32px;
    line-height: 1;
}

.btn-codeavour .btn-content {
    flex: 1;
    text-align: left;
}

.btn-codeavour .btn-label {
    display: block;
    font-size: 12px;
    opacity: 0.9;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-codeavour .btn-title {
    display: block;
    font-size: 18px;
    font-weight: 700;
    margin-top: 2px;
}

.btn-codeavour .btn-arrow {
    font-size: 24px;
    font-weight: bold;
    transition: transform 0.3s ease;
}

.btn-codeavour:hover .btn-arrow {
    transform: translateX(5px);
}

/* Download Links */
.download-links {
    display: flex;
    gap: 15px;
    margin-top: 25px;
    flex-wrap: wrap;
}

.app-store-link {
    display: inline-block;
    transition: all 0.3s ease;
    border-radius: 8px;
    overflow: hidden;
}

.app-store-link img {
    height: 50px;
    width: auto;
    display: block;
    transition: transform 0.3s ease;
}

.app-store-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.app-store-link:hover img {
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 991px) {
    .enhanced-download-app {
        padding: 40px 0;
    }
    
    .enhanced-download-app .ps-block--download-app {
        padding: 30px 20px;
    }
    
    .app-screenshot-wrapper {
        margin-bottom: 30px;
    }
    
    .app-title {
        font-size: 28px;
    }
}

@media (max-width: 768px) {
    .btn-codeavour {
        padding: 16px 20px;
    }
    
    .btn-codeavour .btn-title {
        font-size: 16px;
    }
    
    .app-title {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .btn-codeavour .btn-icon {
        font-size: 24px;
    }
    
    .download-links {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .app-store-link img {
        height: 45px;
    }
}

@media (max-width: 375px) {
    .ps-block__content {
        padding: 0;
    }
}
</style>
