@extends('qr_menu.layouts.master')
@section('title', 'Duyurular')
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
            <div class="title">{{ __('Duyurular') }}</div>

        </div>
        <div class="summary">

            <div class="work-items">
                @foreach($announcements as $announcement)
                    <div class="item">
                        <div class="title">{{$announcement->title}} <br>
                            <b style="font-family: revert;">{{$announcement->description}}</b>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>


@endsection

@section('scripts')

@endsection
