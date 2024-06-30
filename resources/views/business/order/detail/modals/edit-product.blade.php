<!-- Edit User Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Ürün Bilgilerini Düzenle</h3>
                    <p class="text-muted">Ürün Bilgilerini eğer kullanıcı yanlış işlem yapmış ise düzenlemenizi tavsiye ederiz.</p>
                </div>
                <form id="editUserForm" class="row g-3" method="get" action="{{route('business.order.edit', $order->id)}}">
                    @csrf
                    <input type="hidden" name="product_id" value="">
                    <div class="col-12">
                        <label class="form-label" for="editProductQuantity">Ürün Sayısı</label>
                        <input
                            type="text"
                            id="editProductQuantity"
                            name="product_quantity"
                            class="form-control"
                            placeholder="5"
                            value=""
                        />
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
