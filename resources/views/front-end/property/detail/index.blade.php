@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')

    <section class="blog_detail_page my-4">
        <div class="container">
            <div class="topest">
                <div class="left">
                    <div class="top">

                        @if(count($heads) > 0)
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            {{ __(' İçeriği Göster') }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="image_bottom">
                                                @foreach($heads as $head)
                                                    <a href="#head-{{$loop->index}}">{{strip_tags($head)}}</a>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="bottom">
                        {!! $feature->description !!}
                    </div>
                </div>
                <div class="right">
                    <div class="bottom">
                        <h4>{{ __('Diğer Özellikler') }}</h4>
                        <div class="blogs">
                            @foreach($otherFeatures as $row)
                                <div class="blogs_card">
                                    <a href="{{route('property.detail', $row->slug)}}">
                                        <div class="blogs_card_left">
                                            <img src="{{ storage($row->image) }}" style="border-radius: 10px" alt="">
                                        </div>
                                    </a>
                                    <a href="{{route('property.detail', $row->slug)}}">
                                        <div class="blogs_card_right">
                                            <h5>{{$row->title}}</h5>
                                            <p>{{\Illuminate\Support\Str::limit(strip_tags($row->description),60)}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const hElements = document.querySelectorAll('h1, h2, h3, h4, h5');

            for (let i = 0; i < hElements.length; i++) {
                hElements[i].setAttribute('id', `head-${i}`);
            }
        });
    </script>
@endsection
