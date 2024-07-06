<!-- Customer Pills -->
<ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.setting.index')) active @endif py-2" href="{{route('business.setting.index')}}"
        ><i class="ti ti-user me-1"></i>Hesap Özeti</a
        >
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->routeIs('business.setting.security')) active @endif py-2" href="{{route('business.setting.security')}}">
            <i class="ti ti-lock me-1"></i>Güvenlik
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link py-2" href="app-ecommerce-customer-details-billing.html"
        ><i class="ti ti-file-invoice me-1"></i>Faturalar</a
        >
    </li>
    <li class="nav-item">
        <a class="nav-link py-2" href="app-ecommerce-customer-details-notifications.html"
        ><i class="ti ti-bell me-1"></i>Bildirim İzinleri</a
        >
    </li>
</ul>
<!--/ Customer Pills -->
