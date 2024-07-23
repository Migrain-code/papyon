@extends('qr_menu.layouts.master')
@section('title', 'QR Menü')
@section('description', 'QR Menü')
@section('styles')
    <style>
        .categories_page_categories-2 .content .accordion .accordion-item .accordion-header .accordion-button {
            background-color: var(--category_button_bg);
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            padding: 35px 10px;
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
                            <a href="{{route('category', [$place->slug, $category->id])}}" class="accordion-button"  style="background-image: url('{{storage($category->image)}}')">
                                <div class="column">
                                    <span>
                                       {{$category->name}}
                                    </span>
                                    <span>
                                    </span>
                                </div>
                            </a>
                        </h2>
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
