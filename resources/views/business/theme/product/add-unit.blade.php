
<!-- Modal -->
<div class="modal fade" id="addUnitModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalTitle">Birim Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameBasic" class="form-label">Birim Adı</label>
                        <input type="text" id="nameBasic" name="unit_name" class="form-control" placeholder="Örn. Menü 1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" id="unitSubmitButton" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
