<div class="col-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">Sipariş Detayı</h5>
           <div class="d-flex gap-2">
               <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="ti ti-plus me-2"></i> Ürün Ekle</a>
               <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProductDiscount" class="btn btn-label-primary"><i class="ti ti-discount me-2"></i>İndirim Uygula</a>
           </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-order-details table border-top">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th class="w-50">Ürün</th>
                    <th class="w-25">Fiyat</th>
                    <th class="w-25">Adet</th>
                    <th>Toplam</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
            </table>
            <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                <div class="order-calculations" style="min-width: 200px">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="w-px-100 text-heading">Genel Toplam:</span>
                        <h6 class="mb-0" id="subTotalPrice">0.00</h6>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="w-px-100 text-heading">İndirim (%{{$order->discount}}):</span>
                        <h6 class="mb-0" id="orderDiscount">0.00</h6>
                    </div>
                    <div class="d-flex justify-content-between fw-bold">
                        <h6 class="w-px-100 mb-0">Toplam:</h6>
                        <h6 class="mb-0" id="totalPrice">0.00</h6>
                    </div>
                    <form method="post" action="{{route('business.order.getPayment', $order->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="ti ti-credit-card me-2"></i> Ödeme Al
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
