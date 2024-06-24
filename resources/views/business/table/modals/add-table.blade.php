
<!-- Modal -->
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{route('business.table.store')}}">
            @csrf
            <input type="hidden" name="region_id" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Masa Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-tabs nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-home" aria-controls="navs-top-home"
                                    aria-selected="true">Tekli Masa</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-top-profile"
                                    aria-controls="navs-top-profile" aria-selected="false">Çoklu Masa</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                            <div class="row">
                                <div class="col mb-4">
                                    <label for="nameBasic" class="form-label">Masa Adı</label>
                                    <input type="text" id="nameBasic" name="table_single" class="form-control" placeholder="Örn. Masa 1">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                            <div class="row">
                                <div class="col mb-4">
                                    <label for="nameBasic" class="form-label">Masa Adı</label>
                                    <input type="text" id="nameBasic" name="table_multi" class="form-control" placeholder="Örn. Masa">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-4">
                                    <label for="nameBasic" class="form-label">Masa Sayısı</label>
                                    <input type="text" id="nameBasic" name="table_count" class="form-control" placeholder="Örn. 5">
                                </div>
                            </div>
                        </div>
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
