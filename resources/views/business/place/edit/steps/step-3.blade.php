<hr class="my-4 mx-n4" />
<h6>3. Görseller</h6>
<div class="row g-3">
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Logo Seçiniz (500*167)</label>
            <input class="form-control" name="logo" type="file" id="logoInput">
        </div>
    </div>
    <div class="col-6" style="background: #dedede; padding: 15px">
        @if(isset($place->logo))
            <img src="{{storage($place->logo)}}" class="img-fluid w-100" id="logoImage" style="max-width: 300px">
        @else
            <img src="/business/template/logo.png" class="img-fluid w-100" id="logoImage" style="max-width: 300px">

        @endif
    </div>
</div>
