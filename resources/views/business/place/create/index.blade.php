@extends('business.layouts.master')
@section('title', 'Mekan Ekle')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/pickr/pickr-themes.css" />
    <style>
        #searchInput{
            position: absolute;
            left: 177px;
            top: 8px !important;
            width: 67%;
            height: 40px;
            border-radius: 15px;
            padding: 5px;
            border: 1px solid #2f3349;
            outline: 0px;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Mekan Oluşturma Sihirbazı! 🎉</h5>
                                <p class="mb-2">Şimdi yeni mekanınızı ekleyin</p>
                                <h4 class="text-primary mb-1"></h4>
                                <a href="javascript:;" class="btn btn-primary">Mekanlarım</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="/business/assets/img/illustrations/card-advance-sale.png"
                                    height="140"
                                    alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <h5 class="card-header" data-i18n="Mekan Oluşturma Sihirbazı">Mekan Oluşturma Sihirbazı</h5>
                    <form class="card-body">
                        @include('business.place.create.steps.step-1')
                        @include('business.place.create.steps.step-2')
                        @include('business.place.create.steps.step-3')
                        @include('business.place.create.steps.step-4')
                        @include('business.place.create.steps.step-5')
                        @include('business.place.create.steps.step-6')
                        @include('business.place.create.steps.step-7')

                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- View sales -->
        </div>
    </div>

@endsection
@section('scripts')
    <!-- Vendors JS -->
    <script src="/business/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/business/assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <script src="/business/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/business/assets/vendor/libs/select2/select2.js"></script>

    <!-- Page JS -->
    <script src="/business/assets/js/form-layouts.js"></script>
    <script src="/business/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/business/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/business/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="/business/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="/business/assets/vendor/libs/pickr/pickr.js"></script>
    <script src="/business/assets/js/project/place/add.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="/business/assets/js/project/place/map.js"></script>
@endsection
