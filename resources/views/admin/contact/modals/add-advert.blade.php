<!-- Edit User Modal -->
<div class="modal fade" id="addAdvertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Talep Ekle</h3>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.contact.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 mt-2">
                        <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Ad/Soyad" required>
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" name="phone" value="{{old('phone')}}" placeholder="Cep Telefonu Numarası" type="text">
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" required="" name="mail" value="{{old('mail')}}" type="email" placeholder="E-Mail Adresiniz">
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" name="subject" value="{{old('subject')}}" placeholder="Konu" type="text">
                    </div>

                    <div class="col-12 mt-2">
                        <textarea name="message" class="form-control" id="" cols="30" rows="7" placeholder="Notunuz">{{old('message')}}</textarea>
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
