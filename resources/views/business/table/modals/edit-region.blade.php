
<!-- Modal -->
<div class="modal fade" id="editRegionModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" id="editRegionForm" method="post" action="">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Bölge Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col mb-4">
                            <label for="nameBasic" class="form-label">Bölge Adı</label>
                            <input type="text" id="nameBasic" name="region_new_name" class="form-control" placeholder="Örn. Teras">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
