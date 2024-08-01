@extends('business.layouts.master')
@section('title', 'Hesabım')
@section('styles')
    <style>
        .designCanvas{
            width: 378px;
            max-width: 378px;
            min-height: 567px;
            height: 567px;
            background: #97857b;
            padding: 20px;
        }
        .pageBorder{
            border: 1px solid red;
            width: 338px;
            max-width: 338px;
            min-height: 527px;
            height: 527px;
            text-align: center;

        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">QR Ayarları/</span> Çıktı Al</h4>
        <div class="card">
            <div class="card-header">Menü Şablonuzu Oluşturun</div>
            <div class="card-body">
                <div class="designCanvas d-flex justify-content-center p-3">
                    <div class="pageBorder ">
                        <img src="/business/assets/img/test_logo.png" style="margin-top: 30px">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
