
<div class="col-lg">
    <div class="card border rounded shadow-none @if($loop->index == 1) border-primary @else @if(authUser()->package_id == $package->id) border-success @endif @endif">
        <div class="card-body @if($loop->index == 1) position-relative @endif">
            @if($loop->index == 1)
                <div class="position-absolute end-0 me-4 top-0 mt-4">
                    <span class="badge bg-label-primary">Popüler</span>
                </div>
            @endif

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
                <small class="price-yearly price-yearly-toggle text-muted">₺ {{$package->total_price}} / yıllık</small>
            </div>

            <ul class="ps-3 my-4 pt-2">
                @foreach($package->proparties as $propartie)
                    <li class="mb-2">{{$propartie->name}}</li>
                @endforeach
            </ul>

            @if(authUser()->package_id == $package->id)
                <a href="#" class="btn btn-label-success d-grid w-100">Mevcut Planınız</a>
            @else
               <a href="{{route('business.subscribtion.payForm', $package->slug)}}" class="btn btn-label-primary d-grid w-100">Satın Al</a>
            @endif
        </div>
    </div>
</div>
