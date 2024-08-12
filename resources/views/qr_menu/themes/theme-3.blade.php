@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <div class="content-container">
        @if($swipers->count() > 0)
            @include('qr_menu.themes.parts.swiper')
        @endif
        <section class="categories">
            <div class="title">
                {{ __('Kategoriler') }}

            </div>
            <div class="content">
                @foreach($categories as $category)
                    <a href="#category{{$category->id}}">
                        <div class="card-style-2">
                            <div class="top" style="background-image:url('{{storage($category->image)}}')">

                            </div>
                            <div class="bottom">
                                <div class="title">{{$category->name}}</div>
                            </div>
                        </div>

                    </a>

                @endforeach
            </div>
        </section>

        <section class="meals">
            @foreach($categories as $category)
                <div class="top mt-30" id="category{{$category->id}}">
                    <div class="title">{{$category->name}}</div>
                    @if($loop->first)
                        <div class="d-flex">
                            <button class="columnButtons" data-column="twoColumn"><i class="ti ti-layout-2"></i></button>
                            {{--
                            <button class="columnButtons" data-column="threeColumn"><i class="ti ti-grid-dots"></i></button>
                            <button class="columnButtons" data-column="singleColumn"><i class="ti ti-maximize"></i></button>
                            --}}
                        </div>
                    @endif
                </div>
                <div class="content">
                    @foreach($category->products as $product)
                        <div style="" class="card-style-1">

                            <a href="javascript:void(0)">
                                <div class="top">
                                    <img src="{{storage($product->image)}}" onclick="window.location.href ='{{route('productDetail', [$place->slug, $product->id])}}'" style="min-height: 150px; object-fit: cover;width: 100%" alt="">

                                    @if(false)
                                        <div class="discount">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="31.413" height="31.398" viewBox="0 0 31.413 31.398">
                                                <g id="WKSiGu.tif" transform="translate(-8289.587 -4936.302)">
                                                    <g id="Group_3235" data-name="Group 3235">
                                                        <path id="Path_3733" data-name="Path 3733"
                                                              d="M8295.488,4967.7c.594-1.786,1.153-3.472,1.716-5.157q1.062-3.185,2.133-6.367a.373.373,0,0,0-.15-.492q-4.654-3.7-9.294-7.426c-.075-.061-.148-.125-.306-.258h.47c3.705,0,7.411-.006,11.117.01a.489.489,0,0,0,.561-.42q1.752-5.589,3.527-11.171c.012-.035.026-.069.045-.117.148.058.132.206.163.306q1.74,5.476,3.458,10.959a.53.53,0,0,0,.62.441c3.693-.013,7.387-.008,11.08-.008H8321c-.038.171-.167.213-.258.286q-4.613,3.7-9.233,7.382a.418.418,0,0,0-.16.552q1.827,5.425,3.634,10.858a.148.148,0,0,1,.01.036c.012.131.174.283.051.379s-.238-.082-.338-.158q-2.7-2.041-5.39-4.094c-1.241-.943-2.487-1.879-3.718-2.835-.218-.17-.342-.132-.537.017q-4.579,3.494-9.169,6.973C8295.784,4967.479,8295.674,4967.56,8295.488,4967.7Z"
                                                              fill="#e28941" />
                                                    </g>
                                                </g>
                                            </svg>
                                            <span>İndirimde</span>
                                        </div>
                                    @endif

                                </div>
                                <div class="bottom">
                                    <div class="title">{{$product->name}}</div>
                                    <div class="price">
                                        <p>{{$product->price}} ₺</p>
                                        @if($place->services->package_order || $place->services->take_away_order ||  $place->services->table_order == 1)

                                            <svg class="addToCartButton" data-product="{{$product->id}}" xmlns="http://www.w3.org/2000/svg" width="61.479" height="61.479" viewBox="0 0 61.479 61.479">
                                            <g id="Group_3412" data-name="Group 3412" transform="translate(-7714.521 -5540.625)">
                                                <g id="Group_3410" data-name="Group 3410">
                                                    <rect id="Rectangle_3349" data-name="Rectangle 3349" width="61.479" height="61.479"
                                                          rx="9.484" transform="translate(7714.521 5540.625)" fill="#e0483d" />
                                                </g>
                                                <g id="Group_3411" data-name="Group 3411">
                                                    <path id="Path_3871" data-name="Path 3871"
                                                          d="M7761.809,5569.416h-12.894v-12.894h-6.068v12.894h-12.894v6.068h12.894v12.894h6.068v-12.894h12.894Z"
                                                          fill="#f3f3f1" />
                                                </g>
                                            </g>
                                        </svg>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>

        @if($swipers->count() > 0)
            @include('qr_menu.themes.parts.swiper')
        @endif
    </div>
    @if(isset($menu->banner) && $menu->banner->status == 1)
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

    <script>
        $(document).on('click', '.columnButtons', function (){
           var type = $(this).data('column');

           if(type == "twoColumn"){
               $('.meals .content').css('grid-template-columns', 'repeat(2, 1fr)');
               $('.card-style-1 .bottom .price svg').css('width', '25px').css('height', '25px');
               $('.card-style-1 .bottom .title').css('font-size', '1rem');
               $('.card-style-1 .bottom .price p').css('font-size', '1rem');
               $('.newCalorieAre').css('font-size', '13px');

           } else if(type == "threeColumn"){
               $('.meals .content').css('grid-template-columns', 'repeat(3, 1fr)');
               $('.card-style-1 .bottom .price svg').css('width', '16px').css('height', '16px');
               $('.card-style-1 .bottom .title').css('font-size', '0.75rem');
               $('.card-style-1 .bottom .price p').css('font-size', '0.75rem');
               $('.newCalorieAre').css('font-size', '8px');
           } else{
               $('.meals .content').css('grid-template-columns', 'repeat(1, 1fr)');
               $('.card-style-1 .bottom .price svg').css('width', '25px').css('height', '25px');
               $('.card-style-1 .bottom .title').css('font-size', '1rem');
               $('.card-style-1 .bottom .price p').css('font-size', '1rem');
               $('.newCalorieAre').css('font-size', '13px');

           }
        });

    </script>

    @if(isset($menu->banner) && $menu->banner->status == 1)
        <script>
            if (!localStorage.getItem('modalShown')) {
                var productModal = new bootstrap.Modal(document.querySelector('#popupBannerModal'));
                productModal.show();
                localStorage.setItem('modalShown', 'true');
            }
        </script>
    @endif
@endsection
