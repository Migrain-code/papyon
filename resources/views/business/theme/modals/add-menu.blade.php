
<!-- Modal -->
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{route('business.menu.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Menu Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameBasic" class="form-label">Menü Adı</label>
                        <input type="text" id="nameBasic" name="name" class="form-control" placeholder="Örn. Menü 1">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameBasic" class="form-label">Menü Görseli</label>
                        <input type="file" id="nameBasic" name="menu_image" class="form-control" placeholder="">
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