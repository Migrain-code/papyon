@extends('business.layouts.master')
@section('title', 'Tasarımı Özelleştirin')
@section('styles')
    <style>
        .form-check .form-check-input {
            float: left;
            margin-left: -1.7em;
            width: 30px;
            height: 20px;
            border: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tema Ayarları/</span> Tasarımı Özelleştirin</h4>

        <div class="app-academy">
            <div class="card p-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                    <div class="app-academy-md-25 card-body py-0">
                        <img
                            src="/business/assets/img/illustrations/bulb-light.png"
                            class="img-fluid app-academy-img-height scaleX-n1-rtl"
                            alt="Bulb in hand"
                            data-app-light-img="illustrations/bulb-light.png"
                            data-app-dark-img="illustrations/bulb-dark.png"
                            height="90"
                            style="height: 140px;"
                        />
                    </div>
                    <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                        <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                            QR Menünüzün Tasarımını Oluşturun
                            <span class="text-primary fw-medium text-nowrap">Tasarımı Özelleştirin</span>.
                        </h3>
                        <p class="mb-3">
                            Burada eklediğiniz tüm menüleriniz için tüm düzenleme, yönetim, menü kopyalama ve kaldırma işlerinizi yapabilirsiniz.
                        </p>

                    </div>
                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                        <img
                            src="/business/assets/img/illustrations/pencil-rocket.png"
                            alt="pencil rocket"
                            height="188"
                            class="scaleX-n1-rtl"
                            style="height: 140px;"
                        />
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Tasarımı Özelleştirin</h5>
                        <p class="text-muted mb-0">Tasarımınızın Renkleri</p>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @include('business.theme.menu.nav')
                        <!--/ User Pills -->
                        <div class="row">
                            <div class="col-4">
                                <iframe id="cardFrame" src="{{route('place.show',$place->slug)}}" style="width: 100%;height: 80vh" frameborder="0"></iframe>
                            </div>
                            <div class="col-8">
                                <form class="card mb-4" method="post" action="{{route('business.menu-design.update', $menuDesign->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('business.theme.parts.menu')
                                        @include('business.theme.parts.category')
                                        @include('business.theme.parts.product')
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <div class="navigationArea d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script>

        var iframeDocument, iframe;
        $(function (){
            // iFrame'in ID'sini ya da başka bir seçiciyi burada kullanarak hedefle
           iframe = document.getElementById('cardFrame');

            // iFrame içindeki belgeye eriş
            iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
        });
        $(document).on('change', '[name="top_menu_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.header').css('background-color', selectedColor);
        });
        $(document).on('change', '[name="bottom_menu_bg_close"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.footer .menu').css('background-color', selectedColor);
        });
        $(document).on('change', '[name="bottom_menu_font"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.footer .menu ul li a i').css('color', selectedColor);
        });
        $(document).on('change', '[name="bottom_menu_font_close"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.footer .menu ul li a i').css('color', selectedColor);
        });
        $(document).on('change', '[name="bottom_menu_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.footer .show-menu').css('background-color', selectedColor);
        });
        $(document).on('change', '[name="bottom_menu_font"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.footer .menu ul').css('color', selectedColor);
            $(iframeDocument).find('.footer .show-menu li a span').css('color', selectedColor);
        });
        $(document).on('change', '[name="category_button_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.categories_page_categories-2 .content .accordion .accordion-item .accordion-header .accordion-button').css('background-color', selectedColor);
        });
        $(document).on('change', '[name="category_button_font"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.categories_page_categories-2 .content .accordion .accordion-item .accordion-header .accordion-button .column span').css('color', selectedColor);
        });
        $(document).on('change', '[name="category_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.categories_page_categories-2 .content .accordion .accordion-item .accordion-body').css('background-color', selectedColor);
        });
        $(document).on('change', '[name="product_card_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.cardContent').css('background-color', selectedColor);
        });
        $(document).on('change', '[name="product_card_font"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.categories_page_categories-2 .content .accordion .accordion-item .accordion-body .content .title').css('color', selectedColor);
            $(iframeDocument).find('.categories_page_categories-2 .content .accordion .accordion-item .accordion-body .content .description').css('color', selectedColor);

        });
        $(document).on('change', '[name="product_card_time_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.calorieAre').css('background-color', selectedColor);

        });
        $(document).on('change', '[name="product_card_time_font"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.calorieAre').css('color', selectedColor);

        });
        $(document).on('change', '[name="product_card_add_button_bg"]', function () {
            let selectedColor = $(this).val();
            $(iframeDocument).find('.addToCardButton').css('color', selectedColor);

        });
    </script>
@endsection
