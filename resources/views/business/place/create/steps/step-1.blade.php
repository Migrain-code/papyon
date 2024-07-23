<h6>1. Mekan Bilgileri</h6>
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Mekan Adı</label>
        <input type="text" id="multicol-username" name="place_name" class="form-control" placeholder="örn. Paşa Restoran" />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-email">Mekan Linki</label>
        <div class="input-group input-group-merge">
            <span class="input-group-text" id="multicol-email2">papayon.com/</span>
            <input
                type="text"
                id="placeLink"
                class="form-control"
                name="place_link"
                placeholder="john.doe"
                aria-label="john.doe"
                aria-describedby="multicol-email2" />

        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-country">Ana Dil</label>
        <select id="multicol-country" name="main_language" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
            <option value="tr" selected>Turkish</option>
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="de">German</option>
        </select>
    </div>
    <div class="col-md-6 select2-primary">
        <label class="form-label" for="multicol-language">Diğer Diller</label>
        <select id="multicol-language" name="other_languages[]" class="select2 form-select" multiple>
            <option value="tr" selected>Turkish</option>
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="de">German</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-country">Ana Para Birimi</label>
        <select id="multicol-currency" name="price_type" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
            <option value="$" selected>Dollar</option>
            <option value="₺" selected>Türk Lirası</option>
            <option value="€">Euro</option>

        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-email">Instagram</label>
        <div class="input-group">
            <input
                type="text"
                id="multicol-email"
                class="form-control"
                name="instagram"
                placeholder="örn. tolg_show"
                aria-label="john.doe"
            />

        </div>
    </div>
</div>
