@extends('business.layouts.master')
@section('title', 'Hesabım')
@section('styles')
    <style>
        .accordion-button {
            background: #7367f0 !important;
            color: white;
        }
        .accordion-header + .accordion-collapse .accordion-body {
            padding-top: 15px;
        }
        .accordion-button:not(.collapsed) {
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Hesap Ayarları/</span> Bilgilerim</h4>
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
            <div class="mb-2 mb-sm-0">
                <h4 class="mb-1">Müşteri Numaranız #{{$user->id}}</h4>
                <p class="mb-0">Kayıt Tarihi : {{$user->created_at->translatedFormat('d F Y h:i')}}</p>
            </div>
            <a class="btn btn-label-success text-success">Profili Düzenle</a>
        </div>
       <div class="row">
           @include('business.setting.parts.side-bar')
           @include('business.setting.parts.content')
       </div>
    </div>
@endsection
@section('scripts')

@endsection
