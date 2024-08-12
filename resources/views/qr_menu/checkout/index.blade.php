@extends('qr_menu.layouts.master')
@section('title', 'Sepetim')
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
            <div class="link emptyCartButton d-flex justify-content-center align-items-center">
                <i class="ti ti-trash"></i>
                <b>{{ __(' Listemi Sil') }}</b>
            </div>
        </div>
        @include('qr_menu.checkout.parts.summary')
        @if($otherProducts->count() > 0)
            @include('qr_menu.checkout.parts.other-product')
        @endif
        @include('qr_menu.checkout.parts.payment')
    </section>

@endsection

@section('scripts')
    <script>
        $(document).on('change', '[name="order_type_id"]', function (){
            var discountTotal = $(this).data('discount');
            fetchCart(discountTotal);
        });
        $(document).on('click', '.orderCreateButton', function (){
            var orderType = $(this).data('order-type');

            $("[name='order_type']").val(orderType);
            $('#packetOrderForm').submit();
        });
    </script>
@endsection
