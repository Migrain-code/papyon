<div class="col-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Sipariş Detayı</h5>
           <div class="d-flex gap-2">
               <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="ti ti-plus me-2"></i> Ürün Ekle</a>
               <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProductDiscount" class="btn btn-label-primary"><i class="ti ti-discount me-2"></i>İndirim Uygula</a>
           </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($order->cart  as $cart)
                            <div class="col-12 col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between">
                                        <h6 class="card-title m-0">{{$cart->name}}</h6>
                                        <h6 class="m-0">
                                            <span>{{$cart->quantity}} Adet</span>
                                        </h6>
                                    </div>
                                    @php
                                        if (!is_array($cart->sauces)){
                                              $sauces = json_decode($cart->sauces);
                                              $sauces = implode(',', $sauces);
                                        }
                                        if (!is_array($cart->materials)){
                                              $materials = json_decode($cart->materials);
                                              $materials = implode(',', $materials);
                                        }
                                    @endphp
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h6>Soslar</h6>
                                            <span class=""> {{$sauces}} </span>
                                        </div>
                                        <hr class="p-0 m-0 mb-3"/>
                                        <div class="d-flex justify-content-between">
                                            <h6>Çıkarılacak Malzemeler</h6>
                                            <span class=""> {{$materials}} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-4">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="card-title m-0">Sipariş Özeti</h5>
                                <h6 class="m-0">

                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6>Genel Toplam</h6>
                                    <span class=""> 78 </span>
                                </div>
                                <hr class="p-0 m-0 mb-3"/>
                                <div class="d-flex justify-content-between">
                                    <h6>İndirim</h6>
                                    <span class=""> asd </span>
                                </div>
                                <hr class="p-0 m-0 mb-3"/>
                                <div class="d-flex justify-content-between">
                                    <h6>Kurye</h6>
                                    <span class=""> asd </span>
                                </div>
                                <hr class="p-0 m-0 mb-3"/>
                                <div class="d-flex justify-content-between">
                                    <h6>Toplam</h6>
                                    <span class=""> asd </span>
                                </div>
                                <hr class="p-0 m-0 mb-3"/>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success w-100">Ödeme Al</button>
                                </div>
                            </div>
                        </div>
                </div>

            </div>

        </div>
    </div>

</div>
