@if (isset($table))
    {{-- Masa Sipariş İse--}}
    @include('qr_menu.checkout.parts.order-types.table')
@else
    {{-- Paket Sipariş--}}
    @include('qr_menu.checkout.parts.order-types.packet')
@endif
