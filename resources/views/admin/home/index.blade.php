@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('styles')
@endsection
@section('breadcrumbs')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="ti ti-shopping-bag ti-md"></i>
                                </span>
                            </div>
                            <h4 class="ms-1 mb-0">5{{-- 5 --}}</h4>
                        </div>
                        <p class="mb-1">Bekleyen Sipariş</p>
                        <p class="mb-0">
                            <small class="text-muted">Bugün bekleyen sipariş sayısı</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="ti ti-user-check ti-md"></i>
                                </span>
                            </div>
                            <h4 class="ms-1 mb-0">3{{-- --}}</h4>
                        </div>
                        <p class="mb-1">Ziyaretçi Sayısı</p>
                        <p class="mb-0">
                            <small class="text-muted">İşletmenizi görüntüleyen kullanıcı sayısı</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-git-fork ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">6{{----}}</h4>
                        </div>
                        <p class="mb-1">Menü</p>
                        <p class="mb-0">
                            <small class="text-muted">Hesabınıza Kayıtlı menü sayısı</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-info"><i class="ti ti-message ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">4{{-- --}}</h4>
                        </div>
                        <p class="mb-1">Görüş ve Öneriler</p>
                        <p class="mb-0">
                            <small class="text-muted">İşletmenize yapılan yorumlar</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Bar Charts -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header header-elements">
                            <h5 class="card-title mb-0">Ziyaretçi Grafiği</h5>

                        </div>
                        <div class="card-body">
                            <canvas id="barChart" class="chartjs" data-height="400"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /Bar Charts -->
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {{--
        @php
        use Illuminate\Support\Carbon;
        $year = now()->year;
        $months = [];
        for ($i = 1; $i <= 12; $i++){
            $month = $year."-".$i. "-01";
            $months[] = Carbon::parse($month)->translatedFormat('F');
        }
    @endphp
    <script>
        var months = @json($months);
        var monthlyVisitors = @json($visitors);
    </script>
    --}}
    <script src="/business/assets/vendor/libs/chartjs/chartjs.js"></script>
    <script src="/business/assets/js/charts-chartjs.js"></script>

@endsection
