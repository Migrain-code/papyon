@extends('business.auth.layouts.master')
@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img
                        href="/business/assets/img/illustrations/auth-login-illustration-light.png"
                        alt="auth-login-cover"
                        src="/business/assets/img/illustrations/auth-login-illustration-light.png"
                        class="img-fluid my-5 auth-illustration"
                        data-app-light-img="/business/assets/img/illustrations/auth-login-illustration-light.png"
                        data-app-dark-img="/business/assets/img/illustrations/auth-login-illustration-dark.png" />

                    <img
                        src="/business/assets/img/illustrations/bg-shape-image-light.png"
                        alt="auth-login-cover"
                        class="platform-bg"
                        data-app-light-img="/business/assets/img/illustrations/bg-shape-image-light.png"
                        data-app-dark-img="/business/assets/img/illustrations/bg-shape-image-dark.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="/" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                        fill="#161616" />
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                        fill="#161616" />
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                  </svg>
                </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">Papyona Hoşgeldiniz 👋</h3>
                    <p class="mb-4">Lütfen hesabınıza giriş yapın ve kullanmaya başlayın</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('password.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="email" value="{{request()->email}}">
                        <input type="hidden" name="token" value="{{request()->token}}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Şifre</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="password"
                                placeholder="Yeni Şifrenizi giriniz"
                                autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Şifre Tekrar</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="password_confirmation"
                                placeholder="Yeni Şifrenizi Tekrar giriniz"
                                autofocus />
                        </div>


                        <button class="btn btn-primary d-grid w-100">Şifremi Güncelle</button>
                    </form>

                    <p class="text-center">
                        <span>Hesabın var mı?</span>
                        <a href="{{route('login')}}">
                            <span>Giriş Yap</span>
                        </a>
                    </p>

                    <div class="divider my-4">
                        <div class="divider-text">veya</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                            <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                            <i class="tf-icons fa-brands fa-google fs-5"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                            <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection


