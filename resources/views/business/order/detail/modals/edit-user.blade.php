<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Müşteri Bilgilerini Düzenle</h3>
                    <p class="text-muted">Kullanıcı Bilgilerini eğer kullanıcı yanlış girmiş ise düzenlemenizi tavsiye ederiz.</p>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('business.order.update', $order->id)}}" onsubmit="return false">
                    @csrf
                    @method('PUT')
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Ad Soyad</label>
                        <input
                            type="text"
                            id="modalEditUserFirstName"
                            name="modalEditUserFirstName"
                            class="form-control"
                            placeholder="John"
                            value="{{$order->name}}"
                        />
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserPhone">Telefon Numarası</label>
                        <input
                            type="text"
                            id="modalEditUserPhone"
                            name="modalEditUserPhone"
                            class="form-control phone-number-mask"
                            placeholder="555 555 0111"
                            value="{{$order->phone}}"
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
