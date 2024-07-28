<section>
    <div style="background: url(/front/assets/images/category_product_bg.svg); background-position:center;" class="category_product">
        <div class="container">
            <div class="category_product_image">
                <img src="{{storage(setting('section_6_image'))}}" alt="">
            </div>
            <div class="category_product_desc">
                <h5><strong>{{setting('section_6_title')}}</strong></h5>
                <div>{!! setting('section_6_description') !!}</div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="blog_posts">
        <div class="container">
            <div class="blog_posts_left">
                <b>
                    {{setting('section_7_title')}}
                </b>
                <p>
                    {{setting('section_7_sub_title')}}
                </p>
                <p>
                    {{setting('section_7_description')}}
                </p>
                <div class="blog_posts_left_arrows">
                    <img class="swiper-buttonc-prev" src="/front/assets/images/main_page_left_arrow.png" alt=""><img class="swiper-buttonc-next" src="/front/assets/images/main_page_right_arrow.png" alt="">
                </div>
                <div class="blog_posts_left_button">
                    <button>Tümünü Gör</button>
                </div>
            </div>
            <div class="blog_posts_right blog_swiper">
                <div class="swiper-wrapper">
                   {{--

                     @foreach ($blogs as $b)
                        <div class="swiper-slide">
                            <div class="blog_posts_right_card">
                                <div class="blog_posts_right_card_image">
                                    <img src="{{ asset($b->images[0] ?? null) }}" alt="post_image">
                                </div>
                                <div class="blog_posts_right_card_desc">
                                    {{ $b['name'] ?? $b['name'] }} <br>
                                    <a style="text-decoration:underline;"
                                       href="">{{ __('Daha Fazla Bilgi') }} <img
                                            style="padding-left: 20px;"
                                            src="{{ asset('/images/main_page_post_right_arrow.png') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   --}}

                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="blog_posts_left_arrows">
                <img class="swiper-buttonc-prev" src="/front/assets/images/main_page_left_arrow.png" alt=""><img class="swiper-buttonc-next" src="/front/assets/images/main_page_right_arrow.png" alt="">
            </div>

        </div>
    </div>
</section>
