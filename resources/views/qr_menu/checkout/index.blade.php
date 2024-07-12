@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')
    <style>
        .checkout .summary .item .title b {
            color: #757575;
            font-size: 13px;
            font-family: monospace;
        }
    </style>
@endsection
@section('content')
    <section class="checkout">
        <div class="topest">
            <div class="title">{{ __('Sipariş Özeti') }}</div>
            <div class="link">
                <svg xmlns="http://www.w3.org/2000/svg" width="36.926" height="43.206" viewBox="0 0 36.926 43.206">
                    <g id="lootAB.tif" transform="translate(-10305.074 -7838.512)">
                        <g id="Group_2541" data-name="Group 2541">
                            <g id="Group_2539" data-name="Group 2539">
                                <path id="Path_2782" data-name="Path 2782"
                                      d="M10338.128,7864.116c-.182,3.644-.34,7.29-.552,10.933a6.915,6.915,0,0,1-5.957,6.162,65.14,65.14,0,0,1-13.745.258c-.923-.083-1.851-.16-2.761-.324a6.981,6.981,0,0,1-5.737-6.668c-.2-4.755-.459-9.507-.689-14.26-.11-2.278-.223-4.556-.315-6.835a1.719,1.719,0,0,1,1.76-1.937,1.737,1.737,0,0,1,1.907,1.845q.39,7.972.792,15.944c.091,1.807.14,3.617.294,5.419a3.062,3.062,0,0,0,2.863,2.927,58.526,58.526,0,0,0,12.469.273c.8-.067,1.607-.134,2.405-.235a3.335,3.335,0,0,0,3.14-3.356c.172-3.219.317-6.439.473-9.659q.28-5.741.56-11.48a1.7,1.7,0,0,1,1.921-1.677,1.732,1.732,0,0,1,1.7,1.872c-.081,1.93-.185,3.858-.279,5.786q-.125,2.506-.253,5.011Z"
                                      fill="#e0483d"/>
                            </g>
                            <g id="Group_2540" data-name="Group 2540">
                                <path id="Path_2783" data-name="Path 2783"
                                      d="M10323.524,7849.7q-8.209,0-16.418,0a1.783,1.783,0,0,1-1.9-1.117,1.832,1.832,0,0,1,1.78-2.571c2.659.015,5.32-.007,7.98.015a.705.705,0,0,0,.78-.537,35.282,35.282,0,0,1,1.468-3.327c1.479-2.8,3.921-3.815,6.982-3.634a6.652,6.652,0,0,1,5.9,4.078c.464.954.866,1.941,1.239,2.934a.634.634,0,0,0,.723.483q4.014-.023,8.026,0a1.806,1.806,0,0,1,1.793,2.486,1.6,1.6,0,0,1-1.346,1.145,4.883,4.883,0,0,1-.727.048Q10331.666,7849.705,10323.524,7849.7Zm4.125-3.7c-.277-.641-.5-1.219-.773-1.772a3.452,3.452,0,0,0-3.236-2.038,4.123,4.123,0,0,0-4.105,3.81Z"
                                      fill="#e0483d"/>
                            </g>
                        </g>
                    </g>
                </svg>
                {{ __(' Listemi Sil') }}
            </div>
        </div>
        @include('qr_menu.checkout.parts.summary')
        <div style="color: #e0483d" class="title">{{ __('Yanında İyi Gider') }}</div>
        @include('qr_menu.checkout.parts.other-product')

    </section>
    <audio id="success-sound" src="/qr_menu/assets/audio/pebble.mp3" preload="auto"></audio>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            fetchCart();
            $(document).on('click', '.addToCartButton', function() {

                var product_id = $(this).data('product');
                var button = $(this);
                $.ajax({
                    url: '/qr-menu/add-to-cart',
                    method: 'POST',
                    data: {
                        _token: csrf_token,
                        product_id: product_id,
                    },
                    success: function(response) {
                        /*Toast.fire({
                            icon: response.status,
                            title: response.message,
                        });*/
                        if(response.status == "success"){
                            var audio = document.getElementById('success-sound');
                            // Sesi çal
                            audio.play();
                            fetchCart();
                        }
                    },
                    error: function(xhr) {
                        console.error('Ekleme Hata Oluştu:', xhr);
                    }
                });
            });
        });
        function fetchCart(){
            $.ajax({
                url: '/qr-menu/get-cart', // Bu URL'yi kendi API endpoint'inizle değiştirin
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var totalProductCount = 0;
                    var itemsHtml = '';
                    data.products.forEach(function (item) {
                        totalProductCount+=item.qty;
                        itemsHtml += `
                                <div class="item">
                                    <div class="title">${item.name} <br>
                                        <b>${item.totalPrice}</b>
                                    </div>
                                    <div class="quantity">
                                        <span>-</span>
                                        <b>${item.qty}</b>
                                        <span class="addToCartButton" data-product="${item.id}">+</span>
                                    </div>
                                </div>`;
                    });
                    $('.cart').text(totalProductCount);
                    $('.summary .items').html(itemsHtml);

                    // Ara toplam, indirim, kurye ve toplam tutar bilgilerini yerleştir
                    $('.subtotal-amount').text(`${data.generalTotal}`);
                    $('.discount-amount').text(`${data.discount}`);
                    $('.delivery-amount').text(`${data.delivery}`);
                    $('.total-amount').text(`${data.total}`);
                },
                error: function (error) {
                    console.error('Veri çekme hatası:', error);
                }
            });
        }


    </script>

@endsection
