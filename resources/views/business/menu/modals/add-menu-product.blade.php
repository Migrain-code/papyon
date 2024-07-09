
<!-- Modal -->
<div class="modal fade" id="addMenuProductModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" data-redirect-url="{{route('business.menu.edit', $menu->id)}}">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalTitle">Ürün Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameBasic" class="form-label">Ürün Adı</label>
                        <input type="text" id="nameBasic" name="product_name" class="form-control" placeholder="Örn. Menü 1">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameBasic" class="form-label">Ürün Fiyatı</label>
                        <input type="number" id="nameBasic" name="price" class="form-control" placeholder="Örn. Menü 1">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameBasic" class="form-label">Ürün Açıklaması </label>
                        <textarea type="text" id="nameBasic" name="product_description" class="form-control" placeholder="Örn. Menü 1"></textarea>
                    </div>
                </div>

                @if($themeId != 4)
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
                            <label for="productImage" class="form-label">Ürün Görseli</label>
                            <input type="file" id="productImage" name="product_image" class="form-control" placeholder="">
                        </div>
                    </div>
                @endif
                <div class="col-md-12 mb-4">
                    <label for="select2Icons" class="form-label">Yanında İyi Gider</label>
                    <select id="select2Icons" name="other_products[]" multiple class="select2-icons form-select">
                        @foreach($categories as $category)
                            <optgroup label="{{$category->name}}">
                                @foreach($category->products as $product)
                                    <option value="{{$product->id}}" data-icon="ti ti-shopping-bag">{{$product->name}}</option>
                                @endforeach
                            </optgroup>
                        @endforeach


                    </select>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="select2Allergens" class="form-label">Alerjenler</label>
                    <select id="select2Allergens" name="allergens[]" multiple class="select2-icons-1 form-select">
                        @foreach($allergens as $allergen)
                            <option value="{{$allergen->id}}" data-icon="/business/assets/img/icon-test.svg">{{$allergen->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" id="submitButton" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
