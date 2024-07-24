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
                    <form method="post" id="contractForm" action="{{route('business.suggestion-question.update', $suggestionQuestion->id)}}" class="card-body order-0 order-md-1">
                        @csrf
                        @method('PUT')
                        <div class="card-title">
                            <h4 >Soru Düzenle</h4>
                        </div>
                        <div class="col-12 mt-2">
                            <label class="form-label" for="addProductQuantity">Soru</label>
                            <input
                                type="text"
                                id="addProductQuantity"
                                name="title"
                                class="form-control"
                                value="{{$suggestionQuestion->question}}"
                            />
                        </div>
                        <div class="col-12 text-start mt-3">
                            <button type="submit" class="btn btn-primary w-100" style="max-width: 400px">Kaydet</button>
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
