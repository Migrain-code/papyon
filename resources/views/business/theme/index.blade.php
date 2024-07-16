@extends('business.layouts.master')
@section('title', 'Tema Ayarları')
@section('styles')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tema Ayarları/</span> Menü Düzeni</h4>

        <div class="app-academy">
            <div class="card p-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                    <div class="app-academy-md-25 card-body py-0">
                        <img
                            src="/business/assets/img/illustrations/bulb-light.png"
                            class="img-fluid app-academy-img-height scaleX-n1-rtl"
                            alt="Bulb in hand"
                            data-app-light-img="illustrations/bulb-light.png"
                            data-app-dark-img="illustrations/bulb-dark.png"
                            height="90"
                            style="height: 140px;"
                        />
                    </div>
                    <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                        <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                            QR Menünüzün Tasarımını Oluşturun
                            <span class="text-primary fw-medium text-nowrap">Menü Düzeni</span>.
                        </h3>
                        <p class="mb-3">
                            Burada eklediğiniz tüm menüleriniz için tüm düzenleme, yönetim, menü kopyalama ve kaldırma işlerinizi yapabilirsiniz.
                        </p>

                    </div>
                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                        <img
                            src="/business/assets/img/illustrations/pencil-rocket.png"
                            alt="pencil rocket"
                            height="188"
                            class="scaleX-n1-rtl"
                            style="height: 140px;"
                        />
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Menü Düzeni</h5>
                        <p class="text-muted mb-0">Tasarımınızın Menü Düzeni</p>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @include('business.theme.menu.nav')
                        <!--/ User Pills -->
                        @include('business.theme.tabs.menu-content')


                    </div>
                    <div class="navigationArea d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script src="/business/assets/vendor/libs/sortablejs/sortable.js"></script>
    <script>
        var order = [];
        new Sortable(document.getElementById('sortable-cards'), {
            handle: '.sortable-icon',
            animation: 150,
            onEnd: function (evt) {
                // Kategori sıralama verilerini gönder
                let order = [];
                document.querySelectorAll('#sortable-cards .accordion-item').forEach((item, index) => {

                    order.push({
                        id: item.dataset.id,
                        position: index + 1
                    });
                });

                // AJAX isteği ile sıralama verilerini gönderin
                $.ajax({
                    url: '{{route('business.menu-design.store')}}',
                    method: 'POST',
                    data: {
                        _token: csrf_token,
                        order: order
                    },
                    success: function (response) {
                        console.log('Kategori sıralama güncellendi:');
                    },
                    error: function (xhr) {
                        console.error('Kategori sıralama hatası:');
                    }
                });
            }
        });
    </script>
@endsection
