@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    @if($swipers->count() > 0)
        @include('qr_menu.themes.parts.swiper')
    @endif

    <section class="categories_page_categories">
        <div class="top">
            <div class="title">{{ __('Kategoriler') }}</div>
            <div class="link"> <a href="">
                    {{ __(' Öne Çıkan Kategorileri Gör') }} ></a> </div>
        </div>
        <div class="content">
            <div class="accordion" id="accordionExample">
                @foreach ($categories as $category)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed "
                                    style="background-color: #eed4bd" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}"
                                    aria-expanded="false" aria-controls="collapse{{ $category->id }}">

                                    @if(isset($category->image))
                                      <img class="image" src="{{storage($category->image)}}" alt="">
                                    @endif
                                <span>
                                    {{ $category->name }}</span>

                            </button>
                        </h2>
                        <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="content">
                                    @foreach($category->products as $product)
                                        <x-product-1
                                            title="{{$product->name}}"
                                            description="{{$product->description}}"
                                            price="{{$product->price}}"
                                            currency="TL"
                                        >
                                        </x-product-1>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

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

@endsection
