<!-- Garson Çağır Yeni -->
<div class="d-flex flex-column registerArea" style="max-width: 500px">
    <div class="d-flex flex-row">
        <div class="col">
            <label>Garson Çağır</label>
        </div>
        <div class="col">
            <label class="switch switch-lg">
                <input type="checkbox" class="switch-input" name="call_a_waiter" @checked(isset($place->services) && $place->services->call_a_waiter) onchange="toggleCallArea(this, 'waiter-call-area')">
                <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                <span class="switch-label">@if(isset($place->services) && $place->services->call_a_waiter) Aktif @else Kapalı @endif</span>
            </label>
        </div>
    </div>
    <div class="mt-3 callArea" id="waiter-call-area" @if(isset($place->services) && $place->services->call_a_waiter) style="display: block;" @else style="display: none;" @endif >
        <div class="col" style="max-width: 240px">
            <label>Telefon Numarası</label>
        </div>
        <div class="col">
            <input type="text" name="call_a_waiter_phone" value="{{isset($place->services) ? $place->services->call_a_waiter_phone :""}}" class="form-control phone" placeholder="örn. 555 555 5555">
        </div>
    </div>
</div>
<hr>
<!-- Hesap İste Yeni -->
<div class="d-flex flex-column registerArea" style="max-width: 500px">
    <div class="d-flex flex-row">
        <div class="col">
            <label>Hesap İste</label>
        </div>
        <div class="col">
            <label class="switch switch-lg">
                <input type="checkbox" class="switch-input" name="request_account" @checked(isset($place->services) && $place->services->request_account) onchange="toggleCallArea(this, 'wallet-call-area')">
                <span class="switch-toggle-slider">
                            <span class="switch-on"><i class="ti ti-check"></i></span>
                            <span class="switch-off"><i class="ti ti-x"></i></span>
                        </span>
                <span class="switch-label">Kapalı</span>
            </label>
        </div>
    </div>
    <div class="mt-3 callArea" id="wallet-call-area" @if(isset($place->services) && $place->services->request_account) style="display: block;" @else style="display: none;" @endif>
        <div class="col" style="max-width: 240px">
            <label>Telefon Numarası</label>
        </div>
        <div class="col">
            <input type="text" name="request_account_phone" value="{{isset($place->services) ? $place->services->request_account_phone : ""}}" class="form-control phone" placeholder="örn. 555 555 5555">
        </div>
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
                <input type="checkbox" class="switch-input" name="call_a_valet" @checked(isset($place->services) && $place->services->call_a_valet) onchange="toggleCallArea(this, 'vale-call-area')">
                <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                <span class="switch-label">Kapalı</span>
            </label>
        </div>
    </div>
    <div class="mt-3 callArea" id="vale-call-area" @if(isset($place->services) && $place->services->call_a_valet) style="display: block;" @else style="display: none;" @endif >
        <div class="col" style="max-width: 240px">
            <label>Telefon Numarası</label>
        </div>
        <div class="col">
            <input type="text" name="valet_phone" value="{{isset($place->services) ? $place->services->valet_phone : ""}}" class="form-control phone" placeholder="örn. 555 555 5555">
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
                <input type="checkbox" class="switch-input" name="call_a_taxi" @checked(isset($place->services) && $place->services->call_a_taxi) onchange="toggleCallArea(this, 'taksi-call-area')">
                <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                <span class="switch-label">Kapalı</span>
            </label>
        </div>
    </div>
    <div class="mt-3 callArea" id="taksi-call-area" @if(isset($place->services) && $place->services->call_a_taxi) style="display: block;" @else style="display: none;" @endif>
        <div class="col" style="max-width: 240px">
            <label>Telefon Numarası</label>
        </div>
        <div class="col">
            <input type="text" name="taxi_phone" value="{{isset($place->services) ? $place->services->taxi_phone : ""}}" class="form-control phone" placeholder="örn. 555 555 5555">
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
                <input type="checkbox" class="switch-input" name="package_order" @checked(isset($place->services) && $place->services->package_order) onchange="toggleCallArea(this, 'paket-call-area')">
                <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                <span class="switch-label">Kapalı</span>
            </label>
        </div>
    </div>
    <div class="mt-3 callArea" id="paket-call-area" @if(isset($place->services) && $place->services->package_order)  style="display: block;" @else  style="display: none;" @endif>
        <div class="col" style="max-width: 240px">
            <label>Telefon Numarası</label>
        </div>
        <div class="col">
            <input type="text" name="package_order_phone" value="{{isset($place->services) ? $place->services->package_order_phone : ""}}" class="form-control phone" placeholder="örn. 555 555 5555">
        </div>
    </div>
</div>
<hr>
