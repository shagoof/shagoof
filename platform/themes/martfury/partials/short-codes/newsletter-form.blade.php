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
