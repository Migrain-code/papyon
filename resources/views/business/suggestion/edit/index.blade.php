@extends('business.layouts.master')
@section('title', 'Yorum Düzenle')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/rateyo/rateyo.css" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <form method="post" id="contractForm" action="{{route('business.suggestion.update', $suggestion->id)}}" class="card-body order-0 order-md-1">
                        @csrf
                        @method('PUT')
                        <div class="card-title">
                            <h4 >Yorum Detayı</h4>
                        </div>
                        <div class="row">
                            <input type="hidden" name="editorContent" id="editorContent">
                            <div class="row mt-2">
                                <!-- Read Only-->
                                @foreach($suggestion->rating as $key => $rating)
                                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                                        <div class="card">
                                            <h5 class="card-header">{{$key}}</h5>
                                            <div class="card-body">
                                                <div class="read-only-ratings" data-rateyo-rating="{{$rating}}" data-rateyo-read-only="true"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /Read Only-->
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label" for="full-editor">Açıklama</label>
                                <textarea class="form-control" rows="5">{!! $suggestion->comment !!}</textarea>
                            </div>
                        </div>


                    </form>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
@endsection
@section('scripts')
    <!-- Vendors JS -->
    <script src="/business/assets/vendor/libs/rateyo/rateyo.js"></script>

    <!-- Page JS -->
    <script src="/business/assets/js/extended-ui-star-ratings.js"></script>
@endsection
