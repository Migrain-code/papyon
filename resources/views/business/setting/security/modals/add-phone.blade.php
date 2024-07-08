<!-- Enable OTP Modal -->
<div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Tek Kullanımlık Parolayı Etkinleştir</h3>
                    <p>Cep Telefonu Numaranızı Doğrulayın</p>
                </div>
                <p>Cep telefonu girin ve size bir doğrulama kodu gönderelim.</p>
                <form id="enableOTPForm" class="row g-3" method="post" action="{{route('business.setting.twoFactorActive')}}">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" for="modalEnableOTPPhone">Telefon Numaranız</label>
                        <div class="input-group">

                            <input
                                type="text"
                                id="modalEnableOTPPhone"
                                name="phone"
                                class="form-control phone-number-otp-mask"
                                value="{{$user->phone}}"
                                placeholder="202 555 0111" />
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
                        <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Enable OTP Modal -->
