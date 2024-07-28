<!-- Notification -->
<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
    <a
        class="nav-link dropdown-toggle hide-arrow"
        href="javascript:void(0);"
        data-bs-toggle="dropdown"
        data-bs-auto-close="outside"
        aria-expanded="false">
        <i class="ti ti-bell ti-md"></i>
        <span class="badge bg-danger rounded-pill badge-notifications">{{authUser()->unreadNotifications->count()}}</span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Bildirimler</h5>
                <a
                    href="{{route('business.markAsAllReadNotification')}}"
                    class="dropdown-notifications-all text-body"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Tümünü Okundu Olarak İşaretle"
                ><i class="ti ti-mail-opened fs-4"></i
                    ></a>
            </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container">
            <ul class="list-group list-group-flush">

                @forelse(authUser()->unreadNotifications as $notification)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <img src="{{storage($notification->icon)}}" alt class="h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{$notification->title}}</h6>
                                <p class="mb-0">{{$notification->description}}</p>
                                <small class="text-muted">{{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                                    ></a>
                                <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="ti ti-x"></span
                                    ></a>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse
            </ul>
        </li>
        {{--
            <li class="dropdown-menu-footer border-top">
            <a
                href="javascript:void(0);"
                class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                Tüm Bildirimler
            </a>
        </li>
        --}}
    </ul>
</li>
<!--/ Notification -->
