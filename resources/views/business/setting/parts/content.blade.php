<!-- Customer Content -->
<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
     @include('business.setting.parts.nav')

    <div class="row text-nowrap">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <div class="avatar">
                            <div class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-currency-dollar ti-md"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-info">
                        <h4 class="card-title mb-3">Siparişlerde</h4>
                        <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-primary mb-0">{{formatPrice($orderTotal)}}</h4>
                            <p class="mb-0">Kazanç Sağlandı</p>
                        </div>
                        <p class="text-muted mb-0 text-truncate">Tüm işletmelerinizden elde edilen kazanç</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <div class="avatar">
                            <div class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-gift ti-md"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-info">
                        <h4 class="card-title mb-3">Premium Paket</h4>
                        <span class="badge bg-label-success mb-2">Paketiniz Aktif</span>
                        <p class="text-muted mb-0">365 Günlük Abonelik</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <div class="avatar">
                            <div class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-star ti-md"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-info">
                        <h4 class="card-title mb-3">Kampanyalar</h4>
                        <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-warning mb-0">{{$advertCount}}</h4>
                            <p class="mb-0">Kampanya Yaptınız</p>
                        </div>
                        <p class="text-muted mb-0 text-truncate">Tüm Şubelerde Yaptığınız Kampanyalar</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <div class="avatar">
                            <div class="avatar-initial rounded bg-label-info">
                                <i class="ti ti-discount ti-md"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-info">
                        <h4 class="card-title mb-3">Sipariş Toplamı</h4>
                        <div class="d-flex align-items-baseline mb-1 gap-1">
                            <h4 class="text-info mb-0">{{$orderCount}}</h4>
                            <p class="mb-0">Sipariş Aldınız</p>
                        </div>

                        <p class="text-muted mb-0 text-truncate">Tüm işletmelerinizdeki sipariş toplamı</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Customer Content -->
