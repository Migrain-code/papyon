<div class="card mb-4">
    <h5 class="card-header">Şifre Değiştir</h5>
    <div class="card-body">
        <form id="formChangePassword" method="post" action="{{route('business.setting.updatePassword')}}">
            @csrf
            <div class="alert alert-warning" role="alert">
                <h6 class="alert-heading mb-1">Bu gereksinimlerin karşılandığından emin olun</h6>
                <span>Minimum 8 karakter uzunluğunda, büyük harf ve sembol kullanın</span>
            </div>
            <div class="row">
                <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                    <label class="form-label" for="newPassword">Yeni Şifreniz</label>
                    <div class="input-group input-group-merge">
                        <input
                            class="form-control"
                            type="password"
                            id="newPassword"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye ti-xs"></i></span>
                    </div>
                </div>

                <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                    <label class="form-label" for="confirmPassword">Yeni Şifre Tekrar</label>
                    <div class="input-group input-group-merge">
                        <input
                            class="form-control"
                            type="password"
                            name="password_confirmation"
                            id="confirmPassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye ti-xs"></i></span>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2">Şifremi Güncelle</button>
                </div>
            </div>
        </form>
    </div>
</div>
