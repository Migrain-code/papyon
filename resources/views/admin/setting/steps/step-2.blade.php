<hr class="my-4 mx-n4" />
<h6>2. Meta Ayarları</h6>
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Genel Başlık</label>
        <input type="text" id="multicol-username" name="site_title" value="{{setting('site_title')}}" class="form-control" placeholder="" />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Meta Başlık</label>
        <input type="text" id="multicol-username" name="site_meta_title" value="{{setting('site_meta_title')}}" class="form-control" placeholder="" />
    </div>

    <div class="col-12">
        <label class="form-label" for="multicol-username">
            Meta Açıklama (<span class="text-warning">Düz Metin olarak giriş yapın</span> )
        </label>
        <textarea rows="5" name="site_meta_description" class="form-control" placeholder="">{{setting('site_meta_description')}}</textarea>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="formFile" class="form-label">Head Scriptleri</label>
            <textarea class="form-control" rows="5" name="site_head_scripts">{{setting('site_head_scripts')}}</textarea>
        </div>
    </div>


</div>
