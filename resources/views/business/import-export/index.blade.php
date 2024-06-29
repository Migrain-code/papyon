@extends('business.layouts.master')
@section('title', 'Import/Export')
@section('styles')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Import/Export/</span> İşlemleri</h4>

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
                            İşletmenize Kategorilerinizi ve ürünlerinizi excel ile ekleyin.
                            <span class="text-primary fw-medium text-nowrap">Tüm Menüler</span>.
                        </h3>
                        <p class="mb-3">
                           İşletmenize Kategorilerinizi ve ürünlerinizi excel ile ekleyin.
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

            <div class="app-ecommerce">
                <div class="alert alert-info" role="alert">
                    1.) Kategori ve ürünlerinizi excelde hazırlayarak toplu yükleyebilirsiniz. <br>
                    2.) Ürün fiyatlarını Ürünleri Dışarı Aktar diyerek toplu olarak güncelleyebilirsiniz.


                </div>

                @if(session('response'))
                    <div class="alert alert-warning" role="alert">
                        <div class="fw-bold">{!! session('response.message') !!}</div>
                    </div>
                @endif
                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-12">
                        <!-- Product Information -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-tile mb-0">Kategori Yükle </h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <form enctype="multipart/form-data" class="row align-items-end p-3" action="{{route('business.excel.category.import')}}" method="post">
                                                @csrf
                                                <div class="col-md-10 mb-4">
                                                    <label for="select2Success1" class="form-label">Excel Dosyası Seçiniz
                                                    </label>
                                                    <input accept=".xls,.xlsx,.csv" type="file" name="category_import" id="" class="form-control">
                                                </div>
                                                <div class="col-md-2 mb-4">
                                                    <button type="submit" class="btn btn-primary">Yükle </button>
                                                </div>
                                            </form>
                                            <div class="col-md-12 mb-4">
                                                <div class="row align-items-center">
                                                    <a target="_blank" download="" href="/business/assets/imports/kategoriler.xlsx">Örnek
                                                        Kategori Dosyası
                                                        İndir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-tile mb-0">Ürün Yükle </h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <form enctype="multipart/form-data" class="row align-items-end p-3" action="{{route('business.excel.product.import')}}" method="post">
                                                @csrf
                                                <div class="col-md-10 mb-4">
                                                    <label for="select2Success1" class="form-label">Excel Dosyası Seçiniz
                                                    </label>
                                                    <input type="file" accept=".xls,.xlsx,.csv" name="product_import" id="" class="form-control">
                                                </div>
                                                <div class="col-md-2 mb-4">
                                                    <button type="submit" class="btn btn-primary">Yükle </button>
                                                </div>
                                            </form>
                                            <div class="col-md-12 mb-4">
                                                <div class="row align-items-center">
                                                    <a href="/business/assets/imports/urunler.xlsx" target="_blank" download="">Örnek Ürün Dosyası İndir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-tile mb-0">Kategorileri Dışarı Aktar </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-end p-3">
                                        <a target="_blank" class="btn btn-primary" href="{{route('business.excel.category.export')}}">
                                                Kategorileri Dışarı Aktar
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-tile mb-0">Ürünleri Dışarı Aktar </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-end p-3">
                                            <a href="{{route('business.excel.product.export')}}" class="btn btn-primary">Ürünleri Dışarı Aktar </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Media -->
                        </div>
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
