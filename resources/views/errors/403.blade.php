@extends('business.layouts.master')
@section('breadcrumbs')
    <li>
        Yetkisiz Erişim
    </li>
@endsection
@section('content')
    <div class="card forbiddenArea">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="w-500px text-center border-1">
                    <img src="/business/assets/media/logos/vector.jpg" style="width: 100%">
                    <h1 class="fs-2hx">Erişim Reddedildi</h1>
                    <span class="fs-2">Bu özelliğe erişemezsiniz</span>
                    <div class="d-flex justify-content-center gap-3 my-6">
                        <a href="{{url()->previous()}}" class="btn btn-light-info fs-3"> Geri Dön </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
