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
