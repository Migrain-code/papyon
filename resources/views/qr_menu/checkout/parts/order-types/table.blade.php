<div class="otherInfos">
    <form id="orderCreateForm" method="post" action="{{route('order.create', $place->slug)}}">
        @csrf
        <div class="title">{{ __('Doğrulama Kodu Belirleyin') }}</div>

        <div class="formItem">
            <input type="text" name="verify_code" placeholder="Sipariş Durumunu Bu Kod İle Kontrol Edeceksiniz">
        </div>
        <div class="title">{{ __('Sipariş Notu') }}</div>
        <input type="hidden" name="order_type_id" value="1">

        <div class="formItem">
            <textarea class="" name="order_note" placeholder="Sipariş Notunuzu Buraya Yazınız" id="" cols="30" rows="10"></textarea>
        </div>
    </form>
</div>
<div class="bottomsaw">
    <div>
        @if(isset($place->services->table_phone))
            <button class="orderCreateButton" onclick="$('#orderCreateForm').submit()">
                <i class="ti ti-brand-whatsapp"></i>
                {{ __('Whatsapp İle Sipariş') }}
            </button>
        @else
            <button class="orderCreateButton" style="background-color: var(--theme-background-color);min-width: 185px;" onclick="$('#orderCreateForm').submit()">
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
