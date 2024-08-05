<hr class="my-4 mx-n4" />
<h6>3. Görseller</h6>
<div class="row g-3">
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Logo Seçiniz (500*167)</label>
            <input class="form-control" name="logo" type="file" id="formFile">
        </div>
    </div>
    <div class="col-6" style="background: #dedede; padding: 15px">
        <img src="{{storage($place->logo)}}" class="img-fluid w-100" style="max-width: 300px">
    </div>
</div>
