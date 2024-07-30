<hr class="my-4 mx-n4" />
<h6>6. Paketler Altındaki Ek Açıklama</h6>

<div class="row g-3">
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Başlık</label>
            <input class="form-control" name="section_6_title" value="{{setting('section_6_title')}}" type="text" id="formFile">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Görsel (600 * 500)</label>
            <input class="form-control" name="section_6_image" type="file" id="formFile">
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="formFile" class="form-label">İçerik</label>
            <textarea id="summerNote" class="summerNote" name="section_6_description">{!! setting('section_6_description') !!}</textarea>
        </div>
    </div>
</div>

