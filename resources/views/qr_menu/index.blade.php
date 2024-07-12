@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="categories_page_swiper">
        <div id="mainPageSwiper" class="mainPageSwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="/qr_menu/assets/images/hamburger.png" alt="">
                    <div>
                        {{-- <p>DOYURAN <br> MENÜ</p> --}}
                        <p>Doyuran Menü </p>
                        <span>₺15</span>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="categories_page_categories">
        <div class="top">
            <div class="title">{{ __('Kategoriler') }}</div>
            <div class="link"> <a href="">
                    {{ __(' Öne Çıkan Kategorileri Gör') }} ></a> </div>
        </div>
        <div class="content">
            <div class="accordion" id="accordionExample">
                @for ($i = 0; $i < 5; $i++)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button"
                                    style="background-image: url('/qr_menu/assets/images/swiper_bg.png')" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}"
                                    aria-expanded="true" aria-controls="collapse{{ $i }}">

                                <img class="image" src="/qr_menu/assets/images/hamburger.png"
                                     alt="">

                                <span>
                                    {{ "Burgerler". $i}}</span>

                            </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="content">
                                    <div class="item">
                                        <div class="title">
                                            Product 1
                                        </div>
                                        <div class="description">asdasdasdasd </div>
                                        <div class="add">
                                            <button> <a href="">
                                                    {{ __('Ekle') }}
                                                </a></button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55.266"
                                                 height="43.252" viewBox="0 0 55.266 43.252">
                                                <g id="Group_1250" data-name="Group 1250"
                                                   transform="translate(-4187.032 -4537.374)">
                                                    <rect id="Rectangle_833" data-name="Rectangle 833"
                                                          width="55.266" height="43.252" rx="3.716"
                                                          transform="translate(4187.032 4537.374)"
                                                          fill="#e0483d" />
                                                </g>
                                                <g id="Group_1251" data-name="Group 1251"
                                                   transform="translate(-4187.032 -4537.374)">
                                                    <path id="Path_1378" data-name="Path 1378"
                                                          d="M4227.581,4556.3h-10.212v-10.212h-4.806V4556.3h-10.212v4.806h10.212v10.212h4.806V4561.1h10.212Z"
                                                          fill="#f3f3f1" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="title">
                                            Product 1
                                        </div>
                                        <div class="description">asdasdasdasd </div>
                                        <div class="add">
                                            <button> <a href="">
                                                    {{ __('Ekle') }}
                                                </a></button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55.266"
                                                 height="43.252" viewBox="0 0 55.266 43.252">
                                                <g id="Group_1250" data-name="Group 1250"
                                                   transform="translate(-4187.032 -4537.374)">
                                                    <rect id="Rectangle_833" data-name="Rectangle 833"
                                                          width="55.266" height="43.252" rx="3.716"
                                                          transform="translate(4187.032 4537.374)"
                                                          fill="#e0483d" />
                                                </g>
                                                <g id="Group_1251" data-name="Group 1251"
                                                   transform="translate(-4187.032 -4537.374)">
                                                    <path id="Path_1378" data-name="Path 1378"
                                                          d="M4227.581,4556.3h-10.212v-10.212h-4.806V4556.3h-10.212v4.806h10.212v10.212h4.806V4561.1h10.212Z"
                                                          fill="#f3f3f1" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </section>

@endsection

@section('scripts')

@endsection
