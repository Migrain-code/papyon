<hr class="my-4 mx-n4" />
<h6>2. Menü Şablonu</h6>
<div class="row g-3">
    <!-- Custom Option Checkbox Image -->
    <div class="row p-3">
        @foreach($templates as $template)
            <div class="col-2 mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-image custom-option-image-check">
                    <input class="form-check-input" @checked($place->theme_id == $template->id) name="theme_id" type="radio" value="{{$template->id}}" id="customCheckboxImg{{$template->id}}" checked />
                    <label class="form-check-label custom-option-content" for="customCheckboxImg{{$template->id}}">
                                          <span class="custom-option-body">
                                            <img src="{{storage($template->image)}}" alt="cbImg" />
                                          </span>
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /Custom Option Checkbox Image -->
</div>
