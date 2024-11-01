@extends('qr_menu.layouts.master')
@section('title', 'QR Menü')
@section('description', 'QR Menü')
@section('styles')
    <style>
        .newCalorieAre {
            z-index: 5;
            position: absolute;
            background: white;
            padding: 2px;
            border-radius: 5px;
            bottom: 5px;
            right: 10px;
            color: #e0483d;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 2px;
        }

    </style>
@endsection
@section('content')
    <section class="product_detail" style="padding: 10px;padding-bottom: 90px;">
        <section class="categories_page_swiper position-relative">
            <div id="mainPageSwiper" class="mainPageSwiper">
                <div class="swiper-wrapper">
                    @forelse($product->images as $image)
                        <div class="swiper-slide">
                            <img src="{{storage($image->image)}}" alt="">

                        </div>
                    @empty
                        <div class="swiper-slide">
                            <img style="height: 300px" src="{{storage($product->image)}}" alt="">

                        </div>
                    @endforelse


                </div>
                <div class="swiper-pagination"></div>
            </div>
            @if($product->calorie_total || $product->cookie_time)
                <span class="newCalorieAre">
                    @if($product->calorie_total)
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-flame"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12c2 -2.96 0 -7 -1 -8c0 3.038 -1.773 4.741 -3 6c-1.226 1.26 -2 3.24 -2 5a6 6 0 1 0 12 0c0 -1.532 -1.056 -3.94 -2 -5c-1.786 3 -2.791 3 -4 2z" /></svg>
                        {{$product->calorie_total}} kcal.
                    @endif
                    @if($product->cookie_time)
                        <svg  xmlns="http://www.w3.org/2000/svg" style="margin-left: 4px;margin-bottom: -1px;"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                        {{$product->cookie_time}} dk.
                    @endif
                 </span>
            @endif
        </section>

        <div class="top">

                <div class="title">{{ $product->name }} </div>
                <p class="description">
                    {!! $product->description !!}
                </p>

        </div>
        @if (false)
            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                <svg xmlns="http://www.w3.org/2000/svg" width="79.727" height="51.674" viewBox="0 0 79.727 51.674">
                    <g id="_2unob7.tif" data-name="2unob7.tif" transform="translate(-5785 -4625.797)">
                        <g id="Group_139" data-name="Group 139">
                            <g id="Group_137" data-name="Group 137">
                                <path id="Path_185" data-name="Path 185"
                                      d="M5824.876,4677.46c-8.6,0-17.2.019-25.8-.006a13.74,13.74,0,0,1-13.708-10.643,14.668,14.668,0,0,1-.355-3.43c0-7.832-.025-15.664,0-23.5a13.72,13.72,0,0,1,11.163-13.821,14.3,14.3,0,0,1,2.906-.267q25.8.006,51.6.006a13.817,13.817,0,0,1,14.032,14.056q.016,11.748,0,23.5a13.724,13.724,0,0,1-14.043,14.1C5842.077,4677.489,5833.476,4677.46,5824.876,4677.46Zm.012-3.615q12.9,0,25.795,0a10.113,10.113,0,0,0,10.413-10.33q.058-11.878,0-23.756a10.021,10.021,0,0,0-10.243-10.3q-25.972-.06-51.945,0a10.017,10.017,0,0,0-10.266,10.353q-.029,11.834,0,23.668a10.1,10.1,0,0,0,10.45,10.365Q5811.99,4673.847,5824.888,4673.845Z"
                                      fill="#f3f3f1" />
                            </g>
                            <g id="Group_138" data-name="Group 138">
                                <path id="Path_186" data-name="Path 186"
                                      d="M5816.837,4651.562c0-2.954.013-5.908-.007-8.862a2.114,2.114,0,0,1,3.439-1.917c4.719,2.974,9.453,5.926,14.174,8.9,1.786,1.124,1.792,2.8.021,3.911q-7.084,4.454-14.176,8.894a2.143,2.143,0,0,1-2.405.214,2.258,2.258,0,0,1-1.054-2.187C5816.851,4657.529,5816.837,4654.546,5816.837,4651.562Z"
                                      fill="#f3f3f1" />
                            </g>
                        </g>
                    </g>
                </svg>
                Video
            </button>
        @endif
        @if ($product->materials->count() > 0)
            <div class="title">{{ __('Çıkarılacak Malzeme Tercihi') }}</div>
            <div class="checkbox-container">
                @foreach ($product->materials as $material)
                    <label class="checkbox-item">
                        <input type="checkbox" name="materials[]">
                        <span class="checkmark"></span>
                        <span>{{$material->material->name}}</span>
                    </label>
                @endforeach
            </div>

        @endif
        @if ($product->sauces->count() > 0)
            <div class="title" style="margin: 20px 0px">{{ __('Sos Seçimi') }}</div>

            <div class="sausos">
                @foreach ($product->sauces as $sauce)
                    <div class="item">
                        <input type="checkbox" name="sauce_ids[]" value="{{ $sauce->sauce->id }}" id="{{ $sauce->sauce->name }}">
                        <label for="{{ $sauce->sauce->name }}">{{ $sauce->sauce->name }} </label>
                    </div>
                @endforeach
            </div>
        @endif
        @if($place->services->package_order || $place->services->take_away_order)
        <div class="basket">
            <button class="addToCartButton" data-product="{{$product->id}}">
                <i class="ti ti-shopping-cart"></i>
                {{ __('Sepete Ekle') }}
                <b>{{ $product->price. $place->price_type }}</b>
            </button>
        </div>
        @endif

        <div class="dialogModal videoModal">
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close closeButton" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="video">
                                {!! $product->embed !!}
                            </div>
                        </div>
                    {{--  <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')


@endsection
