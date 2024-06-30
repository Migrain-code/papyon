<div class="col-12 col-lg-4">
    <div class="card mb-4" style="min-height: 182px;max-height: 182px">
        <div class="card-header d-flex justify-content-between">
            <h6 class="card-title m-0">Sipariş Adresi</h6>
            <h6 class="m-0">
                <a href=" javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNewAddress">Düzenle</a>
            </h6>
        </div>
        <div class="card-body">
            @if($order->order_type == 1)
                <div class="w-100 d-flex mb-2 align-items-center">
                    <img src="{{storage($order->table->qr_code)}}" class="" style="width: 100px;height: 100px">
                    <h5 class="ms-2">{{$order->table->name}}</h5>
                </div>
            @elseif($order->order_type == 2)
                <div class="w-100 d-flex mb-2 align-items-center">
                    <img src="/business/assets/img/project/take-away.png" class="" style="width: 100px;height: 100px">
                    <h5 class="ms-2">Gel Al Sipariş</h5>
                </div>
            @else
                <!-- Online Sipariş -->
                <p class="mb-0">{{$order->address}}</p>
            @endif

        </div>
    </div>
</div>
