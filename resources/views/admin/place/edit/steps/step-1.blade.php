<h6>1. Mekan Bilgileri</h6>
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Mekan Adı</label>
        <input type="text" id="multicol-username" value="{{$place->name}}" name="place_name" class="form-control" placeholder="örn. Paşa Restoran" />
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
                value="{{$place->slug}}"
                aria-describedby="multicol-email2" />

        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-country">Ana Dil</label>
        <select id="multicol-country" name="main_language" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
            <option value="tr" @selected($place->main_language == "tr")>Turkish</option>
            <option value="en" @selected($place->main_language == "en")>English</option>
            <option value="fr" @selected($place->main_language == "fr")>French</option>
            <option value="de" @selected($place->main_language == "de")>German</option>
        </select>
    </div>
    <div class="col-md-6 select2-primary">
        <label class="form-label" for="multicol-language">Diğer Diller</label>
        <select id="multicol-language" name="other_languages[]" class="select2 form-select" multiple>
            <option value="tr" @selected(in_array('tr', $place->other_languages))>Turkish</option>
            <option value="en" @selected(in_array('en', $place->other_languages))>English</option>
            <option value="fr" @selected(in_array('fr', $place->other_languages))>French</option>
            <option value="de" @selected(in_array('de', $place->other_languages))>German</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-country">Ana Para Birimi</label>
        <select id="multicol-currency" name="price_type" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
            <option value="$" @selected($place->price_type == "$")>Dollar</option>
            <option value="₺" @selected($place->price_type == "₺")>Türk Lirası</option>
            <option value="€" @selected($place->price_type == "€")>Euro</option>
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
                value="{{$place->instagram}}"
                aria-label="john.doe"
            />

        </div>
    </div>
</div>
