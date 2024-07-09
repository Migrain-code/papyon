@extends('business.layouts.master')
@section('title', 'Abonelik')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <!-- Pricing Plans -->
            <div class="pb-sm-5 pb-2 rounded-top">
                <div class="container py-5">
                    <h2 class="text-center mb-2 mt-0 mt-md-4">Abonelik Paketleri</h2>
                    <p class="text-center">
                        "İşletmeniz için ihtiyaçlarınıza en uygun abonelik paketini seçerek işlerinizi kolaylaştırın ve verimliliğinizi artırın."
                    </p>
                    <div
                        class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
                        <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
                            <span class="switch-label">Aylık</span>
                            <input type="checkbox" class="switch-input price-duration-toggler" checked />
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Yıllık</span>
                        </label>
                        <div class="mt-n5 ms-n5 d-none d-sm-block">
                            <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>
                            <span class="badge badge-sm bg-label-primary">Yıllık Üyelikde <b>10%</b> İndirim</span>
                        </div>
                    </div>

                    <div class="row mx-0 gy-3 px-lg-5">
                        @foreach($packages as $package)
                            @include('business.subscription.parts.price-column')
                        @endforeach


                    </div>
                </div>
            </div>
            <!--/ Pricing Plans -->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/business/assets/js/pages-pricing.js"></script>

@endsection
