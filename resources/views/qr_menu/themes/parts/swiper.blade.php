<section class="categories_page_swiper">
    <div id="mainPageSwiper" class="mainPageSwiper">
        <div class="swiper-wrapper">
            @foreach($swipers as $swiper)
                <div class="swiper-slide">
                    <img src="{{storage($swiper->image)}}" alt="">

                </div>
            @endforeach


        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
