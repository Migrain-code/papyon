<hr class="my-4 mx-n4" />
<h6>7. Servis Seçenekleri</h6>
<div class="row g-3">

</div>
<div class="row g-3">
    <div class="row g-3">
        <!-- Masadan Sipariş Yeni -->
        <div class="d-flex d-flex flex-column">
            <div class="registerArea" style="max-width: 490px">
                <div class="d-flex flex-row">
                    <div class="col">
                        <label>Masadan Sipariş</label>
                    </div>
                    <div class="col">
                        <label class="switch switch-lg">
                            <input type="checkbox" @checked(isset($place->services) && $place->services->table_order) class="switch-input" name="table_order" onchange="toggleCallArea(this, 'table-order-area')">
                            <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                            <span class="switch-label">Kapalı</span>
                        </label>
                    </div>
                </div>
                <div class="callArea " id="table-order-area" @if(isset($place->services) && $place->services->table_order) style="display: block" @else style="display: none" @endif >
                    <div class="d-flex flex-row justify-content-start my-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" @checked(isset($place->services) && $place->services->order_type == 0) data-disable="true" type="radio" name="order_type" id="inlineRadio1" value="0" />
                            <label class="form-check-label" for="inlineRadio1">Sipariş Ver</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" @checked(isset($place->services) && $place->services->order_type == 1) data-disable="false" type="radio" name="order_type" id="inlineRadio1" value="1" />
                            <label class="form-check-label" for="inlineRadio1">Whatsapp Sipariş</label>
                        </div>
                    </div>

                </div>
                <div class="callArea2" id="table-phone-area" @if(isset($place->services) && $place->services->order_type == 1) style="display: block" @else style="display: none" @endif >

                    <div class="col" style="max-width: 240px">
                        <label>Telefon Numarası</label>
                    </div>
                    <div class="col">
                        <input type="text" name="table_phone" value="{{isset($place->services) ? $place->services->table_phone : ""}}" class="form-control phone" placeholder="örn. 555 555 5555">
                    </div>
                </div>
            </div>

        </div>
        <hr>

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

        <!-- Gel Al Siparişi -->
        <div class="d-flex flex-column registerArea" style="max-width: 500px">
            <div class="d-flex flex-row">
                <div class="col">
                    <label>Gel Al Siparişi</label>
                </div>
                <div class="col">
                    <label class="switch switch-lg">
                        <input type="checkbox" class="switch-input" name="take_away_order" @checked(isset($place->services) && $place->services->take_away_order) onchange="toggleCallArea(this, 'gel-al-call-area')">
                        <span class="switch-toggle-slider">
                        <span class="switch-on"><i class="ti ti-check"></i></span>
                        <span class="switch-off"><i class="ti ti-x"></i></span>
                    </span>
                        <span class="switch-label">Kapalı</span>
                    </label>
                </div>
            </div>
            <div class="mt-3 callArea" id="gel-al-call-area" @if(isset($place->services) && $place->services->take_away_order) style="display: block;" @else style="display: none;" @endif>
                <div class="col" style="max-width: 240px">
                    <label>Telefon Numarası</label>
                </div>
                <div class="col">
                    <input type="text" name="take_away_phone" value="{{isset($place->services) ? $place->services->take_away_phone :""}}" class="form-control phone" placeholder="örn. 555 555 5555">
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

        <!-- Teslimat Ücreti -->
        <div class="" id="delivery_fee" style="max-width: 500px;">
            <div class="col">
                <label>Teslimat Ücreti</label>
            </div>
            <div class="col">
                <input type="number" name="delivery_fee" value="{{isset($place->services) ? $place->services->delivery_fee : 0}}" id="multicol-delivery-fee" class="form-control" placeholder="örn. 16">
            </div>
        </div>
    </div>

</div>
