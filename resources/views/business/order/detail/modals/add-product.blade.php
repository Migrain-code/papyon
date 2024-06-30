<!-- Edit User Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Siparişe Ürün Ekle</h3>
                    <p class="text-muted">Bu sipariş içersine yeni bir ürün ekleyin.</p>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('business.order.addProduct', $order->id)}}">
                    @csrf

                    <div class="col-12">
                            <label class="form-label" for="multicol-country">Ürün Seçiniz</label>
                            <select id="multicol-country" name="product_id" data-place-holder="Ürün Seçiniz"
                                    class="select2 form-select"
                                    data-allow-clear="true">
                                <option value="" selected>Ürün Seçiniz</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        <div class="col-12 mt-2">
                            <label class="form-label" for="addProductQuantity">Ürün Sayısı</label>
                            <input
                                type="text"
                                id="addProductQuantity"
                                name="product_qty"
                                class="form-control"
                                placeholder="5"
                                value=""
                            />
                        </div>
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
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->
