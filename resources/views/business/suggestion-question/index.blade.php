@extends('business.layouts.master')
@section('title', 'Görüş Ve Öneri Soruları')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span>Görüş Ve Öneri Soruları</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Görüş Ve Öneri Soruları! 🎉</h5>
                                <p class="mb-2">Tüm Sözleşmelerinizin işlemlerini bu alanda yapabilirsiniz. <br>
                                    Kullanmayacağınız Sözleşmeleri Yayından Kaldırabilirsiniz
                                </p>
                                <h4 class="text-primary mb-1"></h4>
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
                        <ul class="nav nav-pills flex-column flex-md-row mb-4 mt-4 ms-2">
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('business.suggestion.index')) active @endif" href="{{route('business.suggestion.index')}}">
                                    <i class="ti ti-message ti-xs me-1"></i>
                                    Görüş ve Öneriler
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('business.suggestion-question.index')) active @endif" href="{{route('business.suggestion-question.index')}}">
                                    <i class="ti ti-bell-question"></i>
                                    Sorular
                                </a>
                            </li>
                        </ul>
                        <!-- Fixed Header -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-title">
                                    <h4 >Görüş Ve Öneri Soruları</h4>
                                </div>
                                <div class="d-flex gap-3">
                                    <x-table-all-delete-button title="Seçilen Soruları" model="App\Models\SuggestionQuestion"></x-table-all-delete-button>
                                    <button class="btn btn-primary" data-bs-target="#addAdvertModal" data-bs-toggle="modal">Soru Oluştur</button>
                                </div>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-products table" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>
                                           #
                                        </th>
                                        <th>Soru</th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
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
    @include('business.suggestion-question.modals.add-advert')
@endsection
@section('scripts')
    <script>
        var DATA_URL = "{{route('business.suggestion-question.datatable')}}";
        var DATA_COLUMNS = [
            {data: 'id'},
            {data: 'question'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        var updateUrl = "suggestion-question";
    </script>
    <script src="/business/assets/js/app-ecommerce-product-list.js"></script>
    <script src="/business/assets/js/project/claim/update-status.js"></script>
@endsection