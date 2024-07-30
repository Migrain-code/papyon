@extends('front-end.layouts.master')
@section('title', 'Anasayfa')
@section('styles')
    <style>
        iframe{
            max-width: 1300px;
            border-radius: 30px;
        }

    </style>

@endsection
@section('content')
    @include('front-end.welcome.parts.banner')
    @include('front-end.welcome.parts.cards')
    @include('front-end.welcome.parts.video')
    @include('front-end.welcome.parts.sample')
    @include('front-end.welcome.parts.package')
    @include('front-end.welcome.parts.blog')
@endsection
@section('scripts')
    <script type="module">
        const swiper = new Swiper('.swiper', {
            slidesPerView: 5,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2200,
                disableOnInteraction: false,
            },
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1000: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
            },
            // If we need pagination
            pagination: false,
            /* {
                       el: '.swiper-pagination',
                   }, */

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },

            // And if we need scrollbar
            /*   scrollbar: {
                  el: '.swiper-scrollbar',
              }, */
        });
    </script>
    <script>
        const blogSwiper = new Swiper(".blog_swiper", {
            spaceBetween: 140,
           slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 2200,
            },
            breakpoints: {
                340: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50
                },
            },
            navigation: {
                nextEl: '.swiper-buttonc-next',
                prevEl: '.swiper-buttonc-prev',
            },
            pagination: {
                el: '.swiper-pagination',
            },
        })
        const qrSwiper = new Swiper(".qr_example_menu_swiper", {
            loop: true,
            autoplay: {
                delay: 2200,
            },
            breakpoints: {
                340: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },

            },
        })
    </script>
@endsection
