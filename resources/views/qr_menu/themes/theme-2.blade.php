@extends('qr_menu.layouts.master')
@section('title', 'QR Menü')
@section('description', 'QR Menü')
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
        #cartArea{
            position: relative;
        }
    </style>
@endsection
@section('content')
    @if($swipers->count() > 0)
        @include('qr_menu.themes.parts.swiper')
    @endif

    <section class="categories_page_categories-2" style="padding-bottom: 100px;">
        <div class="top">
            <div class="title"><b>Kategoriler</b></div>
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
                                                                @if($place->services->package_order)
                                                                    <button type="button" class="addToCardButton addToCartButton" data-product="{{$product->id}}">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg" width="40"  height="40"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4.929 4.929a10 10 0 1 1 14.141 14.141a10 10 0 0 1 -14.14 -14.14zm8.071 4.071a1 1 0 1 0 -2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0 -2h-2v-2z" /></svg>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            <div class="col">
                                                                <div class="title" style="font-size: 1.2rem;@if($place->services->package_order) margin-top: 23px; @endif">
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
    @if(isset($menu->banner))
        <div class="dialogModal">
            <div class="modal fade" id="popupBannerModal" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"  style="border: none">

                        <div class="modal-body " @if($menu->banner->banner_type == 1 || $menu->banner->banner_type == 2) style="border-radius: 7px;min-height: 250px;background-image: url('{{storage($menu->banner->image)}}') !important;background-size: cover;" @endif >
                            <button type="button" class="btn-close closeButton" style="position: absolute;
                                    right: 10px;
                                    top: 10px;
                                    padding: 5px;" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        @if($menu->banner->banner_type == 1 || $menu->banner->banner_type == 3)
                            <div class="modal-footer" style="justify-content: start;padding: 20px;">
                                <div class="text-start" style="overflow-wrap: anywhere;"> {{ $menu->banner->description }}</div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    @if(isset($menu->banner))
        <script>
            if (!localStorage.getItem('modalShown')) {
                var productModal = new bootstrap.Modal(document.querySelector('#popupBannerModal'));
                productModal.show();
                localStorage.setItem('modalShown', 'true');
            }
        </script>
    @endif

@endsection
