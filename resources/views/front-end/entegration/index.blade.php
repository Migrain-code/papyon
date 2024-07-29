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
                    @foreach($entegrations as $entegration)
                        <div class="swiper-slide">
                            <img src="{{storage($entegration->image)}}" onclick="window.open('{{$entegration->link}}', '_blank')" style="border-radius: 10px" alt="">
                        </div>
                    @endforeach
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
    <section class="integration_page_sss">
        <div class="container">
            <div class="title">Qr Menü Ekran Görüntüleri</div>
            <div class="integration_swiper_ss">
                <div class="swiper-wrapper">
                    @foreach($images as $row)
                        <div class="swiper-slide">
                            <img src="{{storage($row->image)}}"  style="border-radius: 10px" alt="">
                        </div>
                    @endforeach


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
