<!-- Edit User Modal -->
<div class="modal fade" id="editProductDiscount" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Siparişe İndirim Uygula</h3>
                    <p class="text-muted">Ürüne vereceğiniz indirim tutarı yüzdelik veri olacaktır. 0-100 arasında seçim yapmanız gerekmektedir</p>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('business.order.discount.update', $order->id)}}">
                    @csrf

                    <div class="col-12">
                        <label class="form-label" for="editDiscountLabel">Yüzde Kaç İndirim Uygulanacak</label>
                        <input
                            type="number"
                            id="editDiscountLabel"
                            name="discount_per"
                            class="form-control"
                            placeholder="5"
                            min="0"
                            max="100"
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
