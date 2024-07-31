<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center justify-content-center">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <div class="fw-bold ">
                    <h5 class="m-0">{{authUser()->place()->name}}</h5>
                </div>
                <div class="progress dayArea">
                    <div

                        class="progress-bar"
                        role="progressbar"
                        style="width: 100%;background-color: #252745"
                        aria-valuenow="{{authUser()->remainingDate()}}"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        {{authUser()->remainingDate()}} Gün Kaldı
                    </div>
                </div>
                <a class="btn btn-icon text-dark" href="{{route('place.show', authUser()->place()->slug)}}" target="_blank">
                    <i class="ti ti-world"></i>
                </a>
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

           @include('business.layouts.menu.parts.branch')

           @include('business.layouts.menu.parts.theme-mode')
           @include('business.layouts.menu.parts.notification')

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{storage(authUser()->image)}}" alt class="h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{storage(authUser()->image)}}" alt class="h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{authUser()->name}}</span>
                                    <small class="text-muted">Yönetici</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('business.setting.index')}}">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Ayarlar</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('business.setting.security')}}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">Güvenlik</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{route('business.setting.invoice')}}">
                        <span class="d-flex align-items-center align-middle">
                              <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                              <span class="flex-grow-1 align-middle">Faturalar</span>

                        </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti ti-help me-2 ti-sm"></i>
                            <span class="align-middle">Destek</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('business.subscribtion.index')}}">
                            <i class="ti ti-shopping-cart me-2 ti-sm"></i>
                            <span class="align-middle">Abonelik Paketleri</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#logoutForm').submit()">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Çıkış Yap</span>
                        </a>
                        <form type="hidden" method="post" id="logoutForm" action="{{route('business.logout')}}">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>


</nav>
