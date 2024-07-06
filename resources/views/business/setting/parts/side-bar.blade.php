<!-- Customer-detail Sidebar -->
<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- Customer-detail Card -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="customer-avatar-section">
                <div class="d-flex align-items-center flex-column">
                    <img
                        class="img-fluid rounded my-3"
                        src="{{storage($user->image)}}"
                        height="110"
                        width="110"
                        alt="User avatar" />
                    <div class="customer-info text-center">
                        <h4 class="mb-1">{{$user->name}}</h4>
                        <small>Müşteri Numaranız #{{$user->id}}</small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around flex-wrap my-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar">
                        <div class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-shopping-cart ti-md"></i>
                        </div>
                    </div>
                    <div class="gap-0 d-flex flex-column">
                        <p class="mb-0 fw-medium">{{$orderCount}}</p>
                        <small>Sipariş</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar">
                        <div class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-currency ti-md"></i>
                        </div>
                    </div>
                    <div class="gap-0 d-flex flex-column">
                        <p class="mb-0 fw-medium">{{formatPrice($orderTotal)}}</p>
                        <small>Kazanç</small>
                    </div>
                </div>
            </div>

            <div class="info-container">
                <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">DETAILS</small>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <span class="fw-medium me-2">Adı Soyadı:</span>
                        <span>{{$user->name}}</span>
                    </li>
                    <li class="mb-3">
                        <span class="fw-medium me-2">E-posta:</span>
                        <span>{{$user->email}}</span>
                    </li>
                    <li class="mb-3">
                        <span class="fw-medium me-2">Durum:</span>
                        <span class="badge bg-label-success">Aktif</span>
                    </li>
                </ul>
                <div class="d-flex justify-content-center">
                    <a
                        href="javascript:;"
                        class="btn btn-primary me-3"
                        data-bs-target="#editUser"
                        data-bs-toggle="modal"
                    >Profili Düzenle</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Customer-detail Card -->
</div>
<!--/ Customer Sidebar -->
