@extends('business.layouts.master')
@section('title', 'Ödeme Başarılı')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('business.subscription.payment.parts.price-column')
                    <div class="col-7">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex justify-content-center flex-column text-center mt-3">
                                  <img src="/business/assets/img/project/payment/success-icon.png" class="mx-auto" style="max-width: 300px">
                                  <div class="row mt-3">
                                      <h3>Ödeme Başarılı</h3>
                                  </div>

                              </div>

                          </div>

                      </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5>Ödeme Detayı</h5>
                                </div>
                            </div>
                            <div class="card-body">
                               <div class="container">
                                   <div class="row">
                                       <ul class="p-0 m-0">
                                           <li class="d-flex mb-3 pb-1">
                                               <div class="avatar flex-shrink-0 me-3">
                                                   <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-package"></i></span>
                                               </div>
                                               <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                   <div class="me-2">
                                                       <h6 class="mb-0 fw-normal">{{$package->name}} Paket</h6>
                                                   </div>
                                                   <div class="user-progress">
                                                       <h6 class="mb-0"> {{formatPrice($order->calculateGeneralTotal())}}</h6>
                                                   </div>
                                               </div>
                                           </li>
                                           <li class="d-flex mb-3 pb-1">
                                               <div class="avatar flex-shrink-0 me-3">
                                                   <span class="avatar-initial rounded bg-label-info"><i class="ti ti-truck"></i></span>
                                               </div>
                                               <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                   <div class="me-2">
                                                       <h6 class="mb-0 fw-normal">Vergi Tutarı (20%)</h6>
                                                   </div>
                                                   <div class="user-progress">
                                                       <h6 class="mb-0"> {{formatPrice($order->calculateTaxPrice())}}</h6>
                                                   </div>
                                               </div>
                                           </li>
                                           <li class="d-flex mb-3 pb-1">
                                               <div class="avatar flex-shrink-0 me-3">
                                                   <span class="avatar-initial rounded bg-label-success"><i class="ti ti-circle-check"></i></span>
                                               </div>
                                               <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                   <div class="me-2">
                                                       <h6 class="mb-0 fw-normal">Toplam</h6>

                                                   </div>
                                                   <div class="user-progress">
                                                       <h6 class="mb-0">{{formatPrice($order->price)}}</h6>
                                                   </div>
                                               </div>
                                           </li>
                                           {{--
                                            <li class="d-flex mb-3 pb-1">
                                               <div class="avatar flex-shrink-0 me-3">
                                                   <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-percentage"></i></span>
                                               </div>
                                               <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                   <div class="me-2">
                                                       <h6 class="mb-0 fw-normal">İndirim (10%)</h6>
                                                   </div>
                                                   <div class="user-progress">
                                                       <h6 class="mb-0">95₺</h6>
                                                   </div>
                                               </div>
                                           </li>
                                           --}}

                                       </ul>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5>İşlemler</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <a class="btn btn-label-primary" href="{{route('business.subscribtion.index')}}">Aboneliğim <i class="ti ti-user-shield ms-2"></i></a>
                                        <a class="btn btn-label-dark mt-3" href="{{route('business.home')}}">Anasayfa <i class="ti ti-home ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
