@extends('business.layouts.master')
@section('title', 'Mekanlar')
@section('styles')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Mekanlar/</span> Mekan Listesi</h4>

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
                            <span class="text-primary fw-medium text-nowrap">Tüm Mekanlar</span>.
                        </h3>
                        <p class="mb-3">
                            Burada eklediğiniz tüm şubeleriniz için tüm düzenleme, yönetim, şube kopyalama ve kaldırma işlerinizi yapabilirsiniz.
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
                        <h5 class="mb-1">Tüm Mekanlarım</h5>
                        <p class="text-muted mb-0">Hesabınıza Dahil Edilmiş Tüm Mekanlar</p>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @forelse($places as $place)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="card-body p-3 pt-2">
                                        <div class="rounded-2 text-center mb-3 position-relative" >
                                            <img class="img-fluid rounded" style="max-height: 250px;" src="{{generateTextQrCode(route('place.show', $place->slug))}}" alt="tutor image 1"/>
                                            <div class="dropdown position-absolute"
                                                 style="
                                                right: 5px;
                                                top: 5px;
                                                background: #2f3349;
                                                border-radius: 5px;
                                                padding: 2px;
                                             ">
                                                <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" style="">
                                                    <a class="dropdown-item" href="{{route('business.place.show', $place->id)}}">Bu Mekana Geçiş Yap</a>
                                                    <a class="dropdown-item" href="{{route('business.place.clone', $place->id)}}">Bu Mekanı Kopyala</a>
                                                    <a class="dropdown-item" href="{{route('business.place.todayReport', $place->id)}}">Kasa Raporu</a>
                                                    <a class="dropdown-item" href="whatsapp://send?text={{urlencode(route('place.show', $place->slug))}}">Paylaş</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            @if($place->status == 2)
                                                <span class="badge bg-label-primary">Pasife Alındı</span>
                                            @elseif($place->status == 1)
                                                <span class="badge bg-label-success">Aktif</span>
                                            @else
                                                <span class="badge bg-label-danger">Mekan Kurulumu Yapılmamış</span>
                                            @endif


                                        </div>
                                        <a href="{{route('business.place.edit', $place->id)}}" class="h5">{{$place->name}}</a>
                                        <p class="d-flex align-items-center mt-2"><i class="ti ti-shopping-cart me-2 mt-n1"></i>{{$place->allClaim()}} Bekleyen Talep Var</p>

                                        <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                            @if($place->status == 2)
                                                <a
                                                    class="app-academy-md-50 btn btn-label-success me-md-2 d-flex align-items-center"
                                                    href="{{route('business.place.active', $place->id)}}">
                                                    <i class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl me-2 mt-n1 ti-sm"></i
                                                    ><span>Aktif Et</span>
                                                </a>
                                            @else
                                                <a
                                                    class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center"
                                                    href="{{route('business.place.passive', $place->id)}}">
                                                    <i class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl me-2 mt-n1 ti-sm"></i
                                                    ><span>Pasife Al</span>
                                                </a>
                                            @endif

                                            <a
                                                class="app-academy-md-50 btn btn-label-primary d-flex align-items-center w-50"
                                                href="{{route('business.place.edit', $place->id)}}">
                                                <span class="me-2">Düzenle</span>
                                                <i class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-primary alert-dismissible text-center d-flex flex-column align-items-center " role="alert">
                                <a href="{{route('business.place.create')}}" class="btn fs-4" style="background-color: #7367f0;color: white;border: 1px dashed #ffffff">
                                    <i class="fa fa-plus-circle me-2 my-4"></i>
                                    Mekan Oluştur
                                </a>
                                <p class="my-3" style="max-width: 400px">
                                   Görünüşe Göre Hiç Mekan Oluşturmamışsınız. Şimdi "Mekan Oluştur" butonuna tıklayın ve mekan oluşturma sihirbazından ilk mekanınızı oluşturun.
                                </p>

                            </div>

                        @endforelse
                    </div>
                    <div class="navigationArea d-flex align-items-center justify-content-center">
                        {!! $places->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
