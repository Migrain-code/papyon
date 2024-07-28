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
                    <h5 class="m-0">{{authUser()->name}}</h5>
                </div>

            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

           @include('admin.layouts.menu.parts.language')
           @include('admin.layouts.menu.parts.theme-mode')
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);">
                    <i class="ti ti-logout"></i>
                </a>
            </li>
        </ul>
    </div>


</nav>
