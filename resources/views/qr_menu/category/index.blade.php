@extends('qr_menu.layouts.master')
@section('title', 'QR Menü')
@section('description', 'QR Menü')
@section('styles')
    <style>
        .whiteTitle {
            color: #ffffff;
            font-size: 20px;
        }
        .categories_page_categories-2 .top {
             display: flex;
             align-items: center;
             justify-content: center;
             margin: 20px auto;
             background: var(--top_menu_bg);
             padding: 20px;
             border-radius: 15px;
         }
        .categories_page_categories-2 .content {
            margin-top: 20px;
            padding: 10px;
        }
        .customTitle{
            font-weight: 700;
            font-size: 1.1rem;
            color: #757575;
            margin-top: 15px;
        }
        .addToCartButton {
            background: var(--product_card_add_button_bg) !important;
            background: none;
            border: none;
            transition: 0.3s;
            color: #ffffff;
            border-radius: 8px;
            padding: 5px 20px;
            max-width: 100px;
            margin-top: -15px;
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
    <section class="categories_page_categories-2" style="padding-bottom: 100px;">
        <div class="top">
            <div class="whiteTitle"><b>{{$category->name}}</b></div>
        </div>
        <div class="content">
            @foreach($products as $product)
                <div class="card cardContent ">
                    <div class="card-body position-relative">
                        @if($product->calorie_total || $product->cookie_time)
                        <span class="calorieAre">
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

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="col">
                                <div class="customTitle" @if(!$product->calorie_total && !$product->cookie_time) style="margin-top: 0px;" @endif>
                                    {{$product->name}}
                                </div>
                                <div class="description">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($product->description), 100) !!}
                                </div>
                                <div class="col">
                                    <div class="title" style="font-size: 1.2rem;@if($place->services->package_order) margin-top: 5px; @endif">
                                        {{$product->price}} {{$place->price_type}}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <a href="{{route('productDetail', [$place->slug, $product->id])}}">
                                        <img src="{{storage($product->image)}}" style="min-height: 110px;border-radius: 15px;object-fit: cover" class="w-100">
                                    </a>
                                    @if($place->services->package_order)
                                        <button type="button" class="addToCartButton" data-product="{{$product->id}}">
                                            Ekle
                                        </button>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection

@section('scripts')


@endsection
