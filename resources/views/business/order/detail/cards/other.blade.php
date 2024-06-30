<div class="col-12 col-lg-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h6 class="card-title m-0">Diğer Bilgiler</h6>

        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h6>Sipariş Türü</h6>
                <span class=""> {{$order->orderType("name")}} <i class="{{$order->orderType("icon")}}"></i></span>
            </div>
            <hr class="p-0 m-0 mb-3"/>
            <div class="d-flex justify-content-between">
                <h6>Ödeme Türü</h6>
                <span class=""> {{$order->type("name")}}</span>
            </div>

        </div>
    </div>
</div>
