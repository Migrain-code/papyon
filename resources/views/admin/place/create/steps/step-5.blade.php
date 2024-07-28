<hr class="my-4 mx-n4" />
<h6>5. Konum & Harita</h6>
<div class="row">
    <div class="col">
        <input type="search" name="searchInput" id="searchInput" class="form-control mb-3"  placeholder="Adresinizi yazarak arayabilirsiniz">

    </div>
</div>
<div class="row g-3">
    <div id="map-container" style="position: relative;">
        <div id="map" style="height: 400px;"></div>
    </div>
    <input type="hidden" name="latitude" id="latitude" value="">
    <input type="hidden" name="longitude" id="longitude" value="">
</div>
<div class="row mt-4 fv-row">
    <label class="d-flex align-items-center form-label mb-3">
        İşletmenizin Açık Adresi
    </label>
    <textarea class="form-control" name="address" id="address" rows="6"></textarea>
    <input type="hidden" id="embed" name="embed" value="">
</div>
