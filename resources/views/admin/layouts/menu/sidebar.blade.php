<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
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
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Gösterge Paneli">Gösterge Paneli</div>
                {{-- <div class="badge bg-primary rounded-pill ms-auto">5</div> --}}
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.user.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Kullanıcılar">Kullanıcılar</div>
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
                    <a href="{{route('admin.place.index')}}" class="menu-link">
                        <div data-i18n="Mekan Listesi">Mekan Listesi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.place.create')}}" class="menu-link">
                        <div data-i18n="Mekan Ekle">Mekan Ekle</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Temalar">Temalar</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('admin.template.index')}}" class="menu-link">
                        <div data-i18n="Menü Temaları">Menü Temaları</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.menu-template.index')}}" class="menu-link">
                        <div data-i18n="Şablon Temaları">Şablon Temaları</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Sayfalar">Sayfalar</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('admin.mainpage.index')}}" class="menu-link">
                        <div data-i18n="Anasayfa İçerik">Anasayfa İçerik</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.blog.index')}}" class="menu-link">
                        <div data-i18n="Bloglar">Bloglar</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.blogCategory.index')}}" class="menu-link">
                        <div data-i18n="Blog Kategorileri">Blog Kategorileri</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.feature.index')}}" class="menu-link">
                        <div data-i18n="Özellikler">Özellikler</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.entegration.index')}}" class="menu-link">
                        <div data-i18n="Entragrasyonlar">Entragrasyonlar</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.gallery.index')}}" class="menu-link">
                        <div data-i18n="Galeri">Galeri</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.mainpage.contact')}}" class="menu-link">
                        <div data-i18n="İletişim">İletişim</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Hizmet Paketleri">Hizmet Paketleri</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('admin.package.index')}}" class="menu-link">
                        <div data-i18n="Paket Listesi">Paket Listesi</div>
                    </a>
                </li>
            </ul>

        <li class="menu-item">
            <a href="{{route('admin.partnership.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building"></i>
                <div data-i18n="İş Ortaklığı">İş Ortaklığı</div>
                <div class="badge bg-danger rounded-pill ms-auto">{{auth('admin')->user()->partnershipRequest()}}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.contact.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-message"></i>
                <div data-i18n="İletişim">İletişim</div>
                <div class="badge bg-danger rounded-pill ms-auto">{{auth('admin')->user()->contactRequest()}}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.demoRequest.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-message"></i>
                <div data-i18n="Demo Talepleri">Demo Talepleri</div>
                <div class="badge bg-danger rounded-pill ms-auto">{{auth('admin')->user()->demoRequest()}}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.page.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-writing-sign"></i>
                <div data-i18n="Sözleşmeler">Sözleşmeler</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.allergen.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-writing-sign"></i>
                <div data-i18n="Alerjenler">Alerjenler</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.language.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-language"></i>
                <div data-i18n="Diller">Diller</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.setting.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Ayarlar">Ayarlar</div>
            </a>
        </li>

    </ul>
</aside>
