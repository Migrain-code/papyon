<div class="card mb-4">
    <h5 class="card-header">İki adımlı doğrulama</h5>
    <div class="card-body">
        <p class="mb-0">Kimlik doğrulama adımı ile hesabınızı güvende tutun.</p>
        <h6 class="mt-4">SMS</h6>
        <div class="d-flex justify-content-between border-bottom mb-4 pb-2">
           <form method="post" action="{{route('business.setting.twoFactorActive')}}">
               @csrf
               <button type="submit" class="btn btn-primary">Aktif Et</button>
           </form>
            <form method="post" action="{{route('business.setting.disableTwoFactor')}}">
                @csrf
                <button type="submit" class="btn btn-primary">Pasif Et</button>
            </form>
            {{--
                <span>+90 5537021355</span>
            <div class="action-icons">
                <a
                    href="javascript:;"
                    class="text-body me-1"
                    data-bs-target="#enableOTP"
                    data-bs-toggle="modal"
                >
                    <i class="ti ti-edit"></i></a>
                <a href="javascript:;" class="text-body"><i class="ti ti-trash"></i></a>
            </div>
            --}}
        </div>
        <p class="mb-0">
            İki faktörlü kimlik doğrulama, hesabınıza ek bir güvenlik katmanı ekleyerek daha fazla <br>
            giriş yapmak için sadece bir paroladan daha fazlası.
        </p>
    </div>
</div>
