@extends('business.layouts.master')
@section('title', 'Abonelik Satın Al')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{route('business.subscribtion.pay', $package->slug)}}" class="card">
            @csrf
            <!-- Pricing Plans -->
            <div class="pb-sm-5 pb-2 rounded-top">
                <div class="container py-5">
                    <div class="row mx-0 gy-3 px-lg-5">
                        @include('business.subscription.payment.parts.price-column')

                        <div class="col-7">
                            <h2 class="text-center mb-2 mt-0 mt-md-4">Abonelik Satın Al</h2>
                            <p class="text-center">
                                "Paketinizin aylık veya yıllık olarak seçilip seçilmediğine dikkat ediniz.
                                Yıllık Seçtiğinizde 1 yılın toplam ücreti renkli fiyatın altında gösterilir."
                            </p>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5>Ödeme Formu</h5>
                                    </div>
                                </div>
                                <div id="form-credit-card" class="row card-body">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label w-100" for="creditCardMask">Kart Numarası</label>
                                            <div class="input-group input-group-merge">
                                                <input
                                                    type="text"
                                                    id="creditCardMask"
                                                    name="card_number"
                                                    class="form-control credit-card-mask"
                                                    placeholder="1356 3215 6548 7898"
                                                    aria-describedby="creditCardMask2" />
                                                <span class="input-group-text cursor-pointer p-1" id="creditCardMask2"
                                                ><span class="card-type"></span
                                                    ></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="collapsible-payment-name">Kartın Üzerindeki İsim</label>
                                                    <input
                                                        type="text"
                                                        id="collapsible-payment-name"
                                                        class="form-control"
                                                        name="name"
                                                        placeholder="Ahmet Aslan" />
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="collapsible-payment-expiry-date">Tarih</label>
                                                    <input
                                                        type="text"
                                                        id="collapsible-payment-expiry-date"
                                                        class="form-control expiry-date-mask"
                                                        name="expiry_date"
                                                        placeholder="MM/YY" />
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="collapsible-payment-cvv">CVV</label>
                                                    <div class="input-group input-group-merge">
                                                        <input
                                                            type="text"
                                                            id="collapsible-payment-cvv"
                                                            class="form-control cvv-code-mask"
                                                            name="cvv_code"
                                                            maxlength="3"
                                                            placeholder="654" />
                                                        <span class="input-group-text cursor-pointer" id="collapsible-payment-cvv2"
                                                        ><i
                                                                class="ti ti-help text-muted"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Kart Doğrulama Değeri"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto card-footer">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Ödeme Yap</button>
                                    <button type="reset" class="btn btn-label-secondary">İptal Et</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Pricing Plans -->
        </form>
    </div>
@endsection
@section('scripts')
    <script src="/business/assets/js/pages-pricing.js"></script>

    <script src="/business/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/business/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="/business/assets/js/form-layouts.js"></script>
@endsection
