<div class="card mb-4">
    <h5 class="card-header">İki adımlı doğrulama</h5>
    <div class="card-body">

        @if($user->two_factor_secret)
            <div class="mt-4 d-flex align-items-center justify-content-between">
                <h6>SMS</h6>
                <div class="alert alert-success">Aktif</div>
            </div>

            <form class="d-flex justify-content-between border-bottom mb-4 pb-2" method="post" id="deleteForm" action="{{route('business.setting.disableTwoFactor')}}">

                @csrf
                <div>+90 {{formatPhone($user->phone)}}</div>
                <div class="action-icons">
                    <a
                        href="javascript:;"
                        class="text-body me-1"
                        data-bs-target="#enableOTP"
                        data-bs-toggle="modal"
                    >
                        <i class="ti ti-edit"></i></a>
                    <a href="javascript:;" onclick="$('#deleteForm').submit()" class="text-body"><i class="ti ti-trash"></i></a>
                </div>
            </form>
        @else
            <div class="card mb-4 bg-gradient-primary">
                <div class="card-body">
                    <div class="row justify-content-between mb-3">
                        <div class="col-md-12 col-lg-7 col-xl-12 col-xxl-7 text-center text-lg-start text-xl-center text-xxl-start order-1 order-lg-0 order-xl-1 order-xxl-0">
                            <h4 class="card-title text-white text-nowrap">İki Adımlı Doğrulamayı Aktif Et</h4>
                            <p class="card-text text-white">
                                Kimlik doğrulama adımı ile hesabınızı güvende tutun.
                                <br>
                                <a href="#" class="nav-link">İki Adımlı Doğrulama Nedir</a>
                                <br> <a href="#" class="nav-link">İki Adımlı Doğrulamayı Neden Kullanmalıyım</a>
                            </p>
                        </div>
                        <span class="col-md-12 col-lg-5 col-xl-12 col-xxl-5 text-center mx-auto mx-md-0 mb-2">
                            <img src="/business/assets/img/project/svgs/check-circle.svg" style="color: white"
                                 class="w-px-75 m-2" alt="3dRocket">
                        </span>
                    </div>
                    <button class="btn btn-white text-primary w-100 fw-medium shadow-md waves-effect waves-light" data-bs-target="#enableOTP" data-bs-toggle="modal">
                        Aktif Et
                    </button>
                </div>
            </div>
        @endif
        <p class="mb-0">
            İki faktörlü kimlik doğrulama, hesabınıza ek bir güvenlik katmanı ekleyerek daha fazla <br>
            giriş yapmak için sadece bir paroladan daha fazlası.
        </p>
    </div>
</div>
