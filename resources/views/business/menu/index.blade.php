@extends('business.layouts.master')
@section('title', 'Menüler')
@section('styles')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Menüler/</span> Menü Listesi</h4>

        <div class="app-academy">
            <div class="card p-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                    <div class="app-academy-md-25 card-body py-0">
                        <img
                            src="/business/assets/img/illustrations/bulb-light.png"
                            class="img-fluid app-academy-img-height scaleX-n1-rtl"
                            alt="Bulb in hand"
                            data-app-light-img="illustrations/bulb-light.png"
                            data-app-dark-img="illustrations/bulb-dark.png"
                            height="90"
                            style="height: 140px;"
                        />
                    </div>
                    <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                        <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                            Hesabınıza Kayıtlı Olan
                            <span class="text-primary fw-medium text-nowrap">Tüm Menüler</span>.
                        </h3>
                        <p class="mb-3">
                            Burada eklediğiniz tüm menüleriniz için tüm düzenleme, yönetim, menü kopyalama ve kaldırma işlerinizi yapabilirsiniz.
                        </p>

                    </div>
                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                        <img
                            src="/business/assets/img/illustrations/pencil-rocket.png"
                            alt="pencil rocket"
                            height="188"
                            class="scaleX-n1-rtl"
                            style="height: 140px;"
                        />
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Tüm Menüler</h5>
                        <p class="text-muted mb-0">Hesabınıza Dahil Edilmiş Tüm Menüler</p>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @forelse($menus as $menu)
                            <div class="col-md-3 col-xl-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="dropdown position-absolute" style="right: 30px;top: 30px">
                                            <button class="btn btn-primary p-1" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti ti-dots-vertical ti-sm text-white"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" style="">
                                                <a class="dropdown-item" href="{{route('business.menu.useMenu', $menu->id)}}">Bu Menüyü Kullan</a>
                                                <a class="dropdown-item" href="{{route('business.menu.edit', $menu->id)}}">Düzenle</a>
                                                <a class="dropdown-item" href="{{route('business.menu.show', $menu->id)}}">Sil</a>
                                            </div>
                                        </div>
                                        <div class="bg-label-primary rounded-3 text-center mb-3 pt-4 pb-4">
                                            <img class="img-fluid" src="{{storage($menu->image)}}" alt="Card girl image" width="140"  style="min-height: 150px;object-fit: cover;border-radius: 5px">
                                        </div>
                                        <h4 class="mb-2 pb-1"><a href="{{route('business.menu.edit', $menu->id)}}">{{$menu->name}}</a></h4>

                                        <div class="row mb-3 g-3">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <div class="avatar flex-shrink-0 me-2">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class="ti ti-box ti-md"></i>
                                                    </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 text-nowrap">{{$menu->categories->count()}}</h6>
                                                        <small>Kategori</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <div class="avatar flex-shrink-0 me-2">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class="ti ti-3d-cube-sphere ti-md"></i>
                                                    </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 text-nowrap">{{$menu->products->count()}}</h6>
                                                        <small>Ürün</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-primary alert-dismissible text-center d-flex flex-column align-items-center " role="alert">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#backDropModal"  class="btn fs-5" style="background-color: #7367f0;color: white;border: 1px dashed #ffffff">
                                    <i class="fa fa-plus-circle me-2 my-2"></i>
                                    Menü Oluştur
                                </a>
                                <p class="my-3" style="max-width: 400px">
                                    Görünüşe Göre Hiç Menü Oluşturmamışsınız. Şimdi "Menü Oluştur" butonuna tıklayın ve ilk menünüzü oluşturun.
                                </p>
                            </div>
                        @endforelse
                        @if($menus->count() > 0)
                            <div class="alert alert-primary alert-dismissible text-center d-flex flex-column align-items-center " role="alert">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#backDropModal"  class="btn fs-5" style="background-color: #7367f0;color: white;border: 1px dashed #ffffff">
                                    <i class="fa fa-plus-circle me-2 my-2"></i>
                                    Menü Oluştur
                                </a>
                            </div>
                        @endif


                    </div>
                    <div class="navigationArea d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('business.menu.modals.add-menu')
@endsection
@section('scripts')
    <script>

    </script>
@endsection
