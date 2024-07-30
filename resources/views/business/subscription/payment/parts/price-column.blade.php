
<div class="col-5">
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
                    <h1 class="price-toggle price-monthly display-4 text-primary mb-0 ">{{$package->price}} TL</h1>
                </div>
            </div>

            <ul class="ps-3 my-4 pt-2">
                @foreach($package->proparties as $propartie)
                    <li class="mb-2 d-flex justify-content-between">
                        {{$propartie->name}}  @if($propartie->price > 0) ({{"+".$propartie->price. " TL"}}) @endif
                        @if($propartie->price > 0)
                            <span class="me-4">
                                <label class="switch switch-md ">
                                    <input type="checkbox" name="added_proparties[]" @checked(isset(request()->added_proparties) && in_array($propartie->id, request()->added_proparties)) value="{{$propartie->id}}" class="switch-input categorySwitch">
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
        </div>
    </div>
</div>
