@extends('business.layouts.master')
@section('title', 'Menü Detayı')
@section('styles')

@endsection

@section('content')
    @php
        $themeId = 4;
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Menüler /</span> Menü Detayı / Görünütlenen Menü ({{$menu->name}})</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Menü Düzenleme Sihirbazı! 🎉</h5>
                                <p class="mb-2">Şimdi Menü Bilgilerinizi Güncelleyin</p>
                                <h4 class="text-primary mb-1"></h4>
                                <a href="{{route('business.menu.index')}}" class="btn btn-primary">Menülerim</a>
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
                        <ul class="nav nav-pills flex-column flex-md-row mb-4 mt-4 ms-2">
                            <li class="nav-item">
                                <a class="nav-link active" href="javascript:void(0);">
                                    <i class="ti ti-user-check ti-xs me-1"></i>
                                    Menü İçeriği
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-security.html">
                                    <i class="ti ti-switch-2 ti-xs me-1"></i>
                                    Mevcut Durumu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-billing.html">
                                    <i class="ti ti-currency-dollar ti-xs me-1"></i>
                                    Pop-up Banner
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-notifications.html">
                                    <i class="ti ti-lock ti-xs me-1"></i>
                                    Şifre Koruma
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-connections.html">
                                    <i class="ti ti-link ti-xs me-1"></i>
                                    Raporlar
                                </a>
                            </li>
                        </ul>
                        <!--/ User Pills -->
                        @include('business.menu.edit.tabs.menu-content')
                    </div>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>
    </div>
    @include('business.menu.modals.select-product-modal')
    @include('business.menu.modals.add-menu-category')
    @include('business.menu.modals.add-menu-product')
@endsection
@section('scripts')

    <script src="/business/assets/vendor/libs/sortablejs/sortable.js"></script>
    <script>
        var catgoryUpdateOrderUrl= '{{ route('business.category.updateOrder') }}';
        var productUpdateOrderUrl = '{{ route('business.product.updateOrder') }}'
    </script>
    <!-- Page JS -->
    <script src="/business/assets/js/project/product/listing.js"></script>

@endsection
