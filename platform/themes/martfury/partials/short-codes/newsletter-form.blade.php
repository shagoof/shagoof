<div class="ps-newsletter mt-40 mb-40 enhanced-newsletter">
    <div class="ps-container newsletter-form">
        <div class="newsletter-wrapper">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="ps-form__left">
                        <div class="newsletter-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="newsletter-title">{!! BaseHelper::clean($title) !!}</h3>
                        @if ($description)
                            <p class="newsletter-description">{!! BaseHelper::clean($description) !!}</p>
                        @endif
                        @if ($subtitle)
                            <p class="newsletter-subtitle">{!! BaseHelper::clean($subtitle) !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="ps-form__right">
                        <form class="ps-form--newsletter-inner" method="post" action="{{ route('public.newsletter.subscribe') }}">
                            @csrf
                            <div class="form-group--nest">
                                <div class="input-wrapper">
                                    <span class="input-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <input class="form-control newsletter-input" name="email" type="email" placeholder="{{ __('Enter your email address') }}" required>
                                </div>
                                <button class="ps-btn newsletter-btn" type="submit">
                                    <span>{{ __('Subscribe') }}</span>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            {!! apply_filters('form_extra_fields_render', null, \Botble\Newsletter\Forms\Fronts\NewsletterForm::class) !!}
                        </form>
                        
                        <!-- Codeavour Egypt Competition Button -->
                        <div class="competition-cta mt-3">
                            <a href="https://codeavour-egypt.org/" target="_blank" rel="noopener noreferrer" class="codeavour-btn">
                                <span class="codeavour-icon">🏆</span>
                                <span class="codeavour-text">
                                    <strong>Join Codeavour Egypt Competition</strong>
                                    <small>Unleash Your Coding Potential</small>
                                </span>
                                <span class="codeavour-arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.enhanced-newsletter {
    position: relative;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 60px 0;
    overflow: hidden;
}

.enhanced-newsletter::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.3;
}

.newsletter-wrapper {
    background: rgba(255, 255, 255, 0.98);
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    position: relative;
    z-index: 1;
    backdrop-filter: blur(10px);
}

.ps-form__left {
    padding-right: 30px;
}

.newsletter-icon {
    color: #667eea;
    margin-bottom: 20px;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.newsletter-title {
    font-size: 32px;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 15px;
    line-height: 1.3;
}

.newsletter-description {
    font-size: 16px;
    color: #4a5568;
    margin-bottom: 10px;
    line-height: 1.6;
}

.newsletter-subtitle {
    font-size: 14px;
    color: #718096;
    margin-bottom: 0;
}

.ps-form__right {
    padding-left: 30px;
}

.ps-form--newsletter-inner {
    margin-bottom: 0;
}

.form-group--nest {
    display: flex;
    gap: 10px;
    margin-bottom: 0;
}

.input-wrapper {
    flex: 1;
    position: relative;
}

.input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #a0aec0;
    z-index: 2;
    pointer-events: none;
}

.newsletter-input {
    height: 56px;
    padding-left: 50px !important;
    padding-right: 20px !important;
    border-radius: 12px;
    border: 2px solid #e2e8f0;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #fff;
}

.newsletter-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
}

.newsletter-btn {
    height: 56px;
    padding: 0 35px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    color: #fff;
    font-weight: 600;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.newsletter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
}

.newsletter-btn svg {
    transition: transform 0.3s ease;
}

.newsletter-btn:hover svg {
    transform: translateX(5px);
}

/* Codeavour Egypt Competition Button */
.competition-cta {
    margin-top: 20px;
}

.codeavour-btn {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px 25px;
    background: linear-gradient(135deg, #fcb800 0%, #f77f00 100%);
    border-radius: 12px;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(252, 184, 0, 0.3);
    position: relative;
    overflow: hidden;
}

.codeavour-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.codeavour-btn:hover::before {
    left: 100%;
}

.codeavour-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(252, 184, 0, 0.5);
    color: #fff;
    text-decoration: none;
}

.codeavour-icon {
    font-size: 32px;
    animation: rotate 3s ease-in-out infinite;
}

@keyframes rotate {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-15deg); }
    75% { transform: rotate(15deg); }
}

.codeavour-text {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.codeavour-text strong {
    font-size: 16px;
    font-weight: 700;
    display: block;
}

.codeavour-text small {
    font-size: 13px;
    opacity: 0.9;
    font-weight: 400;
}

.codeavour-arrow {
    font-size: 24px;
    font-weight: bold;
    transition: transform 0.3s ease;
}

.codeavour-btn:hover .codeavour-arrow {
    transform: translateX(5px);
}

/* Responsive Design */
@media (max-width: 1199px) {
    .newsletter-wrapper {
        padding: 40px;
    }
    
    .ps-form__left,
    .ps-form__right {
        padding-left: 0;
        padding-right: 0;
    }
}

@media (max-width: 991px) {
    .newsletter-wrapper {
        padding: 30px;
    }
    
    .ps-form__left {
        margin-bottom: 30px;
        text-align: center;
    }
    
    .newsletter-icon {
        display: flex;
        justify-content: center;
    }
    
    .newsletter-title {
        font-size: 28px;
    }
}

@media (max-width: 767px) {
    .enhanced-newsletter {
        padding: 40px 0;
    }
    
    .newsletter-wrapper {
        padding: 25px;
    }
    
    .form-group--nest {
        flex-direction: column;
    }
    
    .newsletter-btn {
        width: 100%;
        justify-content: center;
    }
    
    .newsletter-title {
        font-size: 24px;
    }
    
    .codeavour-btn {
        padding: 18px 20px;
    }
    
    .codeavour-text strong {
        font-size: 15px;
    }
    
    .codeavour-text small {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .newsletter-input {
        height: 50px;
        padding-left: 45px !important;
        font-size: 14px;
    }
    
    .newsletter-btn {
        height: 50px;
        font-size: 14px;
        padding: 0 25px;
    }
    
    .codeavour-icon {
        font-size: 28px;
    }
}
</style>
