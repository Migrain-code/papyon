<!-- Edit User Modal -->
<div class="modal fade" id="addAdvertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Reklam Ekle</h3>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('business.swiper-advert.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12 mt-2">
                        <label class="form-label" for="addProductQuantity">Reklam Görseli</label>
                        <div id="dropContainer" class="drop-container">
                            Dosyayı buraya sürükleyin veya seçmek için tıklayın
                        </div>
                        <input
                            type="file"
                            id="addProductQuantity"
                            name="image"
                            class="form-control"
                            style="display: none;"
                        />
                        <span id="fileName" class="ml-2"></span>
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
