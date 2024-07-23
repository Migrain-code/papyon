<ul class="nav nav-pills flex-column flex-md-row mb-4 mt-4 ms-2">
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.menu.edit')) active @endif" href="{{route('business.menu.edit', $menu->id)}}">
            <i class="ti ti-user-check ti-xs me-1"></i>
            Menü İçeriği
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.souce.index')) active @endif" href="{{route('business.souce.index')}}">
            <i class="ti ti-tools-kitchen"></i>
            Soslar
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.material.index')) active @endif" href="{{route('business.material.index')}}">
            <i class="ti ti-stack-push"></i>
            Malzemeler
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.menu.status')) active @endif" href="{{route('business.menu.status', $menu->id)}}">
            <i class="ti ti-switch-2 ti-xs me-1"></i>
            Mevcut Durumu
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.menu.popup')) active @endif" href="{{route('business.menu.popup', $menu->id)}}">
            <i class="ti ti-currency-dollar ti-xs me-1"></i>
            Pop-up Banner
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.menu.crytpedView')) active @endif" href="{{route('business.menu.crytpedView', $menu->id)}}">
            <i class="ti ti-lock ti-xs me-1"></i>
            Şifre Koruma
        </a>
    </li>

</ul>
