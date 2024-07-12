@extends('business.layouts.master')
@section('title', 'Menü Detayı')
@section('styles')

@endsection

@section('content')
    @php
        $themeId = 4;
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Menüler /</span> Menü Detayı / Görünütlenen Menü ({{$menu->name}})</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Menü Düzenleme Sihirbazı! 🎉</h5>
                                <p class="mb-2">Şimdi Menü Bilgilerinizi Güncelleyin</p>
                                <h4 class="text-primary mb-1"></h4>
                                <a href="{{route('business.menu.index')}}" class="btn btn-primary">Menülerim</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="/business/assets/img/illustrations/card-advance-sale.png"
                                    height="140"
                                    alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <div class="card-body order-0 order-md-1">
                        <!-- User Pills -->
                        @include('business.menu.edit.nav')
                        <!--/ User Pills -->
                        <form class="row" method="post" action="{{route('business.menu.updatePrice', $menu->id)}}">
                            @csrf
                            @forelse($categories as $category)
                                <div class="col-12 mt-3">
                                    <div class="d-flex align-items-center justify-content-between me-4">
                                        <h4>{{$category->name}}</h4>
                                        <label class="switch switch-md ">
                                            <input type="checkbox" class="switch-input categorySwitch" @checked($category->status == 1) data-category-id="{{$category->id}}" data-target="category-{{$category->id}}">
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on bg-success"><i class="ti ti-check"></i></span>
                                            <span class="switch-off"><i class="ti ti-x"></i></span>
                                        </span>

                                        </label>
                                    </div>
                                    <div class="container">
                                       @forelse($category->products as $product)
                                            <div class="d-flex align-items-center justify-content-between ">
                                                <h6 style="margin: 5px 0">{{$product->name}}</h6>
                                                <div class="d-flex gap-4 align-items-center">
                                                    <div class="input-group my-2" style="max-width: 150px">
                                                        <input type="number" class="form-control" name="productPrices[{{$product->id}}]" placeholder="Fiyat"  value="{{$product->price}}" aria-label="Recipient's username" aria-describedby="basic-addon13" />
                                                        <span class="input-group-text" id="basic-addon13">TL</span>
                                                    </div>
                                                    <label class="switch switch-md ">
                                                        <input type="checkbox" class="switch-input productSwitch category-{{$category->id}}" data-product-id="{{$product->id}}" @checked($product->status == 1)>
                                                        <span class="switch-toggle-slider">
                                                        <span class="switch-on bg-success"><i class="ti ti-check"></i></span>
                                                        <span class="switch-off"><i class="ti ti-x"></i></span>
                                                    </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <hr style="margin: 1px 0 !important;margin-right: -25px !important;"/>
                                        @empty
                                            <div class="d-flex justify-content-center">
                                                <div class="alert alert-warning w-100 text-center" style="border: 1px dashed">Bu kategoride ürün bulunamadı</div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center">
                                    <div class="alert alert-warning w-100 text-center" style="border: 1px dashed">Bu menüye hiç ekleme yapmadınız. <a href="{{route('business.menu.edit', $menu->id)}}">Menü İçeriği </a>menüsünden ekleme yapabilirsiniz</div>
                                </div>
                            @endforelse
                            <div class="d-flex mt-3 justify-content-center">
                                <button type="submit" class="btn btn-success">Fiyatları Güncelle</button>
                            </div>
                        </form>
                    </div>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
@endsection
@section('scripts')
    <script src="/business/assets/js/project/menu/status.js"> </script>
@endsection
