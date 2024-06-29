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
                                            <img class="img-fluid rounded" src="{{asset('storage/'. $place->logo)}}" alt="tutor image 1"/>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Gün Sonu Raporu</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Aylık Raporu</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Paylaş</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="badge bg-label-primary">Premium Paket</span>
                                            <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                                4.4 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span
                                                ><span class="text-muted">(1.23k)</span>
                                            </h6>
                                        </div>
                                        <a href="{{route('business.place.edit', $place->id)}}" class="h5">{{$place->name}}</a>
                                        <p class="d-flex align-items-center mt-2"><i class="ti ti-clock me-2 mt-n1"></i>15 Gün Kaldı</p>
                                        <div class="progress mb-4" style="height: 8px">
                                            <div
                                                class="progress-bar w-75"
                                                role="progressbar"
                                                aria-valuenow="25"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                            <a
                                                class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center"
                                                href="app-academy-course-details.html">
                                                <i class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl me-2 mt-n1 ti-sm"></i
                                                ><span>Pasife Al</span>
                                            </a>
                                            <a
                                                class="app-academy-md-50 btn btn-label-primary d-flex align-items-center"
                                                href="app-academy-course-details.html">
                                                <span class="me-2">Önizleme Modu</span>
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
