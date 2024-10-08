<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="/qr_menu/assets/css/tabler-icons.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="icon" type="image/x-icon" href="{{storage(setting('site_favicon'))}}"/>

@php
    $accordionBodyColor = str_replace(array('rgb(', ')'), '', hexToRgb($colors->get('category_bg')));
 @endphp
<style>
    :root {
        --top_menu_bg: {{$colors->get('top_menu_bg')}};
        --top_menu_font: {{$colors->get('top_menu_font')}};
        --bottom_menu_bg: {{$colors->get('bottom_menu_bg')}};
        --bottom_menu_font: {{$colors->get('bottom_menu_font')}};
        --bottom_menu_bg_close: {{$colors->get('bottom_menu_bg_close')}};
        --bottom_menu_font_close: {{$colors->get('bottom_menu_font_close')}};
        --category_button_bg: {{$colors->get('category_button_bg')}};
        --category_button_font: {{$colors->get('category_button_font')}};
        --category_bg: {{$accordionBodyColor}};
        --product_card_bg: {{$colors->get('product_card_bg')}};
        --product_card_font: {{$colors->get('product_card_font')}};
        --product_card_time_bg: {{$colors->get('product_card_time_bg')}};
        --product_card_time_font: {{$colors->get('product_card_time_font')}};
        --product_card_add_button_bg: {{$colors->get('product_card_add_button_bg')}};
        --product_card_add_button_font: {{$colors->get('product_card_add_button_font')}};
    }
</style>
<link rel="stylesheet" href="/qr_menu/assets/app-XiLQjXB9.css">
<link rel="stylesheet" href="/qr_menu/assets/custom.css">
<link href="/qr_menu/assets/css/tom-select.css" rel="stylesheet">
<style>
    #select-beast {
        background: #fff;
        border: none;
        height: 34px;
        border-radius: 10px;
        font-size: 13px;
        line-height: 18px;
        padding: 5px 11px;
        position: relative;
        width: 100%;
    }
    .ts-dropdown .optgroup-header {
        color: #303030;
        background: #fff;
        cursor: default;
        font-weight: bold;
    }

    .ts-control, .ts-wrapper.single.input-active .ts-control {
        background: #fff;
        cursor: text;
        height: 34px;
        overflow: hidden;
    }

</style>
@yield('styles')
