@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="contacts_page_banner integration_page_banner">
        <div class="container">
            <div class="title">
                Entegrasyonlarımız
            </div>
            <img style="filter: sepia(1);" class="forTheUnderLine" src="/front/assets/images/home_page_bottom.svg" alt="">
            <div class="subtitle">
                Gelişmiş Entegrasyon Seçenekleri ile Müşteri Ağınızı Genişletin!</div>
        </div>
    </section>
    <section class="integrations_page_swiper">
        <div class="container">
            <div class="integration_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/front/assets/images/1709541563_food_image1.png" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/front/assets/images/1709541563_food_image2.png" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/front/assets/images/1709541563_food_image3.png" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/front/assets/images/1709541563_food_image4.png" alt="">
                    </div>
                </div>
                <div class="swiper-button-prev-custom custom-button">
                    <img src="/front/assets/images/swiper_left.svg" alt="	">
                </div>
                <div class="swiper-button-next-custom custom-button">
                    <img src="/front/assets/images/swiper_left.svg" alt="	">
                </div>
            </div>
        </div>
    </section>
    <section class="integration_page_info">
        <div class="container">
            <div class="content">
                <div class="left">
                    <h4>Tüm Satışlarınızı Tek Panelden Yönetin
                    </h4>
                    <p>Papyoon, Yemek Sepeti, Getir, Trendyol, ve Migros Yemek ile bir çok popüler online platformla entegrasyon imkanı sunar. Ürünlerinizi bu platformlar üzerinden müşterilere sunabilir ve hizmet ağınızı genişletebilirsiniz.
                    </p>
                    <div>
                        <button> 15 Gün Ücretsiz Deneyin <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                <polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9">
                                </polygon>
                            </svg></button><button><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z">
                                </path>
                            </svg> Sizi
                            Arayalım</button>
                    </div>
                </div>
                <div class="right"><img src="/front/assets/images/1709541563_integragtaion_page_1.png" alt=""></div>
            </div>
        </div>

    </section>
    <section class="integration_page_sss">
        <div class="container">
            <div class="title">Qr Menü Ekran Görüntüleri</div>
            <div class="integration_swiper_ss">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik1.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik01.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik2.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik02.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik3.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik03.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik4.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik5.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik6.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik06.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/front/assets/images/1718186942_refik7.jpg" alt=""></div>
                </div>
                <div class="swiper-button-prev-custom-x">
                    <img src="/front/assets/images/swiper_left.svg" alt="	">
                </div>
                <div class="swiper-button-next-custom-x">
                    <img src="/front/assets/images/swiper_left.svg" alt="	">
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const integrationSwiper = new Swiper(".integration_swiper", {
            spaceBetween: 10,
            slidesPerView: 5,
            pagination: false,
            loop: true,
            autoplay: {
                delay: 2200,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
            },
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },
        })
        const integrationSwiperSS = new Swiper(".integration_swiper_ss", {
            spaceBetween: 0,
            slidesPerView: 4,
            loop: true,
            autoplay: {
                delay: 2200,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 40
                },
            },
            navigation: {
                nextEl: '.swiper-button-next-custom-x',
                prevEl: '.swiper-button-prev-custom-x',
            },
        })
    </script>
@endsection
