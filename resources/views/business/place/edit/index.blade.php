@extends('business.layouts.master')
@section('title', 'Mekan Bilgileri')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/pickr/pickr-themes.css" />

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
                                <a href="{{route('business.place.index')}}" class="btn btn-primary">Mekanlarım</a>
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
                    <form class="card-body" method="post" action="{{route('business.place.update', $place->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('business.place.edit.steps.step-1')
                        @include('business.place.edit.steps.step-2')
                        @include('business.place.edit.steps.step-3')
                        @include('business.place.edit.steps.step-4')
                        @include('business.place.edit.steps.step-5')
                        @include('business.place.edit.steps.step-6')

                        @include('business.place.edit.steps.step-7')

                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- View sales -->
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.registerArea .switch-input').on('change', function() {
                // Get the parent registerArea of the clicked switch
                var registerArea = $(this).closest('.registerArea');

                // Find the callArea within this registerArea
                var callArea = registerArea.find('.callArea');
                var callArea2 = registerArea.find('.callArea2');
                // Toggle visibility based on the checkbox state
                if ($(this).is(':checked')) {
                    callArea.show();

                } else {
                    callArea.hide();
                    if(callArea2){
                        callArea2.hide();
                    }
                }
            });
            $('.form-check-input').on('change', function() {
                // Get the parent registerArea of the clicked switch
                var registerArea = $(this).closest('.registerArea');

                // Find the callArea within this registerArea
                var callArea2 = registerArea.find('.callArea2');

                // Toggle visibility based on the checkbox state
                if ($(this).data('disable')) {
                    callArea2.hide();
                } else {
                    callArea2.show();
                }
            });
        });
        function toggleCallArea(checkbox, areaId) {
            //var callArea = document.getElementById(areaId);
            if (checkbox.checked) {
                // alert('Bu işlem için lütfen telefon numarası alanını doldurunuz');
            }
        }
        $('[name="place_name"]').on('keyup', function (){
            $.ajax({
                url: '/api/check-slug',
                type: "GET",
                data: {
                    'name' : $(this).val(),
                },
                dataType: "JSON",
                success: function (res) {
                    var placeLink = $('#placeLink');
                    if(res.status === "error"){
                        placeLink.css('border-bottom', '1px solid red');
                        Swal.fire({
                            text: res.message,
                            icon: res.status,
                            buttonsStyling: false,
                            confirmButtonText: "Tamam, devam et!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    } else{
                        placeLink.css('border-bottom', '1px solid green');
                        placeLink.val(res.link);
                    }


                }
            });
        });
    </script>
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
    <script>
        var defaultLatitude = '{{$place->latitude}}';
        var defaultLongitude = '{{$place->longitude}}';

    </script>
    <script src="/business/assets/js/project/place/map.js"></script>
    <script>
        document.getElementById('logoInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logoImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
