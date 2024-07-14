@extends('qr_menu.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="waiter">
            <div class="content">
                <svg xmlns="http://www.w3.org/2000/svg" width="149.567" height="149.581" viewBox="0 0 149.567 149.581">
                    <g id="IVGST5.tif" transform="translate(-12482.013 -8218.461)">
                        <g id="Group_2071" data-name="Group 2071">
                            <g id="Group_2069" data-name="Group 2069">
                                <path id="Path_2227" data-name="Path 2227"
                                      d="M12631.58,8293.183a74.784,74.784,0,1,1-74.806-74.722A74.875,74.875,0,0,1,12631.58,8293.183Zm-10.28.03a64.5,64.5,0,1,0-64.513,64.548A64.67,64.67,0,0,0,12621.3,8293.213Z"
                                      fill="#f3f3f1" />
                            </g>
                            <g id="Group_2070" data-name="Group 2070">
                                <path id="Path_2228" data-name="Path 2228"
                                      d="M12549.655,8320.689l-24.44-20.789,6.485-7.819,17.459,14.615c13.484-13.65,26.9-27.233,40.411-40.9,2.377,2.509,4.658,4.918,7.045,7.436Z"
                                      fill="#f3f3f1" />
                            </g>
                        </g>
                    </g>
                </svg>
                @if(session('searchType'))
                    <h2 style="text-align: center;">Sipariş bilgileriniz</h2>
                    <h2></h2>
                    <a href="{{route('menu.index')}}">
                        <button class="btn btn-secondary returnMenu" type="button">
                            {{ __('Menüye Dön') }}
                        </button>
                    </a>
                @else
                    <h2 style="text-align: center;">Siparişiniz Oluşturuldu</h2>
                    <h2>{{ __('Teşekkürler...') }}</h2>
                    <a href="">
                        <button class="btn btn-secondary returnMenu" type="button">
                            {{ __('Menüye Dön') }}
                        </button>
                    </a>
                @endif
            </div>


        <div class="summary">

            <div class="items">
                @foreach($order->cart as $cart)
                    <div class="item">
                        <div class="title">{{$cart->name}} <br>
                            <b>{{$cart->total}} ₺</b>
                        </div>
                        <div class="quantity">
                            <b>{{$cart->quantity}} Adet</b>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="subtotal">
                <div class="title">
                    <p>{{ __('Ara Toplam') }}</p>
                    <p class="subtotal-amount">{{ formatPrice($order->total) }}</p>
                </div>
                <div class="middle">
                    <p>
                        <span>{{ __('İndirim') }}</span>
                        <span class="discount-amount">{{formatPrice($order->discount) }} </span>
                    </p>
                </div>
                <div class="dere">
                    <p>{{ __('Kurye') }}</p>
                    <p class="delivery-amount">{{formatPrice(0)}}</p>
                </div>
                <div class="bottomsaws">
                    <p>{{ __('Toplam Tutar') }}</p>
                    <p class="total-amount">{{ formatPrice($order->total) }}</p>
                </div>
            </div>
        </div>

        {{--
            <div class="bottom">
            <span>Powered By</span>
            <h5>Papyoon</h5>
        </div>
        --}}
    </section>
@endsection

@section('scripts')

@endsection
