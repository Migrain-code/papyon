<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Kullanıcı Bilgilerini Düzenle</h3>
                    <p class="text-muted">Kullanıcı bilgilerinin güncellenmesi bir gizlilik denetimi alacaktır.</p>
                </div>
                <form id="editUserForm" class="row g-3" action="{{route('business.setting.updateInfo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Ad Soyad</label>
                        <input
                            type="text"
                            id="modalEditUserFirstName"
                            name="name"
                            class="form-control"
                            value="{{$user->name}}"
                            placeholder="John" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserLastName">Profil Fotoğrafı</label>
                        <input
                            type="file"
                            id="modalEditUserLastName"
                            name="image"
                            class="form-control"
                            placeholder="Doe" />
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserEmail">E-posta</label>
                        <input
                            type="text"
                            id="modalEditUserEmail"
                            name="email"
                            class="form-control"
                            value="{{$user->email}}"
                            placeholder="example@domain.com" />
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTaxID">Vergi Numarası / TC.</label>
                        <input
                            type="text"
                            id="modalEditTaxID"
                            name="tax_number"
                            class="form-control modal-edit-tax-id"
                            value="{{$user->tax_number}}"
                            placeholder="123 456 7890" />
                    </div>

                    <div class="col-12 col-md-12">
                        <label class="form-label" for="modalEditTaxID">Adres</label>
                        <textarea
                            type="text"
                            id="modalEditTaxID"
                            name="address"
                            class="form-control modal-edit-tax-id"
                            rows="5"
                            placeholder="" >{{$user->address}}</textarea>
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
