@extends('admin.layouts.master')
@section('title', 'Paket Düzenle')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2"><span class="text-muted fw-light"> </span>Paket Düzenle</h4>

        <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.package.update', $package->id)}}" enctype="multipart/form-data" >
            <!-- View sales -->
            <div class="col-4">
                <!-- Multi Column with Form Separator -->
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">
                        <h4>Paket Bilgileri</h4>
                    </div>
                </div>
                   <div class="card-body">
                       <!-- User Content -->
                       <div id="editUserForm" class="row g-3">
                           @csrf
                           @method('PUT')
                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Paket Adı</label>
                               <input
                                   type="text"
                                   id="addProductQuantity"
                                   name="title"
                                   value="{{$package->name}}"
                                   class="form-control"

                               />
                           </div>
                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Aylık Fiyat</label>
                               <input
                                   type="text"
                                   id="addProductQuantity"
                                   name="price"
                                   value="{{$package->price}}"
                                   class="form-control"

                               />
                           </div>
                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">İcon</label>
                               <input
                                   type="file"
                                   id="addProductQuantity"
                                   name="icon"
                                   value=""
                                   class="form-control"

                               />
                           </div>
                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Kısa Açıklama</label>
                               <textarea
                                   type="text"
                                   id="addProductQuantity"
                                   name="description"
                                   class="form-control"
                                   rows="5"
                               ></textarea>
                           </div>

                           <div class="col-12 text-center">
                               <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
                               <button
                                   type="reset"
                                   class="btn btn-label-secondary"
                                   data-bs-dismiss="modal"
                                   aria-label="Close">
                                   Kapat
                               </button>
                           </div>
                       </div>

                       <!--/ User Content -->
                   </div>
                </div>
            </div>
            <!-- View sales -->
            <!-- View sales -->
            <div class="col-8">
                <!-- Multi Column with Form Separator -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Özellikleri</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- User Content -->
                        <div id="editUserForm" class="row g-3">
                            <div class="form-repeater">
                                <div data-repeater-list="group-a">
                                    @forelse($package->proparties as $proparty)
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                    <label class="form-label" for="form-repeater-1-1">Özellik Adı</label>
                                                    <input type="text" id="form-repeater-1-1" name="proparty_name" class="form-control" value="{{$proparty->name}}" placeholder="70" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" style="max-width: 100px">
                                                    <label class="form-label" for="form-repeater-1-1">Fiyat</label>
                                                    <input type="text" id="form-repeater-1-1"  name="proparty_price" class="form-control" value="{{$proparty->price}}" placeholder="70" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" style="max-width: 100px">
                                                    <label class="form-label" for="form-repeater-1-1">Sıra </label>
                                                    <input type="text" id="form-repeater-1-1" name="proparty_order_number" class="form-control" value="{{$proparty->order_number}}" placeholder="70" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                    <label class="form-label" for="form-repeater-1-1">Özellik Yetkisi</label>
                                                    <select class="form-control" name="permission_id">
                                                        @foreach($permissions as $permission)
                                                            <option value="{{$permission->id}}" @selected($permission->id == $proparty->permission_id)>{{$permission->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                    <button type="button" class="btn btn-label-danger mt-4" data-repeater-delete>
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                        <span class="align-middle">Sil</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    @empty
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                    <label class="form-label" for="form-repeater-1-1">Özellik Adı</label>
                                                    <input type="text" id="form-repeater-1-1" name="proparty_name" class="form-control" value="" placeholder="70" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" style="max-width: 100px">
                                                    <label class="form-label" for="form-repeater-1-1">Fiyat</label>
                                                    <input type="text" id="form-repeater-1-1" name="proparty_price" class="form-control" value="" placeholder="70" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" style="max-width: 100px">
                                                    <label class="form-label" for="form-repeater-1-1">Sıra</label>
                                                    <input type="text" id="form-repeater-1-1" name="proparty_order_number" class="form-control" value="" placeholder="70" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                    <label class="form-label" for="form-repeater-1-1">Özellik Yetkisi</label>
                                                    <select class="form-control" name="permission_id">
                                                        @foreach($permissions as $permission)
                                                            <option value="{{$permission->id}}">{{$permission->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                    <button type="button" class="btn btn-label-danger mt-4" data-repeater-delete>
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                        <span class="align-middle">Sil</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    @endforelse

                                </div>
                                <div class="mb-0">
                                    <button type="button" class="btn btn-warning" data-repeater-create>
                                        <i class="ti ti-plus me-1"></i>
                                        <span class="align-middle">Yeni Fiyat Alanı Ekle</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1 w-100">Kaydet</button>
                            </div>
                        </div>

                        <!--/ User Content -->
                    </div>
                </div>
            </div>
            <!-- View sales -->
        </form>

    </div>
@endsection
@section('scripts')
    <script src="/business/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="/business/assets/js/forms-extras.js"></script>
@endsection
