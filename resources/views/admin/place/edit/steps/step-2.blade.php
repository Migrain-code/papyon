<hr class="my-4 mx-n4" />
<h6>2. Menü Şablonu</h6>
<div class="row g-3">
    <!-- Custom Option Checkbox Image -->
    <div class="row p-3">
        <div class="col-2 mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-image custom-option-image-check">
                <input class="form-check-input" @checked($place->theme_id == 1) name="theme_id" type="radio" value="1" id="customCheckboxImg1" checked />
                <label class="form-check-label custom-option-content" for="customCheckboxImg1">
                                          <span class="custom-option-body">
                                            <img src="/business/assets/img/themes/menu1.jpg" alt="cbImg" />
                                          </span>
                </label>
            </div>
        </div>
        <div class="col-2 mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-image custom-option-image-check">
                <input class="form-check-input" @checked($place->theme_id == 2) name="theme_id" type="radio" value="2" id="customCheckboxImg2" />
                <label class="form-check-label custom-option-content" for="customCheckboxImg2">
                                              <span class="custom-option-body">
                                               <img src="/business/assets/img/themes/menu1.jpg" alt="cbImg" />
                                              </span>
                </label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-check custom-option custom-option-image custom-option-image-check">
                <input class="form-check-input" @checked($place->theme_id == 3) name="theme_id" type="radio" value="3" id="customCheckboxImg3" />
                <label class="form-check-label custom-option-content" for="customCheckboxImg3">
                                              <span class="custom-option-body">
                                                <img src="/business/assets/img/themes/menu1.jpg" alt="cbImg" />
                                              </span>
                </label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-check custom-option custom-option-image custom-option-image-check">
                <input class="form-check-input" @checked($place->theme_id == 4) name="theme_id" type="radio" value="4" id="customCheckboxImg3" />
                <label class="form-check-label custom-option-content" for="customCheckboxImg3">
                                              <span class="custom-option-body">
                                                <img src="/business/assets/img/themes/menu1.jpg" alt="cbImg" />
                                              </span>
                </label>
            </div>
        </div>
    </div>
    <!-- /Custom Option Checkbox Image -->
</div>