<div class="dialogModal">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close closeButton" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="message">
                        @if(isset($place->wifi))
                            <img src="{{generateWifiQrCode($place->wifi->name,$place->wifi->pass)}}" class="w-100 mb-3">
                            {{__(" Wifi Adı")}} : <b> {{ $place->wifi->name }}</b> <br>
                            {{__(" Wifi Şifre")}} : <b> {{ $place->wifi->pass }}</b>
                            <button class="btn btn-primary mt-2">Şifreyi Kopyala</button>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="dialogModal languageModal">
    <div class="modal fade" id="languageModal" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close closeButton" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding-top: 0px">
                    <div class="d-flex justify-content-center">
                        <h3 style="color: #626262">{{__("Dil Seçiniz")}}</h3>
                    </div>
                    <div class="languages">
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
