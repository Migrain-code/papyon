<ul class="nav nav-pills flex-column flex-md-row mb-4 mt-4 ms-2">
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.menu-design.index')) active @endif" href="{{route('business.menu-design.index')}}">
            <i class="ti ti-user-check ti-xs me-1"></i>
            Menü Sıralaması
        </a>
    </li>

    <li class="nav-item">
            <a class="nav-link @if(request()->routeIs('business.menu-design.create')) active @endif" href="{{route('business.menu-design.create')}}">
                <i class="ti ti-color-picker ti-xs me-1"></i>
                Renkler
            </a>
    </li>


</ul>