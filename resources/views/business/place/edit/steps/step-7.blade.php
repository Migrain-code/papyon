<hr class="my-4 mx-n4" />
<h6>7. Servis Seçenekleri</h6>
<div class="row g-3">

</div>
<div class="row g-3">
    <div class="row g-3">
        <!-- Masadan Sipariş Yeni -->
        @include('business.place.edit.steps.parts.table-order')
        @include('business.place.edit.steps.parts.call-waiter')
        @include('business.place.edit.steps.parts.call-account')
        @include('business.place.edit.steps.parts.call-vale')
        @include('business.place.edit.steps.parts.call-taxi')
        @include('business.place.edit.steps.parts.take-away-order')
        @include('business.place.edit.steps.parts.packet-order')

        <!-- Teslimat Ücreti -->
        <div class="" id="delivery_fee" style="max-width: 500px;">
            <div class="col">
                <label>Teslimat Ücreti</label>
            </div>
            <div class="col">
                <input type="number" name="delivery_fee" value="{{isset($place->services) ? $place->services->delivery_fee : 0}}" id="multicol-delivery-fee" class="form-control" placeholder="örn. 16">
            </div>
        </div>
        <!-- Gel Al indirim -->
        <div class="" id="delivery_fee" style="max-width: 500px;">
            <div class="col">
                <label>Gel Al Sipariş İndirim Oranı (Yüzdelik olarak giriş yapınız)</label>
            </div>
            <div class="col">
                <input type="number" name="take_away_discount" value="{{isset($place->services) ? $place->services->take_away_discount : 0}}" id="multicol-delivery-fee" class="form-control" placeholder="örn. 16">
            </div>
        </div>
    </div>

</div>
