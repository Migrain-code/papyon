@extends('qr_menu.layouts.master')
@section('title', 'Sözleşmeler')
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
            <div class="title">{{ __('Sözleşmeler') }}</div>

        </div>
        <div class="summary">

            <div class="work-items">
                @foreach($contracts as $contract)
                    <div class="item">
                        <a href="{{route('contract.detail', [$place->slug, $contract->slug])}}" class="title">{{$contract->title}}</a>
                        <a href="{{route('contract.detail', [$place->slug, $contract->slug])}}" class="quantity">
                            <b>İncele</b>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


@endsection

@section('scripts')

@endsection
