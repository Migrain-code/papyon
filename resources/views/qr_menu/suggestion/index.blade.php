@extends('qr_menu.layouts.master')
@section('title', 'Görüş Ve Öneriler')
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
            <div class="title">{{ __('Görüş Ve Öneriler') }}</div>
        </div>
        <div class="summary">
            <div class="work-items">
                <form class="otherInfos" method="post" action="{{route('menu.suggestion.post', $place->slug)}}">
                    @csrf
                    <div class="pointArea">
                        @foreach($suggestions as $suggestion)
                            <label>{{ $suggestion->question }}</label>
                            <div class="star-rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating[{{ $suggestion->question }}]" id="rating{{ $suggestion->id }}-{{ $i }}" value="{{ $i }}">
                                    <label for="rating{{ $suggestion->id }}-{{ $i }}">&#9733;</label>
                                @endfor
                            </div>
                        @endforeach

                    </div>

                    <div class="title">{{ __('Görüşünüz ve Önerileriniz') }}</div>
                    <div class="formItem">
                        <textarea class="" name="order_note" placeholder="" id="" cols="30" rows="6"></textarea>
                    </div>
                    <div class="formItem">
                        <button class="confirmButton" type="submit">Gönder</button>
                    </div>
                </form>

            </div>
        </div>
    </section>


@endsection

@section('scripts')

@endsection
