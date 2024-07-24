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
            <div id="checkout-cart" class="content">
                <div class="row">
                    <!-- Cart left -->
                    <div class="col-xl-8 mb-3 mb-xl-0">

                        <ul class="list-group mb-3">
                            @foreach($order->cart  as $cart)
                                <li class="list-group-item p-4">
                                    <div class="d-flex gap-3 flex-lg-row flex-column align-items-center">
                                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center justify-content-lg-start">
                                            <img src="{{storage($cart->image)}}" style="min-height: 100px; max-height: 100px;object-fit: cover;" alt="google home" class="w-px-100" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p class="me-3 fs-5 fw-bold">
                                                        <a href="javascript:void(0)" class="text-body">{{$cart->name}} <a href="javascript:void(0)" class="me-3">({{$cart->quantity}} Adet)</a></a>
                                                    </p>

                                                    @php
                                                            if (!is_array($cart->sauces)){
                                                                  $sauces = json_decode($cart->sauces);
                                                            } else{
                                                                $sauces = [];
                                                            }
                                                            if (!is_array($cart->materials)){
                                                                  $materials = json_decode($cart->materials);
                                                            }else{
                                                               $materials = [];
                                                            }
                                                    @endphp

                                                    @if(count($sauces) > 0)
                                                        <div class="mb-2 d-flex flex-wrap">
                                                            <span class="me-1">Soslar</span>
                                                            <a href="javascript:void(0)" class="me-3 w-100">
                                                                <ul class="d-flex gap-3 align-items-center ">
                                                                    @foreach($sauces as $sauce)
                                                                        <li class="col-6">{{$sauce}}</li>
                                                                    @endforeach

                                                                </ul>
                                                            </a>

                                                        </div>
                                                    @endif
                                                    @if(count($materials) > 0)
                                                    <div class="mb-2 d-flex flex-wrap">
                                                        <span class="me-1">Çıkarılacak Malzemeler:</span>
                                                        <a href="javascript:void(0)" class="me-3 w-100">
                                                            <ul class="d-flex gap-3 align-items-center ">
                                                                @foreach($materials as $material)
                                                                    <li class="col-6">{{$material}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </a>

                                                    </div>
                                                    @endif

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-end">
                                                        <button type="button" class="btn-close btn-pinned product-delete-btn" data-product="{{$cart->id}}" aria-label="Close"></button>
                                                        <div class="my-2 my-md-4 mb-md-5">
                                                            <span class="text-primary fw-bolder fs-4">{{formatPrice($cart->total)}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            @endforeach



                        </ul>

                    </div>

                    <!-- Cart right -->
                    <div class="col-xl-4">
                        <div class="border rounded p-4 mb-3 pb-3">
                            <h6>Ödeme Bilgileri</h6>
                            <!-- Gift wrap -->
                            <div class="bg-lighter rounded p-3">
                                <div class="d-flex justify-content-between g-3 mb-3">
                                    <div>
                                        Sipariş Tipi
                                    </div>
                                    <div>
                                        {{$order->orderType('name')}}
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between g-3 mb-3">
                                    <div>
                                        Ödeme Tipi
                                    </div>
                                    <div>
                                        {{$order->type('name')}}
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-n4" />
                            <!-- Offer -->
                            <h6>Ödeme Detayı</h6>
                            <!-- Gift wrap -->
                            <dl class="row mb-0">
                                <dt class="col-6 fw-normal text-heading">Sepet Tutarı</dt>
                                <dd class="col-6 text-end">{{formatPrice($order->calculateCartTotal())}}</dd>

                                <dt class="col-sm-6 fw-normal">İndirim</dt>
                                <dd class="col-sm-6 text-end">{{formatPrice($order->discountTotal())}}</dd>

                                <dt class="col-6 fw-normal text-heading">Kurye</dt>
                                <dd class="col-6 text-end">
                                    @if($order->deliveryFee() == 0)
                                        <span class="badge bg-label-success ms-1">Ücretsiz</span>
                                    @else
                                        <span class="">{{formatPrice($order->deliveryFee())}}</span>
                                    @endif
                                </dd>
                            </dl>

                            <hr class="mx-n4" />
                            <dl class="row mb-0">
                                <dt class="col-6 text-heading">Toplam</dt>
                                <dd class="col-6 fw-medium text-end text-heading mb-0">{{formatPrice($order->total())}}</dd>
                            </dl>
                        </div>
                        <div class="d-grid">
                            <form method="post" action="{{route('business.order.getPayment', $order->id)}}">
                                @csrf
                                <button class="btn btn-primary btn-next w-100">Siparişi Tamamla</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
