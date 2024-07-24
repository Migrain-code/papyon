@extends('business.layouts.master')
@section('title', 'Talepler')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css"/>
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css"/>

    <style>
        table.dataTable.dtr-column > tbody > tr > td.control:before, table.dataTable.dtr-column > tbody > tr > td.control:before, table.dataTable.dtr-column > tbody > tr > th.control:before, table.dataTable.dtr-column > tbody > tr > th.control:before {
            position: absolute;
            line-height: 0.9em;
            font-weight: 500;
            height: 1em;
            width: 1em;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            outline: 0px;
            box-sizing: content-box;
            text-align: center;
            font-family: "Courier New", Courier, monospace;
            content: "+";
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: none;
        }
        .form-check-input:checked, .form-check-input[type=checkbox]:indeterminate {
            background-color: #4caf50 !important;
            border-color: #4caf50 !important;
        }
        .custom-option-icon.checked i, .custom-option-icon.checked svg {
            color: #4caf50 !important;
        }
        .custom-option.checked {
            border: 1px solid #4caf50 !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2"><span class="text-muted fw-light">Siparişler /</span> Sipariş Detayı</h4>

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
                <h5 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
                    Sipariş #{{$order->id}}

                    {!! $order->paymentStatus('icon') !!}
                </h5>
                <p class="text-body">{{$order->created_at->format('d.m.Y H:i')}}</p>
            </div>

        </div>

        <!-- Order Details Table -->

        <div class="row">
            <div class="col-12">
                <div class="card w-100 mb-3">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">

                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#" class="text-hover-primary fs-2 fw-bold me-1">{{$order->name}}</a>

                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="tel:{{$order->phone}}" class="d-flex align-items-center text-dark text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <!--end::Svg Icon-->{{formatPhone($order->phone)}}
                                            </a>
                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                @if($order->order_type == 1)
                                                        {{$order->table->name}}
                                                @elseif($order->order_type == 2)
                                                    Gel Al Sipariş
                                                @else
                                                   {{$order->address}}
                                                @endif
                                            </a>

                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Actions-->
                                    <div class="d-flex my-4">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-light me-2" data-bs-toggle="modal" data-bs-target="#addNewAddress" id="kt_user_follow_button">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                            <span class="svg-icon svg-icon-3 d-none">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                                    <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--begin::Indicator label-->
                                            <span class="indicator-label">Adres Düzenle</span>
                                            <!--end::Indicator label-->
                                        </a>

                                        <a href="javascript:void(0)"  class="btn btn-sm btn-success me-2" data-bs-toggle="modal" data-bs-target="#editUser">
                                            Müşteri Düzenle
                                        </a>

                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->

                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->

                    </div>
                </div>
            </div>

            @include('business.order.detail.cards.products')
        </div>

        @include('business.order.detail.modals.edit-address')
        @include('business.order.detail.modals.edit-user')
        @include('business.order.detail.modals.edit-product')
        @include('business.order.detail.modals.add-product')
        @include('business.order.detail.modals.edit-discount')

    </div>
@endsection
@section('scripts')

    <script src="/business/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="/business/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="/business/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="/business/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/business/assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <script src="/business/assets/js/modal-edit-user.js"></script>
    <script src="/business/assets/js/modal-add-new-address.js"></script>
    <script src="/business/assets/js/project/order/modal-edit-product.js"></script>
    <script>
        var orderId = '{{$order->id}}';
        $(document).on('click', '.product-delete-btn', function (){
            var productId = $(this).data('product');
            var button = $(this);
            Swal.fire({
                title: 'Ürünü Silmek İstediğinize Emin misiniz?',
                text: "Ürün Siparişten Tamamen Silinecektir ve Bu işlem geri alınamayacaktır!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, Ürünü sil!',
                cancelButtonText: "İptal Et",
                customClass: {
                    confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
                    cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                       'url' : '/business/order/'+orderId+'/product/'+productId+"/delete",
                       'type': "GET",
                       'dataType': "JSON",
                       success:function (res){
                           Swal.fire({
                               icon: res.status,
                               title: res.message,
                               customClass: {
                                   confirmButton: 'btn btn-success waves-effect waves-light'
                               },
                               confirmButtonText: "Tamam"
                           });
                           setTimeout(function (){
                                location.reload();
                           }, 500);

                       },
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'İptal Edildi',
                        text: 'Ürün silme işlemi iptal edildi :)',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success waves-effect waves-light',
                        },
                        confirmButtonText: "Tamam"
                    });
                }
            });
        });

    </script>
@endsection
