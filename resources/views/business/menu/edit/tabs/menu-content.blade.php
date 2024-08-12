<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                Kategoriler
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenuCategoryModal">Kategori Ekle</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-md-0 mb-4" id="sortable-cards">
                        @forelse($categories as $category)
                            <div id="handle-list-1" class="accordion mt-3">
                                <div data-id="{{$category->id}}" class="card accordion-item" style="position: relative; top: 0px; left: 0px;">
                                    <h2 class="accordion-header d-flex align-items-center">
                                        <i style="cursor: ns-resize;" class="ti ti-menu-2 ti-lg me-2 sortable-icon"></i>
                                        <button type="button" class="accordion-button d-flex justify-content-center align-items-center collapsed"
                                                data-bs-toggle="collapse" data-bs-target="#categories-{{$category->id}}" aria-expanded="false">
                                                <span class="flex-fill ml-4">
                                                   {{$category->name}}
                                                </span>
                                        </button>
                                        <a href="{{route('business.menuCategory.create', $category->id)}}" class="cursor-pointer ti ti-square-rounded-plus-filled ti-md me-2 text-success addProduct" data-menu-id="{{$category->menu_id}}" data-category-id="{{$category->id}}"></a>
                                        <i class="cursor-pointer ti ti-edit-circle ti-md text-warning me-2 editCategory" data-category-id="{{$category->id}}"></i>
                                        {!! create_html_icon_delete_button('MenuCategory', $category->id, 'Kategori', 'Kategori kaydını silmek istediğinize emin misiniz? Kategori içerisindeki ürünler de silinecektir', route('business.menu-category.destroy', $category->id), true) !!}
                                    </h2>
                                    <div style="visibility: visible;" id="categories-{{$category->id}}" class="accordion-collapse collapse">
                                        <div class="accordion-body sortableProd" id="sortable-products-{{$category->id}}">
                                            <!-- Products -->
                                            @forelse($category->products as $product)
                                                <div data-id="{{$product->id}}" class="card my-2 py-2" style="position: relative; top: 0px; left: 0px;">
                                                    <div class="accordion-header d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <i style="cursor: ns-resize;" class="ti ti-menu-2 ti-lg me-2 sortable-icon"></i>
                                                            <button type="button" class="btn d-flex justify-content-center align-items-center">
                                                                <span class="flex-fill ml-4">
                                                                 {{$product->name}}
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="d-flex">
                                                            <a href="{{route('business.menu-category-product.show', $product->id)}}" class="cursor-pointer ti ti-edit ti-md me-2 text-warning" data-product-id="{{$product->id}}"></a>
                                                            {!! create_html_icon_delete_button('MenuCategoryProduct', $product->id, 'Ürün', 'Ürün kaydını silmek istediğinize emin misiniz?', route('business.menu-category-product.destroy', $product->id), true) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="d-flex justify-content-center">
                                                    <div class="alert alert-warning w-100 text-center" style="border: 1px dashed">Bu kategoride ürün bulunamadı</div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-primary alert-dismissible text-center d-flex flex-column align-items-center " role="alert">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addMenuCategoryModal"  class="btn fs-5" style="background-color: #7367f0;color: white;border: 1px dashed #ffffff">
                                    <i class="fa fa-plus-circle me-2 my-2"></i>
                                    Kategori Oluştur
                                </a>
                                <p class="my-3" style="max-width: 400px">
                                    Görünüşe Göre Hiç Kategori Oluşturmamışsınız. Şimdi "Kategori Oluştur" butonuna tıklayın ve ilk kategorinizi oluşturun.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
