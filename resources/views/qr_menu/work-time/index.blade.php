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
            <div class="title">{{ __('Çalışma Saatleri') }}</div>

        </div>
        <div class="summary">

            <div class="work-items">
                @foreach($workTimes as $workTime)
                    <div class="item">
                        <div class="title">{{$workTime->day->name}} <br>
                            <b>{{$workTime->start_time. " - ".$workTime->end_time}}</b>
                        </div>
                        <div class="quantity">
                            <b>@if($workTime->status == 0) Kapalı @else Açık @endif</b>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


@endsection

@section('scripts')

@endsection
