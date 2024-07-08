@extends('business.layouts.master')
@section('title', 'Hesabım | Faturalar')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Hesap Ayarları/</span> Güvenlik</h4>
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
            <div class="mb-2 mb-sm-0">
                <h4 class="mb-1">Müşteri Numaranız #{{$user->id}}</h4>
                <p class="mb-0">Kayıt Tarihi : {{$user->created_at->translatedFormat('d F Y h:i')}}</p>
            </div>
            <a class="btn btn-label-success text-success"  data-bs-toggle="modal" data-bs-target="#editUser">Profili Düzenle</a>
        </div>
       <div class="row">
           @include('business.setting.parts.side-bar')
           <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
               @include('business.setting.parts.nav')
               <div class="card card-action mb-4">
                   <div class="card-header align-items-center py-4">
                       <h5 class="card-action-title mb-0">Faturalar</h5>
                   </div>
                   <div class="card-body">
                       <div class="accordion accordion-flush accordion-arrow-left" id="ecommerceBillingAccordionAddress">
                           @forelse($invoices as $invoice)
                               <div class="accordion-item border-bottom">
                                   <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap" id="headingHome">
                                       <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#ecommerceBillingAddressHome{{$invoice->id}}" aria-expanded="false" aria-controls="headingHome" role="button">
                                      <span>
                                        <span class="d-flex gap-2 align-items-baseline">
                                          <span class="h6 mb-1">Premium Paket</span>
                                        </span>
                                        <span class="mb-0 text-muted">2024-05-25 18:17:50</span>
                                      </span>
                                       </a>
                                       <div class="d-flex gap-3 p-4 p-sm-0 pt-0 ms-1 ms-sm-0">

                                           <button class="btn p-1 btn-primary" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                               <i class="ti ti-dots-vertical text-white ti-sm mt-1"></i>
                                           </button>
                                           <ul class="dropdown-menu">
                                               <li><a class="dropdown-item" href="javascript:void(0);">İndir</a></li>
                                               <li><a class="dropdown-item" href="javascript:void(0);">Görüntüle</a></li>
                                           </ul>
                                       </div>
                                   </div>
                                   <div id="ecommerceBillingAddressHome{{$invoice->id}}" class="accordion-collapse collapse"
                                        data-bs-parent="#ecommerceBillingAccordionAddress">
                                       <div class="accordion-body ps-4 ms-2">
                                           <h6 class="mb-1"><b>Fatura Numarası</b>: #{{$invoice->invoice_no}}</h6>
                                           <p class="mb-1"><b>Genel Toplam</b> : {{formatPrice($invoice->calculateGeneralTotal())}}</p>
                                           <p class="mb-1"><b>Vergi</b> : {{$invoice->tax}} %</p>
                                           <p class="mb-1"><b>Vergi Tutarı</b> : {{formatPrice($invoice->calculateTaxPrice())}} </p>
                                           <p class="mb-1"><b>Toplam</b>: {{formatPrice($invoice->price)}}</p>
                                       </div>
                                   </div>
                               </div>

                           @empty
                           @endforelse

                       </div>
                   </div>
               </div>
           </div>


       </div>
    </div>
    @include('business.setting.modals.edit-user-info-modal')

@endsection
@section('scripts')

@endsection
