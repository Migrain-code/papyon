@extends('business.layouts.master')
@section('title', 'Duyuru Düzenle')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span>Duyuru Düzenle</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">


                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <form method="post" action="{{route('business.announcement.update', $announcement->id)}}" class="card-body order-0 order-md-1">
                        @csrf
                        @method('PUT')
                        <div class="card-title">
                            <h4 >Duyuru Düzenle</h4>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label class="form-label" for="addProductQuantity">Başlık</label>
                                <input
                                    type="text"
                                    id="addProductQuantity"
                                    name="title"
                                    class="form-control"
                                    value="{{$announcement->title}}"
                                />
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label" for="addProductQuantity">Açıklama</label>
                                <textarea
                                    type="text"
                                    id="addProductQuantity"
                                    name="description"
                                    class="form-control"
                                    rows="5"
                                >{{$announcement->description}}</textarea>
                            </div>
                        </div>

                        <div class="col-12 text-start mt-3">
                            <button type="submit" class="btn btn-primary w-100" style="max-width: 400px">Kaydet</button>
                        </div>
                    </form>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
    @include('business.swiper-advert.modals.add-advert')
@endsection
@section('scripts')

@endsection
