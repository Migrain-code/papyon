<!-- Edit User Modal -->
<div class="modal fade" id="addAdvertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Kategori Ekle</h3>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.blogCategory.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 mt-2">
                        <label class="form-label" for="addProductQuantity">Başlık</label>
                        <input
                            type="text"
                            id="addProductQuantity"
                            name="title"
                            class="form-control"

                        />
                    </div>

                    <div class="col-12 mt-2">
                        <label class="form-label" for="addProductQuantity">Meta Başlık</label>
                        <input
                            type="text"
                            id="addProductQuantity"
                            name="meta_title"
                            class="form-control"

                        />
                    </div>
                    <div class="col-12 mt-2">
                        <label class="form-label" for="addProductQuantity">Meta Açıklama</label>
                        <textarea
                            type="text"
                            id="addProductQuantity"
                            name="meta_description"
                            class="form-control"
                            rows="5"
                        ></textarea>
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