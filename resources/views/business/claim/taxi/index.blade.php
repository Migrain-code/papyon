@extends('business.layouts.master')
@section('title', 'Talepler')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />
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
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Talepler /</span> Taksi Talepleri</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Talepler! 🎉</h5>
                                <p class="mb-2">İletilen Tüm Taksi taleplerini listeleyin</p>
                                <h4 class="text-primary mb-1"></h4>
                                <a href="{{route('business.claim.taxi')}}" class="btn btn-primary">Taksi Talepleri</a>
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
                    <!-- User Content -->
                    <div class="card-body order-0 order-md-1">
                        <!-- User Pills -->
                        @include('business.claim.nav')

                        <!--/ User Pills -->
                        <!-- Fixed Header -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-title">
                                    <h4 >Taksi Talepleri</h4>
                                </div>
                                <x-table-all-delete-button title="Taksi Taleplerini" model="App\Models\Claim"></x-table-all-delete-button>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-products table" id="datatable">
                                    <thead class="border-top">
                                        <tr>
                                            <th>
                                                <div>
                                                    <input class="form-check-input" id="serviceAllSelect" type="checkbox">
                                                </div>
                                            </th>
                                            <th>Ad Soyad</th>
                                            <th>Durum</th>
                                            <th>Masa</th>
                                            <th>Tarih</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!--/ Fixed Header -->
                    </div>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>
        <input type="hidden" id="typeId" name="typeId" value="1">
    </div>
    @include('business.claim.modals.order-detail')
@endsection
@section('scripts')

    <script>
        var DATA_URL = "{{route('business.claim.datatable')}}?typeId=0";
        var DATA_COLUMNS = [
            {data: 'id'},
            {data: 'name'},
            {data: 'status'},
            {data: 'table_id'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        var updateUrl = "claim";
    </script>
    <script src="/business/assets/js/app-ecommerce-product-list.js"></script>
    <script src="/business/assets/js/project/claim/update-status.js"></script>
@endsection
