<!doctype html>

<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{"Papyon". " | "}} @yield('title')</title>

    @include('front-end.layouts.components.meta')
    @include('front-end.layouts.components.styles')
</head>

<body>

@include('front-end.layouts.menu.top')
<section class="top-nav hamburgerMenu">
    <a id="mark" href="index.htm">
        <svg style="width: 130px;" xmlns="http://www.w3.org/2000/svg" id="katman_2" data-name="katman 2" viewbox="0 0 339.81 77.95">
            <defs>
                <style>
                    .cls-1 {
                        fill: #fff;
                        stroke-width: 0px;
                    }
                </style>
            </defs>
            <g id="Layer_1" data-name="Layer 1">
                <g>
                    <g>
                        <path class="cls-1" d="M336.92,58.98h-1.33l-1.61-2.17h-.61v2.17h-1.11v-5.34h2.38c1.23,0,1.94.61,1.94,1.61,0,.83-.49,1.36-1.36,1.52l1.7,2.21ZM333.36,54.65v1.22h1.26c.5,0,.8-.21.8-.61s-.3-.61-.8-.61h-1.26Z"></path>
                        <path class="cls-1" d="M334.37,61.75c-3,0-5.44-2.44-5.44-5.44s2.44-5.44,5.44-5.44,5.44,2.44,5.44,5.44-2.44,5.44-5.44,5.44ZM334.37,52.04c-2.35,0-4.27,1.92-4.27,4.27s1.92,4.27,4.27,4.27,4.27-1.92,4.27-4.27-1.92-4.27-4.27-4.27Z"></path>
                    </g>
                    <path class="cls-1" d="M31.28,45.26c3.38-.46,6.31-1.72,8.81-3.93,4.7-4.16,6.38-10.92,4.21-16.91-2.21-6.09-7.59-10.03-13.96-10.23-7.92-.25-14.46,5.04-15.94,12.91-.98,5.19.28,9.67,4.11,13.44,4.94,4.86,9.9,9.72,14.68,14.73,4.68,4.9,6.36,10.79,4.88,17.46-.32,1.46-1.07,2.75-1.97,3.95-.47.63-.77.7-1.39.08-8.35-8.4-16.69-16.81-25.11-25.13-4.6-4.54-7.75-9.82-9.02-16.19C-2.39,20.52,6.45,5.77,21.06,1.31c14.54-4.44,29.99,2.76,35.86,16.8,2.81,6.73,3.5,13.65.73,20.56-2.35,5.86-6.48,9.88-12.93,10.93-4.97.81-9.36-.59-13.12-3.93-.1-.09-.17-.21-.32-.41Z"></path>
                    <g>
                        <path class="cls-1" d="M80.91,19.1c-4.57,0-9.08,1.13-13.45,3.38-2.34,1.27-2.99,3.48-1.72,5.91l.76,1.44c.68,1.36,2.34,3.41,5.94,1.82,1.44-.78,4.36-2.1,7.62-2.1,4.05,0,6.06,1.8,6.15,5.51h-.44c-15.36,0-24.18,5.32-24.18,14.61,0,7.53,5.98,12.99,14.22,12.99,5.47,0,9.09-2.69,11.18-4.97.14,2.57,1.7,4.04,4.33,4.04h2.62c2.81,0,4.42-1.61,4.42-4.42v-21.38c0-10.55-6.53-16.84-17.46-16.84ZM86.29,43.38v.29c0,4.33-3.22,9.16-7.85,9.16-3.29,0-4.76-2.01-4.76-3.99,0-4.75,7.63-5.46,12.17-5.46h.44Z"></path>
                        <path class="cls-1" d="M127.91,19.1c-5.8,0-9.48,2.55-11.56,4.7-.05-2.26-1.78-3.78-4.34-3.78h-2.47c-2.73,0-4.42,1.69-4.42,4.42v48.31c0,2.77,1.65,4.42,4.42,4.42h3.32c2.81,0,4.42-1.61,4.42-4.42v-13.88c1.93,1.8,5.18,3.79,10.09,3.79,11.33,0,19.24-8.96,19.24-21.79s-7.51-21.78-18.7-21.78ZM134.29,41.04c0,6.59-3.5,11.02-8.7,11.02-5.66,0-8.62-5.5-8.62-10.94,0-8.29,4.53-11.25,8.78-11.25,5.11,0,8.55,4.49,8.55,11.17Z"></path>
                        <path class="cls-1" d="M183.63,20.03h-3.86c-2.47,0-4.07,1.19-4.74,3.5l-6.96,20.19c-.1.33-.2.69-.3,1.05-.13-.44-.27-.88-.4-1.28l-7.4-20.04c-.8-2.3-2.35-3.42-4.74-3.42h-4.17c-1.61,0-2.86.57-3.53,1.59-.66,1.02-.67,2.39-.02,3.83l14.77,34.5-1.27,3.02c-.91,2.19-2.75,4.52-5.16,4.52-.89,0-1.63-.29-2.3-.59l-.21-.07c-2.12-.5-3.82.36-4.83,2.48l-.67,1.63c-.6,1.24-.69,2.52-.26,3.59.4,1,1.23,1.76,2.36,2.19,1.37.53,3.47,1.24,5.91,1.24,6.96,0,12.69-4.15,15.3-11.09l16.22-41.56c.65-1.88.2-3.09-.29-3.77-.49-.68-1.48-1.5-3.45-1.5Z"></path>
                        <path class="cls-1" d="M211.11,19.1c-12.99,0-22.79,9.37-22.79,21.78s9.8,21.79,22.79,21.79,22.86-9.37,22.86-21.79-9.83-21.78-22.86-21.78ZM211.11,51.98c-6.07,0-10.47-4.67-10.47-11.09s4.5-11.09,10.47-11.09,10.55,4.77,10.55,11.09-4.54,11.09-10.55,11.09Z"></path>
                        <path class="cls-1" d="M259.12,19.1c-12.99,0-22.79,9.37-22.79,21.78s9.8,21.79,22.79,21.79,22.86-9.37,22.86-21.79-9.83-21.78-22.86-21.78ZM259.12,51.98c-6.07,0-10.47-4.67-10.47-11.09s4.5-11.09,10.47-11.09,10.55,4.77,10.55,11.09-4.54,11.09-10.55,11.09Z"></path>
                        <path class="cls-1" d="M311.29,19.1c-6.44,0-10.49,3.05-12.79,5.71v-.36c0-2.77-1.62-4.42-4.34-4.42h-3.01c-2.72,0-4.34,1.65-4.34,4.42v32.88c0,2.81,1.58,4.42,4.34,4.42h3.4c2.76,0,4.34-1.61,4.34-4.42v-15.2c0-6.89,4.18-11.71,10.17-11.71,3.64,0,5,1.86,5,6.85v20.07c0,2.77,1.65,4.42,4.42,4.42h3.32c2.81,0,4.42-1.61,4.42-4.42v-22.07c0-10.57-5.16-16.15-14.92-16.15Z"></path>
                    </g>
                </g>
            </g>
        </svg>
    </a>

    <div class="hamburger-menu">
        <div class="hamburger-menu_phone">
            <a href="tel:05350000000">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z">
                    </path>
                </svg>
            </a>
        </div>
        <div>
            <input id="menu__toggle" type="checkbox">
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>

            <ul class="menu__box">
                <li><a class="menu__item" href="ozellikler.html">Hakkımızda</a>
                </li>
                <li><a class="menu__item" href="ozellikler.html">Özellikler</a>
                </li>
                <li><a class="menu__item" href="entegrasyonlar.html">Fiyatlar</a></li>
                <li><a class="menu__item" href="entegrasyonlar.html">Entegrasyonlar</a></li>
                <li><a class="menu__item" href="paketler.html">Demolarımız</a></li>
                <li><a class="menu__item" href="is-birligi.html">Bayilik Başvurusu</a>
                </li>
                <li><a class="menu__item" href="iletisim.html">İletişim</a></li>
                <li><a class="menu__item" style="padding: 0; display:flex; justify-content:center;">
                        <button data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="third_button" style="">
                            7 Gün Ücretsiz Dene
                        </button>
                    </a></li>
                <li><a href="giris-yap.html" class="menu__item" style="padding: 0; display:flex; justify-content:center;">
                        <button data-bs-toggle="" data-bs-target="" class="third_button" style="background-color: aqua">
                            Giriş Yap
                        </button>
                    </a></li>
                <li class="hamburger-menu_languages">
                        <span> <a href="giris-yap.html"> <img src="/front/assets/images/turkey.png" alt=""> </a>
                        </span>
                    <span> <a href="giris-yap.html"> <img src="/front/assets/images/germany.png" alt=""> </a>
                        </span>
                    <span> <a href="giris-yap.html"> <img src="/front/assets/images/united-kingdom.png" alt="">
                            </a>
                        </span>
                    <span> <a href="giris-yap.html"> <img src="/front/assets/images/azerbaijan.png" alt=""></a>
                        </span>
                    <span> <a href="giris-yap.html"> <img src="/front/assets/images/france.png" alt=""> </a>
                        </span>
                </li>

                <li class="social_media_icons">
                    <a href=""> @svg('css-facebook')</a>
                    <a href=""> @svg('bi-twitter')</a>
                    <a href=""> @svg('ri-linkedin-fill')</a>
                    <a href=""> @svg('bi-youtube')</a>
                    <a href=""> @svg('ri-instagram-fill')</a>
                </li>
            </ul></div>

    </div>
</section>