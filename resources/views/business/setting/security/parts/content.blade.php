<!-- Customer Content -->
<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
     @include('business.setting.parts.nav')

    <!-- / Customer cards -->
    <div class="row text-nowrap">
        <!-- Change Password -->
        @include('business.setting.security.parts.change-password')
        <!--/ Change Password -->

        <!-- Two-steps verification -->
        @include('business.setting.security.parts.two-step')
        <!--/ Two-steps verification -->

        <!-- Recent Devices -->
        <div class="card mb-4">
            <h5 class="card-header">Son Kullanılan Cihazlar</h5>
            <div class="table-responsive">
                <table class="table border-top">
                    <thead>
                    <tr>
                        <th class="text-truncate">Tarayıcı</th>
                        <th class="text-truncate">Cihaz</th>
                        <th class="text-truncate">Bölge</th>
                        <th class="text-truncate">Son Giriş</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sessionData as $session)
                        <tr>
                            <td class="text-truncate">
                                @if($session["device"] == "Desktop")
                                    <i class="mb-1 ti ti-device-desktop text-info me-3"></i>
                                @else
                                    <i class="mb-1 ti ti-device-mobile text-info me-3"></i>
                                @endif
                                {{$session['browser']}}
                            </td>
                            <td class="text-truncate">{{$session["device"]}}</td>
                            <td class="text-truncate">Turkey</td>
                            <td class="text-truncate">{{$session["last_active"]}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Recent Devices -->
    </div>
</div>
<!--/ Customer Content -->
