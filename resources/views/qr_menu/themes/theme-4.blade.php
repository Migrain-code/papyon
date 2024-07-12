@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')
    <style>
        .mainPageSwiper .swiper-wrapper .swiper-slide {
            background-image: url("{{ asset('/qr_menu/assets/images/swiper_bg.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('content')
    <section>

        <div id="mainPageSwiper" class="mainPageSwiper">
            <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img src="/qr_menu/assets/images/hamburger.png" alt="">
                        <div>
                            {{-- <p>DOYURAN <br> MENÜ</p> --}}
                            <p>Burgerler </p>
                            <span>₺15</span>
                        </div>
                    </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </section>
    <section class="categories">
        <div class="title">
            {{ __('Kategoriler') }}
        </div>
        <div class="content">
                <a href="">
                    <div class="card-style-2">
                        <div class="top" style="background-image:url('/qr_menu/assets/images/swiper_bg.png')">
                            <img src="/qr_menu/assets/images/hamburger.png" alt="">
                        </div>
                        <div class="bottom">
                            <div class="title">Reklam 1</div>
                        </div>
                    </div>

                </a>
        </div>
    </section>

        <section class="meals">
            <div class="top">
                <div class="title">Kategori 1</div>
                <div class="link">
                    <a href="">{{ __('Öne Çıkan Kategorileri Gör') }} ></a>
                </div>
            </div>
            <div class="content">
                <div style="" class="card-style-1">
                    <a href="">
                        <div class="top">
                            <img src="/qr_menu/assets/images/hamburger.png" alt="">

                                <div class="discount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31.413" height="31.398" viewBox="0 0 31.413 31.398">
                                        <g id="WKSiGu.tif" transform="translate(-8289.587 -4936.302)">
                                            <g id="Group_3235" data-name="Group 3235">
                                                <path id="Path_3733" data-name="Path 3733"
                                                      d="M8295.488,4967.7c.594-1.786,1.153-3.472,1.716-5.157q1.062-3.185,2.133-6.367a.373.373,0,0,0-.15-.492q-4.654-3.7-9.294-7.426c-.075-.061-.148-.125-.306-.258h.47c3.705,0,7.411-.006,11.117.01a.489.489,0,0,0,.561-.42q1.752-5.589,3.527-11.171c.012-.035.026-.069.045-.117.148.058.132.206.163.306q1.74,5.476,3.458,10.959a.53.53,0,0,0,.62.441c3.693-.013,7.387-.008,11.08-.008H8321c-.038.171-.167.213-.258.286q-4.613,3.7-9.233,7.382a.418.418,0,0,0-.16.552q1.827,5.425,3.634,10.858a.148.148,0,0,1,.01.036c.012.131.174.283.051.379s-.238-.082-.338-.158q-2.7-2.041-5.39-4.094c-1.241-.943-2.487-1.879-3.718-2.835-.218-.17-.342-.132-.537.017q-4.579,3.494-9.169,6.973C8295.784,4967.479,8295.674,4967.56,8295.488,4967.7Z"
                                                      fill="#e28941" />
                                            </g>
                                        </g>
                                    </svg>
                                    <span>İndirimde</span>
                                </div>

                        </div>
                        <div class="bottom">
                            <div class="title">Ürün 1</div>
                            <div class="price">
                                <p>
                                    ₺ 15
                                </p>
                                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="61.479" height="61.479" viewBox="0 0 61.479 61.479">
                        <g id="Group_3412" data-name="Group 3412" transform="translate(-7714.521 -5540.625)">
                            <g id="Group_3410" data-name="Group 3410">
                                <rect id="Rectangle_3349" data-name="Rectangle 3349" width="61.479" height="61.479"
                                      rx="9.484" transform="translate(7714.521 5540.625)" fill="#e0483d" />
                            </g>
                            <g id="Group_3411" data-name="Group 3411">
                                <path id="Path_3871" data-name="Path 3871"
                                      d="M7761.809,5569.416h-12.894v-12.894h-6.068v12.894h-12.894v6.068h12.894v12.894h6.068v-12.894h12.894Z"
                                      fill="#f3f3f1" />
                            </g>
                        </g>
                    </svg>
                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div style="" class="card-style-1">
                    <a href="">
                        <div class="top">
                            <img src="/qr_menu/assets/images/hamburger.png" alt="">

                            <div class="discount">
                                <svg xmlns="http://www.w3.org/2000/svg" width="31.413" height="31.398" viewBox="0 0 31.413 31.398">
                                    <g id="WKSiGu.tif" transform="translate(-8289.587 -4936.302)">
                                        <g id="Group_3235" data-name="Group 3235">
                                            <path id="Path_3733" data-name="Path 3733"
                                                  d="M8295.488,4967.7c.594-1.786,1.153-3.472,1.716-5.157q1.062-3.185,2.133-6.367a.373.373,0,0,0-.15-.492q-4.654-3.7-9.294-7.426c-.075-.061-.148-.125-.306-.258h.47c3.705,0,7.411-.006,11.117.01a.489.489,0,0,0,.561-.42q1.752-5.589,3.527-11.171c.012-.035.026-.069.045-.117.148.058.132.206.163.306q1.74,5.476,3.458,10.959a.53.53,0,0,0,.62.441c3.693-.013,7.387-.008,11.08-.008H8321c-.038.171-.167.213-.258.286q-4.613,3.7-9.233,7.382a.418.418,0,0,0-.16.552q1.827,5.425,3.634,10.858a.148.148,0,0,1,.01.036c.012.131.174.283.051.379s-.238-.082-.338-.158q-2.7-2.041-5.39-4.094c-1.241-.943-2.487-1.879-3.718-2.835-.218-.17-.342-.132-.537.017q-4.579,3.494-9.169,6.973C8295.784,4967.479,8295.674,4967.56,8295.488,4967.7Z"
                                                  fill="#e28941" />
                                        </g>
                                    </g>
                                </svg>
                                <span>İndirimde</span>
                            </div>

                        </div>
                        <div class="bottom">
                            <div class="title">Ürün 1</div>
                            <div class="price">
                                <p>
                                    ₺ 15
                                </p>
                                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="61.479" height="61.479" viewBox="0 0 61.479 61.479">
                        <g id="Group_3412" data-name="Group 3412" transform="translate(-7714.521 -5540.625)">
                            <g id="Group_3410" data-name="Group 3410">
                                <rect id="Rectangle_3349" data-name="Rectangle 3349" width="61.479" height="61.479"
                                      rx="9.484" transform="translate(7714.521 5540.625)" fill="#e0483d" />
                            </g>
                            <g id="Group_3411" data-name="Group 3411">
                                <path id="Path_3871" data-name="Path 3871"
                                      d="M7761.809,5569.416h-12.894v-12.894h-6.068v12.894h-12.894v6.068h12.894v12.894h6.068v-12.894h12.894Z"
                                      fill="#f3f3f1" />
                            </g>
                        </g>
                    </svg>
                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    <section style="padding-bottom: 80px">

        <div id="mainPageSwiper2" class="mainPageSwiper">
            <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img src="/qr_menu/assets/images/hamburger.png" alt="">
                        <div>
                            {{-- <p>DOYURAN <br> MENÜ</p> --}}
                            <p>İndirim </p>
                            <span>₺ 15</span>
                        </div>
                    </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script>
            const swiper2 = new Swiper('#mainPageSwiper2', {
                loop: true,
                /*     autoplay: {
                				delay: 5000,
                		}, */
                pagination: {
                    el: '.swiper-pagination',
                },

            });
        </script>
    </section>

@endsection

@section('scripts')
    <script>
        const swiper = new Swiper('#mainPageSwiper', {
            loop: true,
            /*     autoplay: {
                    delay: 5000,
                }, */
            pagination: {
                el: '.swiper-pagination',
            },

        });
    </script>
@endsection
