<form action="{{route('order.create', $place->slug)}}" id="packetOrderForm" method="post">
    @csrf
<div class="orderType">
    <div class="title">{{ __('Sipariş Tipi') }}</div>
    <div class="orderType_selection">
        @if ($place->services->take_away_order) {{-- Gel Al Sipariş --}}
        <div class="paymentType">
            <input type="radio"
                   value="2" name="order_type_id" data-discount="5" id="orderType_selection1">
            <label for="orderType_selection1">{{ __('Gel Al Sipariş') }} <span>%5
                                {{ __('İndirim') }}</span></label>
        </div>
        @endif
        @if ($place->services->package_order)
            <div class="paymentType">
                <input type="radio"
                       value="0" name="order_type_id" data-discount="0" checked id="orderType_selection2">
                <label for="orderType_selection2" >{{ __('Paket Sipariş') }} </label>
            </div>
        @endif
    </div>
    <div class="title">{{ __('Ödeme Tipi') }}</div>
    <div class="paymentType_selection">
        <div class="paymentType">
            <input type="radio" value="0"
                   name="payment_type_id" id="paymentType_selection1">
            <label for="paymentType_selection1">Nakit </label>
        </div>
        <div class="paymentType">
            <input type="radio" value="1"
                   name="payment_type_id" checked id="paymentType_selection2">
            <label for="paymentType_selection2">Kredi Kartı </label>
        </div>
    </div>

</div>

<div class="otherInfos">
        <div class="title" style="margin-left: 5px;">{{ __('Diğer Bilgiler') }}</div>
        <div class="formItem">
            <input type="text" name="name" placeholder="İsim / Soyisim">
            <input type="text" name="phone" class="" placeholder="+90">
        </div>

        <div class="formItem">
              <textarea name="address" class="" placeholder="Adres" id="" cols="30" rows="5"></textarea>
        </div>
        <div class="title">{{ __('Sipariş Notu') }}</div>
        <div class="formItem">
              <textarea class="" name="order_note" placeholder="Sipariş Notunuzu Buraya Yazınız" id="" cols="30" rows="6"></textarea>
        </div>
</div>
</form>
<div class="bottomsaw">
    <div>
        @if(isset($place->services->table_phone))
            <button class="orderCreateButton" onclick="$('#packetOrderForm').submit()">
                <i class="ti ti-brand-whatsapp"></i>
                {{ __('Whatsapp İle Sipariş') }}
            </button>
        @else
            <button class="orderCreateButton" style="background-color: var(--theme-background-color);min-width: 185px;" onclick="$('#packetOrderForm').submit()">
                <i class="ti ti-shopping-bag"></i>
                {{ __('Sipariş Ver') }}
            </button>
        @endif


    </div>
    <div>
        <span>Powered By</span>
        <h4>Papyoon</h4>
    </div>
</div>
