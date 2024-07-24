<!-- Language -->
<li class="nav-item dropdown-language dropdown me-2 me-xl-0">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class="ti ti-status-change rounded-circle ti-md"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @foreach(authUser()->places as $place)
            <li>
                <a class="dropdown-item" href="{{route('business.place.show', $place->id)}}">
                    <span class="align-middle">{{$place->name}}</span>
                </a>
            </li>
        @endforeach

    </ul>
</li>
<!--/ Language -->
