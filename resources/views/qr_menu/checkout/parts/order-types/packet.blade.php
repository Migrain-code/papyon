<div class="orderType">
    <div class="title">{{ __('Sipariş Tipi') }}</div>
    <div class="orderType_selection @if ($errors->has('orderDetails.orderType')) error @endif">
        @if (true) {{-- Gel Al Sipariş --}}
        <div class="paymentType">
            <input type="radio"
                   value="takeOrder" name="orderType_selection" id="orderType_selection1">
            <label for="orderType_selection1">{{ __('Gel Al Sipariş') }} <span>%5
                                {{ __('İndirim') }}</span></label>
        </div>
        @endif
        @if (true)
            <div class="paymentType">
                <input type="radio"
                       value="packageOrder" name="orderType_selection" id="orderType_selection2">
                <label for="orderType_selection2">{{ __('Paket Sipariş') }} </label>
            </div>
        @endif
    </div>
    <div class="title">{{ __('Ödeme Tipi') }}</div>
    <div class="paymentType_selection">
        <div class="paymentType">
            <input type="radio" value="cash"
                   name="paymentType_selection" id="paymentType_selection1">
            <label for="paymentType_selection1">Nakit </label>
        </div>
        <div class="paymentType">
            <input type="radio" value="creditCard"
                   name="paymentType_selection" id="paymentType_selection2">
            <label for="paymentType_selection2">Kredi Kartı </label>
        </div>
    </div>

</div>

<div class="otherInfos">
    <form action="">
        <div class="title" style="margin-left: 5px;">{{ __('Diğer Bilgiler') }}</div>
        <div class="formItem">
            <input type="text" placeholder="İsim / Soyisim">
            <input type="text" class="" placeholder="+90">
        </div>

        <div class="formItem">
              <textarea name="" class="" placeholder="Adres" id="" cols="30" rows="5"></textarea>
        </div>
        <div class="title">{{ __('Sipariş Notu') }}</div>
        <div class="formItem">
              <textarea class="" name="" placeholder="Sipariş Notunuzu Buraya Yazınız" id="" cols="30" rows="6"></textarea>
        </div>
    </form>

</div>

<div class="bottomsaw">
    <div class="orderCreateButton">
        <button>
            <a style="color:white;" @if (true) href="tel:{{ "asd" }}" @endif>
                <svg xmlns="http://www.w3.org/2000/svg" width="37.783" height="35.18"
                     viewBox="0 0 37.783 35.18">
                    <g id="Group_2582" data-name="Group 2582" transform="translate(-9674.209 -11219.045)">
                        <g id="Group_2581" data-name="Group 2581">
                            <path id="Path_2862" data-name="Path 2862"
                                  d="M9681.218,11219.13c1.5-.393,2.251.626,2.81,2.075.833,2.163,1.746,4.3,2.664,6.424a1.9,1.9,0,0,1-.17,2.057c-.752,1-1.477,2.024-2.267,2.992a1.435,1.435,0,0,0-.127,1.852,25.547,25.547,0,0,0,12.8,11.017,1.456,1.456,0,0,0,1.876-.449c.931-1.16,1.9-2.289,2.79-3.479a1.416,1.416,0,0,1,1.886-.607c2.666,1.245,5.322,2.512,7.957,3.82a1.262,1.262,0,0,1,.547.934c.077,2.766-.724,5.088-3.2,6.693a11.207,11.207,0,0,1-9.592,1.223c-8.488-2.363-14.93-7.548-20.1-14.5-1.857-2.5-3.64-5.042-4.437-8.11a10.5,10.5,0,0,1,2.176-10.1C9678.245,11219.331,9678.766,11219.1,9681.218,11219.13Z"
                                  fill="#f3f3f1" />
                        </g>
                    </g>
                </svg>
                {{ __('Telefonla Sipariş') }}
            </a>
        </button>
        @if (true)
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="51.175" height="51.391"
                     viewBox="0 0 51.175 51.391">
                    <g id="Group_2578" data-name="Group 2578" transform="translate(-10167.08 -11210.955)">
                        <g id="Group_2576" data-name="Group 2576">
                            <path id="Path_2844" data-name="Path 2844"
                                  d="M10167.08,11262.346c.548-2,1.071-3.9,1.591-5.806.635-2.321,1.276-4.64,1.888-6.967a1.179,1.179,0,0,0-.091-.794,25.363,25.363,0,0,1,3.276-29.267,24.541,24.541,0,0,1,16.671-8.451,25.479,25.479,0,1,1,1.8,50.846,25.052,25.052,0,0,1-11.294-2.9,1.149,1.149,0,0,0-.751-.062q-6.264,1.619-12.518,3.267C10167.5,11262.251,10167.345,11262.284,10167.08,11262.346Zm6.122-6.058c.165-.036.248-.051.33-.073,2.31-.6,4.623-1.2,6.927-1.825a1.663,1.663,0,0,1,1.4.182,20.558,20.558,0,0,0,19.3,1.275,21.176,21.176,0,0,0-7.354-40.592,21.2,21.2,0,0,0-18.771,32.742,1.149,1.149,0,0,1,.157,1.04C10174.519,11251.42,10173.877,11253.813,10173.2,11256.288Z"
                                  fill="#f3f3f1" />
                        </g>
                        <g id="Group_2577" data-name="Group 2577">
                            <path id="Path_2845" data-name="Path 2845"
                                  d="M10184.62,11224.662c1.027-.27,1.54.428,1.922,1.419.57,1.479,1.194,2.938,1.822,4.394a1.3,1.3,0,0,1-.116,1.407c-.514.686-1.01,1.384-1.55,2.047a.98.98,0,0,0-.087,1.267,17.467,17.467,0,0,0,8.758,7.535,1,1,0,0,0,1.283-.308c.636-.793,1.3-1.565,1.907-2.38a.969.969,0,0,1,1.29-.415c1.823.853,3.641,1.718,5.442,2.613a.86.86,0,0,1,.374.639,4.83,4.83,0,0,1-2.191,4.578,7.663,7.663,0,0,1-6.561.836c-5.806-1.616-10.211-5.162-13.749-9.92a16.324,16.324,0,0,1-3.035-5.548,7.189,7.189,0,0,1,1.488-6.911C10182.587,11224.8,10182.943,11224.639,10184.62,11224.662Z"
                                  fill="#f3f3f1" />
                        </g>
                    </g>
                </svg>
                {{ __('Whatsapp ile Sipariş') }}</button>
        @endif
    </div>
    <div>
        <span>Powered By</span>
        <h4>Papyoon</h4>
    </div>
</div>
