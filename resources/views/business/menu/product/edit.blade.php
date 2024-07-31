@extends('business.layouts.master')
@section('title', 'Menüler')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
    <style>
        .cropper-container {
            max-width: 100%;
            max-height: 500px;
            overflow: hidden;
            position: relative;
        }
    </style>
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Ürünler/</span> Ürün Düzenle</h4>

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
                            {{$category->name}} Kategorisindeki
                            <span class="text-primary fw-medium text-nowrap">Ürünü Düzenleyin</span>.
                        </h3>
                        <p class="mb-3">
                            Yukarıda yazan kategorideki ürünü güncelleme işlemi yapılacak.
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
                        <h5 class="mb-1">Ürün Düzenle</h5>

                    </div>
                </div>
                <div class="card-body">
                   <div class="row gy-4 mb-4">
                       <form method="post" id="productAddForm" action="{{route('business.menu-category-product.update', $menuCategoryProduct->id)}}" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                           <div class="row">
                               <div class="col mb-4">
                                   <label for="nameBasic" class="form-label">Ürün Adı</label>
                                   <input type="text" id="nameBasic" name="product_name" class="form-control" value="{{$menuCategoryProduct->name}}"  placeholder="Örn. Menü 1">
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4">
                                   <label for="nameBasic" class="form-label">Ürün Fiyatı</label>
                                   <input type="number" id="nameBasic" name="price" class="form-control" value="{{$menuCategoryProduct->price}}" placeholder="Örn. Menü 1">
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4">
                                   <label for="nameBasic" class="form-label">Pişirme Süresi</label>
                                   <input type="number" id="nameBasic" name="cooking_time" class="form-control" value="{{$menuCategoryProduct->cookie_time}}" placeholder="Örn. 30">
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4">
                                   <label for="nameBasic" class="form-label">Kalori Değeri</label>
                                   <input type="number" id="nameBasic" name="calorie" class="form-control" value="{{$menuCategoryProduct->calorie_total}}" placeholder="Örn. 75">
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4">
                                   <label for="nameBasic" class="form-label">Ürün Açıklaması </label>
                                   <textarea type="text" rows="5" id="nameBasic" name="product_description" class="form-control" placeholder="Örn. Menü 1">{{$menuCategoryProduct->description}}</textarea>
                               </div>
                           </div>


                               <div class="row">
                                   <label class="switch switch-lg mb-4">
                                       <input type="checkbox" class="switch-input" id="productImageCheck">
                                       <span class="switch-toggle-slider">
                                    <span class="switch-on"><i class="ti ti-check"></i></span>
                                    <span class="switch-off"><i class="ti ti-x"></i></span>
                                </span>
                                       <span class="switch-label">Görselli Ürün</span>
                                   </label>

                               </div>
                           <div class="row" style="display: none" id="productImageInputContainer">
                               <div class="col mb-4">
                                   <div id="imageContainer">

                                   </div>
                                   <label for="productImage" class="form-label">
                                       Ürün Görseli
                                       <span class="text-warning">(Lütfen Seçtiğiniz Görseli Çerçevenin Tam Ortasına Getirin. Tavsiye Edilen 190 * 150)</span>
                                   </label>
                                   <input type="file" id="productImage" name="product_image" class="form-control" placeholder="">
                                   <div class="my-4">
                                       <img id="image" src="" alt="Picture" style="max-width: 100%;">
                                   </div>
                               </div>
                               <canvas id="canvas" style="display: none;"></canvas>
                           </div>
                           <input type="hidden" style="visibility: hidden" name="croppedImage" id="croppedInput">
                           <div class="col-md-12 mb-4">
                               <label for="select2Icons" class="form-label">Yanında İyi Gider</label>
                               <select id="select2Icons" name="other_products[]" multiple class="select2-icons form-select">
                                   @foreach($categories as $category)
                                       <optgroup label="{{$category->name}}">
                                           @foreach($category->products as $product)
                                               <option value="{{$product->id}}" @selected(in_array($product->id, $menuCategoryProduct->otherProducts()->pluck('added_product_id')->toArray())) data-icon="ti ti-shopping-bag">{{$product->name}}</option>
                                           @endforeach
                                       </optgroup>
                                   @endforeach


                               </select>
                           </div>

                           <div class="col-md-12 mb-4">
                               <label for="select2Allergens" class="form-label">Alerjenler</label>
                               <select id="select2Allergens" name="allergens[]" multiple class="select2-icons-1 form-select">
                                   @foreach($allergens as $allergen)
                                       <option value="{{$allergen->id}}" @selected(in_array($allergen->id, $menuCategoryProduct->allergens()->pluck('allergen_id')->toArray())) data-icon="{{storage($allergen->icon)}}">{{$allergen->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-md-12 mb-4">
                               <label for="select2Sauces" class="form-label">Soslar</label>
                               <select id="select2Sauces" name="sauces[]" multiple class="select2 form-select">
                                   @foreach($sauces as $sauce)
                                       <option value="{{$sauce->id}}" @selected(in_array($sauce->id, $menuCategoryProduct->sauces()->pluck('sauce_id')->toArray()))>{{$sauce->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-md-12 mb-4">
                               <label for="select2Materials" class="form-label">Malzemeler</label>
                               <select id="select2Materials" name="materials[]" multiple class="select2 form-select">
                                   @foreach($materials as $material)
                                       <option value="{{$material->id}}" @selected(in_array($material->id, $menuCategoryProduct->materials()->pluck('material_id')->toArray()))>{{$material->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-12">
                               <div class="card">
                                   <h5 class="card-header d-flex justify-content-between">Fiyat Bilgileri
                                       <a type="button" class="btn btn-success text-white" data-bs-target="#addUnitModal" data-bs-toggle="modal">Birim Ekle</a>
                                   </h5>
                                   <div class="card-body">
                                       <div class="form-repeater">
                                           <div data-repeater-list="group-a">
                                               @forelse($units as $unit)
                                                   <div data-repeater-item>
                                                       <div class="row">
                                                           <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                               <label class="form-label" for="form-repeater-1-1">Fiyat</label>
                                                               <input type="text" id="form-repeater-1-1" name="added_price" class="form-control" value="{{$unit->price}}" placeholder="70" />
                                                           </div>

                                                           <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                               <label class="form-label" for="form-repeater-1-3">Birim </label>
                                                               <select id="form-repeater-1-3" name="added_unit" class="form-select unitSelect">
                                                                   <option value="">Birim Seçiniz</option>
                                                                   @foreach($placeUnits as $placeUnit)
                                                                       <option value="{{$placeUnit->id}}" @selected($unit->unit_id == $placeUnit->id)>{{$placeUnit->name}}</option>
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
                                                               <label class="form-label" for="form-repeater-1-1">Fiyat</label>
                                                               <input type="text" id="form-repeater-1-1" name="added_price" class="form-control" placeholder="70" />
                                                           </div>

                                                           <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                               <label class="form-label" for="form-repeater-1-3">Birim </label>
                                                               <select id="form-repeater-1-3" name="added_unit" class="form-select unitSelect">
                                                                   <option value="">Birim Seçiniz</option>
                                                                   @foreach($placeUnits as $placeUnit)
                                                                       <option value="{{$placeUnit->id}}">{{$placeUnit->name}}</option>
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
                                   </div>
                               </div>
                           </div>

                           <div class="card-footer">
                               <button type="button" id="submitButton" class="btn btn-primary w-100">Kaydet</button>
                           </div>
                       </form>

                   </div>
                </div>
            </div>

        </div>
    </div>
    @include('business.menu.product.add-unit')
@endsection
@section('scripts')
    <script src="/business/assets/vendor/libs/select2/select2.js"></script>
    <script src="/business/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="/business/assets/js/forms-selects.js"></script>
    <script src="/business/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="/business/assets/js/forms-extras.js"></script>
    <script>
        var unitAddUrl = "{{route('business.place-unit.store')}}";
    </script>
    <script src="/business/assets/js/project/product/add-unit.js"></script>
    <script>
        $('#productImageCheck').on('change', function (){
            var productImageInputArea = document.getElementById('productImageInputContainer');
            if($(this).is(':checked')){
                productImageInputArea.style.display = "block";
            } else{
                productImageInputArea.style.display = "none";
                $('#productImage').val("");
            }
        });

    </script>
    <script src="https://unpkg.com/cropperjs"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('productImage');
            const image = document.getElementById('image');
            const cropButton = document.getElementById('submitButton');
            const canvas = document.getElementById('canvas');
            const croppedImageInput = document.getElementById('croppedInput');
            let cropper;
            var cropWidth = 500;
            var cropHeight = 450;
            fileInput.addEventListener('change', function (e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    const file = files[0];
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        image.src = event.target.result;
                        if (cropper) {
                            cropper.destroy();
                        }

                        image.onload = function() {
                            const imageWidth = image.naturalWidth;
                            const imageHeight = image.naturalHeight;
                            let scaledWidth = cropWidth;
                            let scaledHeight = cropHeight;

                            if (imageWidth / imageHeight > cropWidth / cropHeight) {
                                scaledHeight = cropHeight;
                                scaledWidth = (imageWidth / imageHeight) * cropHeight;
                            } else {
                                scaledWidth = cropWidth;
                                scaledHeight = (imageHeight / imageWidth) * cropWidth;
                            }

                            cropper = new Cropper(image, {
                                aspectRatio: 1,
                                viewMode: 1,
                                minCropBoxWidth: cropWidth,
                                minCropBoxHeight: cropHeight,
                                ready() {
                                    cropper.setCropBoxData({ left: 0, top: 0, width: cropWidth, height: cropHeight });
                                    cropper.setCanvasData({ left: 0, top: 0, width: scaledWidth, height: scaledHeight });
                                }
                            });
                        };
                    };
                    reader.readAsDataURL(file);
                }
            });
            cropButton.addEventListener('click', function () {
                if($('#productImageCheck').is(':checked')){
                    const croppedCanvas = cropper.getCroppedCanvas({
                        width: cropWidth,
                        height: cropHeight
                    });
                    canvas.style.display = 'none';
                    canvas.width = cropWidth;
                    canvas.height = 150;
                    canvas.getContext('2d').drawImage(croppedCanvas, 0, 0);

                    croppedCanvas.toBlob(function (blob) {
                        const reader = new FileReader();
                        reader.onloadend = function () {
                            croppedImageInput.value = reader.result;
                            $('#productAddForm').submit();
                        };
                        reader.readAsDataURL(blob);
                    });
                } else{
                    $('#productAddForm').submit();
                }

            });

        });
    </script>
@endsection
