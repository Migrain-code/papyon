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
                                <div data-id="0" class="card accordion-item" style="position: relative; top: 0px; left: 0px;">
                                    <h2 class="accordion-header d-flex align-items-center">
                                        <i style="cursor: ns-resize;" class="ti ti-menu-2 ti-lg me-2 sortable-icon"></i>
                                        <button type="button" class="accordion-button d-flex justify-content-center align-items-center collapsed"
                                                data-bs-toggle="collapse" data-bs-target="#categories-{{$category->id}}" aria-expanded="false">
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                            <span class="flex-fill ml-4">
                                        {{$category->name}}
                                    </span>
                                        </button>
                                        <i class="cursor-pointer ti ti-plus ti-md me-2 addCategory" data-menu-id="{{$category->menu_id}}" data-category-id="{{$category->id}}"></i>
                                        <i class="cursor-pointer ti ti-edit ti-md me-2"></i>
                                        {!! create_html_icon_delete_button('MenuCategory', $category->id, 'Kategori', 'Kategori kaydını silmek istediğinize emin misiniz? Kategori içerisindeki ürünler de silinecektir', route('business.menu-category.destroy', $category->id), true) !!}
                                    </h2>
                                    <div style="visibility: visible;" id="categories-{{$category->id}}" class="accordion-collapse collapse">
                                        <div class="accordion-body sortableProd">
                                            <!-- Products -->
                                            @forelse($category->products as $product)
                                                <div data-id="0" class="card" style="position: relative; top: 0px; left: 0px;">
                                                    <h2 class="accordion-header d-flex align-items-center">
                                                        <i style="cursor: ns-resize;" class="ti ti-menu-2 ti-lg me-2 sortable-icon"></i>
                                                        <button type="button" class="accordion-button d-flex justify-content-center align-items-center">
                                                            <span class="flex-fill ml-4">
                                                            {{$product->name}}
                                                        </span>
                                                        </button>
                                                        <i class="cursor-pointer ti ti-edit ti-md me-2"></i>
                                                        {!! create_html_icon_delete_button('MenuCategoryProduct', $product->id, 'Ürün', 'Ürün kaydını silmek istediğinize emin misiniz?', route('business.menu-category-product.destroy', $product->id), true) !!}
                                                    </h2>
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
