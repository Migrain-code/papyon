<hr class="my-4 mx-n4" />
<h6>3. Dijital menu kurulum adımları</h6>
<div class="row g-3">
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Başlık</label>
            <input class="form-control" name="step_3_title" value="{{setting('step_3_title')}}" type="text" id="formFile">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Buton Metni</label>
            <input class="form-control" name="step_3_btn_text" value="{{setting('step_3_btn_text')}}" type="text" id="formFile">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Buton Linki</label>
            <input class="form-control" name="step_3_btn_link" value="{{setting('step_3_btn_link')}}" type="text" id="formFile">
        </div>
    </div>


    <div class="col-6">
        <div class="mb-3">
            <label for="formFile" class="form-label">Görsel Seçiniz</label>
            <input class="form-control" name="step_3_image" type="file" id="formFile">
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="formFile" class="form-label">İçerik</label>
            <textarea id="summerNote" class="summerNote" name="step_3_description">{!! setting('step_3_description') !!}</textarea>
        </div>
    </div>
</div>
