<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="/qr_menu/assets/css/tabler-icons.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@php
    $accordionBodyColor = str_replace(array('rgb(', ')'), '', "rgb(224 72 61)");
 @endphp
<style>
    :root {
        --theme-background-color: #e0483d;
        --theme-link-color: #e0483d;
        --theme-category-color: #2ecc71;
        --theme-font-color: #fcfcfc;
        --theme-accordion-bg-color: rgb(224 72 61);
        --theme-accordion-body-color: {{$accordionBodyColor}};
        --theme-product-font-color: #686868;
        --theme-product-button-color: #e0483d;
        --font-size: 16px;
        --spacing: 8px;
    }
</style>
<link rel="stylesheet" href="/qr_menu/assets/app-XiLQjXB9.css">
<link rel="stylesheet" href="/qr_menu/assets/custom.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<style>
    .ts-dropdown .optgroup-header {
        color: #303030;
        background: #fff;
        cursor: default;
        font-weight: bold;
    }
</style>
@yield('styles')