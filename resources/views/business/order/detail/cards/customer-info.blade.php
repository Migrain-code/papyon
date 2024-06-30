<div class="col-12 col-lg-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h6 class="card-title m-0">Müşteri Bilgileri</h6>
            <h6 class="m-0">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editUser">Düzenle</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h6>Adı Soyadı</h6>
                <span class=""> {{$order->name}} </span>
            </div>
            <hr class="p-0 m-0 mb-3"/>
            <div class="d-flex justify-content-between">
                <h6>Telefon</h6>
                <a class="" href="tel:{{$order->phone}}"> {{$order->phone}} </a>
            </div>
        </div>
    </div>
</div>
