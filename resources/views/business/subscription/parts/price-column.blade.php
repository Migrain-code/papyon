
<form class="col-lg" method="get" action="{{route('business.subscribtion.payForm', $package->slug)}}">
    <div class="card border rounded shadow-none @if($loop->index == 1) border-primary @else @if(authUser()->package_id == $package->id) border-success @endif @endif">
        <div class="card-header" style="background: {{$package->color}}">
            @if($loop->index == 1)
                <div class="position-absolute end-0 me-4 top-0 mt-4">
                    <span class="badge bg-label-primary" style="color: {{$package->color}}">Popüler</span>
                </div>
            @endif

            <h3 class="card-title text-center text-capitalize mb-1 text-white">{{$package->name}}</h3>
            <p class="text-center text-white">{{$package->description}}</p>
        </div>
        <div class="card-body @if($loop->index == 1) position-relative @endif">
            <div class="text-center mt-3">
                <div class="d-flex justify-content-center">
                    <h1 class="price-toggle price-monthly display-4 mb-0 " style="color: {{$package->color}}">
                        {{$package->price}} TL / <span class="text-dark fs-6">Kdv Dahil</span>
                    </h1>
                </div>
            </div>

            <ul class="ps-3 my-4 pt-2">
                @foreach($package->proparties as $propartie)
                    <li class="mb-2 d-flex justify-content-between p-2 bg-label-hover-dark rounded" style="background: white">
                        <div class="d-flex gap-2">
                            <i class="ti ti-circle-check"></i>
                            {{$propartie->name}}  @if($propartie->price > 0) ({{"+".$propartie->price. " TL"}}) @endif
                        </div>
                        @if($propartie->price > 0)
                            <span class="me-4">
                                <label class="switch switch-md ">

                                    <input type="checkbox" name="added_proparties[]" value="{{$propartie->id}}" class="switch-input categorySwitch">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on bg-success"><i class="ti ti-check"></i></span>
                                        <span class="switch-off"><i class="ti ti-x"></i></span>
                                    </span>
                                </label>
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
            @if(authUser()->package_id == $package->id)
                <a href="#" class="btn btn-label-success d-grid w-100">Mevcut Planınız</a>
            @else
               <button type="submit" class="btn btn-label-primary d-grid w-100">Satın Al</button>
            @endif
        </div>
    </div>
</form>
