<!DOCTYPE html>
<html {!! Theme::htmlAttributes() !!}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! BaseHelper::googleFonts('https://fonts.googleapis.com/css2?family=' . urlencode(theme_option('primary_font', 'Work Sans')) . ':wght@300;400;500;600;700&display=swap') !!}

    <style>
        :root {
            --color-1st: {{ theme_option('primary_color', '#fcb800') }};
            --primary-color: {{ theme_option('primary_color', '#fcb800') }};
            --color-2nd: {{ theme_option('secondary_color', '#222222') }};
            --secondary-color: {{ theme_option('secondary_color', '#222222') }};
            --primary-font: '{{ theme_option('primary_font', 'Work Sans') }}', sans-serif;
            --button-text-color: {{ theme_option('button_text_color', '#000') }};
            --header-text-color: {{ theme_option('header_text_color', '#000') }};
            --header-button-background-color: {{ theme_option('header_button_background_color', '#000') }};
            --header-button-text-color: {{ theme_option('header_button_text_color', '#fff') }};
            --header-text-hover-color: {{ theme_option('header_text_hover_color', '#fff') }};
            --header-text-accent-color: {{ theme_option('header_text_accent_color', '#222222') }};
            --header-diliver-border-color: {{ BaseHelper::hexToRgba(theme_option('header_text_color', '#000'), 0.15) }};
        }

        /* Custom Sidebar Link Hover and Active Styles */
        .widget_sidebar ul li a {
            padding: 5px 10px !important;
            transition: all 0.3s ease !important;
        }

        .widget_sidebar ul li a:hover {
            padding-left: 20px !important;
            color: #fff !important;
            background-color: var(--color-2nd) !important;
        }

        .widget_sidebar ul li a:hover:before {
            color: #fff !important;
        }

        .widget_sidebar ul li a.active {
            padding-left: 20px !important;
            color: #fff !important;
            background-color: var(--color-2nd) !important;
            font-weight: 600 !important;
        }

        .widget_sidebar ul li a.active:before {
            opacity: 1 !important;
            visibility: visible !important;
            color: #fff !important;
        }

        /* Blog/Shop Categories Widget */
        .widget--blog.widget--categories ul li a {
            padding: 6px 10px !important;
            transition: all 0.3s ease !important;
        }

        .widget--blog.widget--categories ul li a:hover {
            color: #fff !important;
            background-color: var(--color-2nd) !important;
        }

        .widget--blog.widget--categories ul li.active a {
            color: #fff !important;
            background-color: var(--color-2nd) !important;
            font-weight: 600 !important;
        }
    </style>

    @php
        Theme::asset()->remove('language-css');
        Theme::asset()->container('footer')->remove('language-public-js');
        Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-css');
        Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-js');
        Theme::asset()->container('footer')->remove('simple-slider-css');
        Theme::asset()->container('footer')->remove('simple-slider-js');
    @endphp

    {!! Theme::header() !!}
</head>
