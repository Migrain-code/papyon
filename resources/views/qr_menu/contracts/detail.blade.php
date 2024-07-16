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
            <div class="title">{{ __($contract->title) }}</div>

        </div>
        <div class="summary">

            <div class="work-items">
                {!! $contract->description !!}

            </div>

        </div>
    </section>


@endsection

@section('scripts')

@endsection
