@extends('qr_menu.layouts.master')
@section('title', 'Sipariş Takibi')
@section('styles')
    <style>
        .waiter .content .formItem {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            width: 100%;
            margin-bottom: 10px;
        }
        .waiter .content .formItem input {
            width: 100%;
            background: white;
            padding: 10px;
            border: 1px solid #cfcfcf;
            border-radius: 7px;
            outline: 0px;
        }
        .waiter .content .returnMenu {
            background: #fff;
            color: #e0483d;
            border: none;
            margin-top: -10px;
        }
    </style>
@endsection
@section('content')
    <section class="waiter">
        <form class="content" method="post" action="{{route('order.search', $place->slug)}}">
            @csrf
            <div class="d-flex justify-content-center align-items-center gap-0">
                <b style="font-size: 21px">Sipariş Takibi</b>
            </div>

            <div class="d-flex justify-content-center align-items-center gap-2 mt-3 w-100">
                <div class="formItem">
                    <input type="text" value="" name="order_code" placeholder="Siparişi Kodunuz veya Doğrulama Kodunuz">
                </div>
                <button class="btn btn-secondary returnMenu" type="submit">
                    {{ __('Ara') }}
                </button>
            </div>

        </form>

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
