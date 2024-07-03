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
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Talepler /</span>Paket Sipariş Talepleri</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Talepler! 🎉</h5>
                                <p class="mb-2">İletilen Tüm paket sipariş taleplerini listeleyin</p>
                                <h4 class="text-primary mb-1"></h4>
                                <a href="{{route('business.claim.index')}}" class="btn btn-primary">Siparişler</a>
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
                            <h5 class="card-header">Paket Siparişleri</h5>
                            <div class="card-datatable table-responsive">
                                <table class="dt-fixedheader table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Sipariş Kodu</th>
                                            <th>Ad Soyad</th>
                                            <th>Ödeme Türü</th>
                                            <th>Tarih</th>
                                            <th>Toplam Tutar</th>
                                            <th>Durum</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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

    </div>
    @include('business.claim.modals.order-detail')
@endsection
@section('scripts')
    <script>
        var tableDatas = [];
        @foreach($orders as $order)
            $newData = {
                "id": {{$order->id}},
                "avatar": "",
                "full_name": "{{$order->name}}",
                "post": "{{$order->phone}}",
                "email": "{{$order->payment_type_id}}",
                "city": "asdad",
                "start_date": "{{$order->created_at->format('d.m.Y H:i')}}",
                "salary": "{{formatPrice($order->total)}}",
                "age": "61",
                "experience": "1 Year",
                "status": {{$order->status}}
            }
            tableDatas.push($newData);
        @endforeach
    </script>
    <script src="/business/assets/js/tables-datatables-extensions.js"></script>

@endsection
