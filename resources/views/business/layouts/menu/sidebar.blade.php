<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background: #242745">
    <div class="app-brand demo">
        <a href="{{route('business.home')}}" class="app-brand-link">
              <span class="app-brand-logo demo" style="width: 30px;height: 30px">
                <img src="{{storage(setting('site_favicon'))}}" style="width: 30px;height: 30px">
              </span>
            <span class="app-brand-text demo menu-text fw-bold pacifico-regular">Papyon QR</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{route('business.home')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Gösterge Paneli">Gösterge Paneli</div>
                {{-- <div class="badge bg-primary rounded-pill ms-auto">5</div> --}}
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Mekanlar">Mekanlar</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('business.place.index')}}" class="menu-link">
                        <div data-i18n="Mekan Listesi">Mekan Listesi</div>
                    </a>
                </li>
                {{--
                    <li class="menu-item">
                    <a href="{{route('business.place.create')}}" class="menu-link">
                        <div data-i18n="Mekan Ekle">Mekan Ekle</div>
                    </a>
                </li>
                --}}
            </ul>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="{{route('business.table.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-table"></i>
                <div data-i18n="Masalar">Masalar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.menu.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div data-i18n="Menü">Menü</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.excel.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-database-import"></i>
                <div data-i18n="Import/Export">Import/Export</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.claim.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Talepler">Talepler </div>
                <div class="badge bg-danger rounded-pill ms-auto">{{auth('web')->user()->place()->allClaim()}}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.swiper-advert.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-discount"></i>
                <div data-i18n="Kampanyalar">Kampanyalar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.announcement.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-speakerphone"></i>
                <div data-i18n="Duyurular">Duyurular</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.suggestion.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-message"></i>
                <div data-i18n="Görüş ve Öneriler">Görüş ve Öneriler</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.contract.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-writing-sign"></i>
                <div data-i18n="Sözleşmeler">Sözleşmeler</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.setting.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Ayarlar">Ayarlar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.menu-design.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-template"></i>
                <div data-i18n="Tema Ayarları">Tema Ayarları</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('business.print.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-template"></i>
                <div data-i18n="Çıktı Al">Çıktı Al</div>
            </a>
        </li>
    </ul>
</aside>
