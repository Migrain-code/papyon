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
            <div class="d-flex align-content-center flex-wrap gap-2">
                <button class="btn btn-label-danger delete-order">Siparişi Sil</button>
            </div>
        </div>

        <!-- Order Details Table -->

        <div class="row">
            @include('business.order.detail.cards.customer-info')
            @include('business.order.detail.cards.address')
            @include('business.order.detail.cards.other')
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
    <script src="/business/assets/js/app-ecommerce-order-details.js"></script>
    <script src="/business/assets/js/modal-edit-user.js"></script>
    <script src="/business/assets/js/modal-add-new-address.js"></script>
    <script src="/business/assets/js/project/order/modal-edit-product.js"></script>

@endsection
