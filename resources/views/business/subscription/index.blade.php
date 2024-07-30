@extends('business.layouts.master')
@section('title', 'Abonelik')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <!-- Pricing Plans -->
            <div class="pb-sm-5 pb-2 rounded-top">
                <div class="container py-5">
                    <h2 class="text-center mb-2 mt-0 mt-md-4">Abonelik Paketleri</h2>
                    <p class="text-center">
                        "İşletmeniz için ihtiyaçlarınıza en uygun abonelik paketini seçerek işlerinizi kolaylaştırın ve verimliliğinizi artırın."
                    </p>

                    <div class="row mx-0 gy-3 px-lg-5">
                        @foreach($packages as $package)
                            @include('business.subscription.parts.price-column')
                        @endforeach


                    </div>
                </div>
            </div>
            <!--/ Pricing Plans -->
        </div>
    </div>
@endsection
@section('scripts')

@endsection
