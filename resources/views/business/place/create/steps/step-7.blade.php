<hr class="my-4 mx-n4" />
<h6>7. Servis Seçenekleri</h6>
<div class="row g-3">

</div>
<div class="row g-3">
    <div class="row g-3">
        <div class="d-flex" style="max-width: 500px">
            <div class="col">
                <label>Masadan Sipariş</label>
            </div>
            <div class="col">
                <label class="switch switch-lg">
                    <input type="checkbox" class="switch-input" name="table_order">
                    <span class="switch-toggle-slider">
                    <span class="switch-on"><i class="ti ti-check"></i></span>
                    <span class="switch-off"><i class="ti ti-x"></i></span>
                </span>
                    <span class="switch-label">Kapalı</span>
                </label>
            </div>
        </div>
        <hr>
        <!-- Garson Çağır -->
        <div class="d-flex" style="max-width: 500px">
            <div class="col">
                <label>Garson Çağır</label>
            </div>
            <div class="col">
                <label class="switch switch-lg">
                    <input type="checkbox" class="switch-input" name="call_a_waiter">
                    <span class="switch-toggle-slider">
                    <span class="switch-on"><i class="ti ti-check"></i></span>
                    <span class="switch-off"><i class="ti ti-x"></i></span>
                </span>
                    <span class="switch-label">Kapalı</span>
                </label>
            </div>
        </div>
        <hr>

        <!-- Hesap İste -->
        <div class="d-flex" style="max-width: 500px">
            <div class="col">
                <label>Hesap İste</label>
            </div>
            <div class="col">
                <label class="switch switch-lg">
                    <input type="checkbox" class="switch-input" name="request_account">
                    <span class="switch-toggle-slider">
                    <span class="switch-on"><i class="ti ti-check"></i></span>
                    <span class="switch-off"><i class="ti ti-x"></i></span>
                </span>
                    <span class="switch-label">Kapalı</span>
                </label>
            </div>
        </div>
        <hr>

        <!-- Vale Çağır -->
        <div class="d-flex flex-column registerArea" style="max-width: 500px">
            <div class="d-flex flex-row">
                <div class="col">
                    <label>Vale Çağır</label>
                </div>
                <div class="col">
                    <label class="switch switch-lg">
                        <input type="checkbox" class="switch-input" name="call_a_valet" onchange="toggleCallArea(this, 'vale-call-area')">
                        <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                        <span class="switch-label">Kapalı</span>
                    </label>
                </div>
            </div>
            <div class="mt-3 callArea" id="vale-call-area" style="display: none;">
                <div class="col" style="max-width: 240px">
                    <label>Telefon Numarası</label>
                </div>
                <div class="col">
                    <input type="text" name="valet_phone" class="form-control phone" placeholder="örn. 555 555 5555">
                </div>
            </div>
        </div>
        <hr>

        <!-- Taksi Çağır -->
        <div class="d-flex flex-column registerArea" style="max-width: 500px">
            <div class="d-flex flex-row">
                <div class="col">
                    <label>Taksi Çağır</label>
                </div>
                <div class="col">
                    <label class="switch switch-lg">
                        <input type="checkbox" class="switch-input" name="call_a_taxi" onchange="toggleCallArea(this, 'taksi-call-area')">
                        <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                        <span class="switch-label">Kapalı</span>
                    </label>
                </div>
            </div>
            <div class="mt-3 callArea" id="taksi-call-area" style="display: none;">
                <div class="col" style="max-width: 240px">
                    <label>Telefon Numarası</label>
                </div>
                <div class="col">
                    <input type="text" name="taxi_phone" class="form-control phone" placeholder="örn. 555 555 5555">
                </div>
            </div>
        </div>
        <hr>

        <!-- Gel Al Siparişi -->
        <div class="d-flex flex-column registerArea" style="max-width: 500px">
            <div class="d-flex flex-row">
                <div class="col">
                    <label>Gel Al Siparişi</label>
                </div>
                <div class="col">
                    <label class="switch switch-lg">
                        <input type="checkbox" class="switch-input" name="take_away_order" onchange="toggleCallArea(this, 'gel-al-call-area')">
                        <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                        <span class="switch-label">Kapalı</span>
                    </label>
                </div>
            </div>
            <div class="mt-3 callArea" id="gel-al-call-area" style="display: none;">
                <div class="col" style="max-width: 240px">
                    <label>Telefon Numarası</label>
                </div>
                <div class="col">
                    <input type="text" name="take_away_phone" class="form-control phone" placeholder="örn. 555 555 5555">
                </div>
            </div>
        </div>
        <hr>

        <!-- Paket Siparişi -->
        <div class="d-flex flex-column registerArea" style="max-width: 500px">
            <div class="d-flex flex-row">
                <div class="col">
                    <label>Paket Siparişi</label>
                </div>
                <div class="col">
                    <label class="switch switch-lg">
                        <input type="checkbox" class="switch-input" name="package_order" onchange="toggleCallArea(this, 'paket-call-area')">
                        <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                        <span class="switch-label">Kapalı</span>
                    </label>
                </div>
            </div>
            <div class="mt-3 callArea" id="paket-call-area" style="display: none;">
                <div class="col" style="max-width: 240px">
                    <label>Telefon Numarası</label>
                </div>
                <div class="col">
                    <input type="text" name="package_order_phone" class="form-control phone" placeholder="örn. 555 555 5555">
                </div>
            </div>
        </div>
        <hr>

        <!-- Teslimat Ücreti -->
        <div class="" id="delivery_fee" style="max-width: 500px;">
            <div class="col">
                <label>Teslimat Ücreti</label>
            </div>
            <div class="col">
                <input type="number" name="delivery_fee" id="multicol-delivery-fee" class="form-control" placeholder="örn. 16">
            </div>
        </div>
    </div>

</div>
