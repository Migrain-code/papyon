
<div class="col-5">
    @if(!request()->routeIs('business.subscribtion.payment.success'))
        <div
            class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-3 pt-3 mb-0 ">
            <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
                <span class="switch-label">Aylık</span>
                <input type="checkbox" name="yearly_check" class="switch-input price-duration-toggler" checked />
                <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                <span class="switch-label">Yıllık</span>
            </label>

        </div>
    @endif
    <div class="card border rounded shadow-none border-success">
        <div class="card-body">
            <div class="my-3 pt-2 text-center">
                <img
                    src="{{storage($package->icon)}}"
                    alt="Enterprise Image"
                    height="140" />
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">{{$package->name}}</h3>
            <p class="text-center">{{$package->description}}</p>

            <div class="text-center">
                <div class="d-flex justify-content-center">
                    <sup class="h6 text-primary pricing-currency mt-3 mb-0 me-1">₺</sup>
                    <h1 class="price-toggle price-yearly display-4 text-primary mb-0">{{$package->year_price}}</h1>
                    <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">{{$package->price}}</h1>
                    <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-muted">/aylık</sub>
                </div>
                <small class="price-yearly price-yearly-toggle fs-3 text-muted">₺ {{$package->total_price}} / yıllık</small>
            </div>

            <ul class="ps-3 my-4 pt-2">
                @foreach($package->proparties as $propartie)
                    <li class="mb-2">{{$propartie->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
