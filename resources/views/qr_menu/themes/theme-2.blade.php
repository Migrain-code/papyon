@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')
    <style>
        .categories_page_categories-2 .content .accordion .accordion-item .accordion-header .accordion-button {
            padding: 20px 20px;
            background-color: var(--theme-accordion-bg-color);
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            display: flex;
            justify-content: center;
        }
    </style>
@endsection
@section('content')
    @php
        $addToCartButton = true;
        $footerVisibility = true;
    @endphp
    <section class="categories_page_categories-2" style="padding-bottom: 100px;">
        <div class="top">
            <div class="title">Kategoriler</div>
            <div class="link">Öne Çıkan Kategorileri Gör ></div>
        </div>
        <div class="content">
            <div class="accordion" id="accordionExample">
                @foreach($categories as $category)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button @if($loop->index > 0) collapsed  @endif" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $category->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $category->id }}">
                                <div class="column">
                                    <span>
                                       {{$category->name}}
                                    </span>
                                    <span>
                                    </span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse{{ $category->id }}" class="accordion-collapse @if($loop->index > 0) collapse @else collapse show @endif" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="content" style="margin-top: 0px">

                                   @foreach($category->products as $product)
                                        <div class="card cardContent ">
                                            <div class="card-body position-relative">
                                                <span class="calorieAre">
                                                     <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-flame"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12c2 -2.96 0 -7 -1 -8c0 3.038 -1.773 4.741 -3 6c-1.226 1.26 -2 3.24 -2 5a6 6 0 1 0 12 0c0 -1.532 -1.056 -3.94 -2 -5c-1.786 3 -2.791 3 -4 2z" /></svg>
                                                150 kcal.
                                                  <svg  xmlns="http://www.w3.org/2000/svg" style="margin-left: 4px;margin-bottom: -1px;"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                                                 150 dk.
                                                </span>

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="col">
                                                        <div class="title">
                                                            {{$product->name}}
                                                        </div>
                                                        <div class="description">
                                                            {{$product->description}}
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="d-flex text-end justify-content-end flex-column">
                                                            <div class="col">
                                                                @if($addToCartButton)
                                                                    <button type="button" class="addToCardButton addToCartButton" data-product="{{$product->id}}">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg" width="40"  height="40"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4.929 4.929a10 10 0 1 1 14.141 14.141a10 10 0 0 1 -14.14 -14.14zm8.071 4.071a1 1 0 1 0 -2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0 -2h-2v-2z" /></svg>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            <div class="col">
                                                                <div class="title" style="font-size: 1.2rem;@if($addToCartButton) margin-top: 23px; @endif">
                                                                    {{$product->price}} TL
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <style>

    </style>

@endsection
