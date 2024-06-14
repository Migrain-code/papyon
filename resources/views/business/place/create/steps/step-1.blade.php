<h6>1. Mekan Bilgileri</h6>
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Mekan Adı</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="örn. Paşa Restoran" />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-email">Mekan Linki</label>
        <div class="input-group input-group-merge">
            <span class="input-group-text" id="multicol-email2">papayon.com/</span>
            <input
                type="text"
                id="multicol-email"
                class="form-control"
                placeholder="john.doe"
                aria-label="john.doe"
                aria-describedby="multicol-email2" />

        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-country">Ana Dil</label>
        <select id="multicol-country" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
            <option value="en" selected>English</option>
            <option value="fr" selected>French</option>
            <option value="de">German</option>
            <option value="pt">Portuguese</option>
        </select>
    </div>
    <div class="col-md-6 select2-primary">
        <label class="form-label" for="multicol-language">Diğer Diller</label>
        <select id="multicol-language" class="select2 form-select" multiple>
            <option value="en" selected>English</option>
            <option value="fr" selected>French</option>
            <option value="de">German</option>
            <option value="pt">Portuguese</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-country">Ana Para Birimi</label>
        <select id="multicol-currency" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
            <option value="en" selected>Dollar</option>
            <option value="fr" selected>Türk Lirası</option>
            <option value="de">Euro</option>

        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-email">Instagram</label>
        <div class="input-group">
            <input
                type="text"
                id="multicol-email"
                class="form-control"
                placeholder="örn. tolg_show"
                aria-label="john.doe"
            />

        </div>
    </div>
</div>
