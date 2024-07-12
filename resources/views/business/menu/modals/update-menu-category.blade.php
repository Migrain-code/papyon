
<!-- Modal -->
<div class="modal fade" id="updateMenuCategoryModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="backDropModalTitle">Kategori Düzenle</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="row">
                       <div class="col mb-4">
                           <label for="nameBasic" class="form-label">Kategori Adı</label>
                           <input type="text" id="nameBasic" name="category_name" class="form-control" placeholder="Örn. Menü 1">
                       </div>
                   </div>
                    <div id="allImageInputContainer" style="display: block">
                        <div class="row">
                            <label class="switch switch-lg mb-4">
                                <input type="checkbox" class="switch-input" id="categoryImageCheck">
                                <span class="switch-toggle-slider">
                                <span class="switch-on"><i class="ti ti-check"></i></span>
                                <span class="switch-off"><i class="ti ti-x"></i></span>
                            </span>
                                <span class="switch-label">Görselli Kategori</span>
                            </label>

                        </div>
                        <div class="row" style="display: none" id="updateImageInputContainer">

                            <div class="col mb-4">
                                <label for="categoryImage" class="form-label">Kategori Görseli</label>
                                <input type="file" id="updateCategoryImage" name="update_category_image" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Kapat</button>
                   <button type="button" id="categoryUpdateButton" class="btn btn-primary">Kaydet</button>
               </div>
           </div>
    </div>
</div>
