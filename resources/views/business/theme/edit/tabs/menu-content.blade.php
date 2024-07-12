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
                        @forelse($menuOrders as $menuOrder)
                            <div id="handle-list-1" class="accordion mt-3">
                                <div data-id="{{$menuOrder->id}}" class="card accordion-item" style="position: relative; top: 0px; left: 0px;">
                                    <h2 class="accordion-header d-flex align-items-center">
                                        <i style="cursor: ns-resize;" class="ti ti-menu-2 ti-lg me-2 sortable-icon"></i>
                                        <button type="button" class="accordion-button d-flex justify-content-center align-items-center collapsed" aria-expanded="false">
                                                <span class="flex-fill ml-4">
                                                   {{$menuOrder->name}}
                                                </span>
                                        </button>
                                    </h2>
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
