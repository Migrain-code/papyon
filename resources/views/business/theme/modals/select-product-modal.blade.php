
<!-- Modal -->
<div class="modal fade" id="selectProductModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{route('business.menu.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="container my-3">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                        <div class="d-flex gap-2 align-items-center">
                            <input type="checkbox" class="form-check" value="1">
                            <img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid w-px-50 h-px-30" alt="visa-card" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png">

                            <h6 class="m-0">Ürün 1</h6>
                        </div>
                        <h6 class="m-0 d-none d-sm-block">Credit Card</h6>
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
