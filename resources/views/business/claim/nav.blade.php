<div class="d-flex gap-3 py-3">
    <a href="{{route('business.claim.index')}}" class="btn  @if(request()->routeIs('business.claim.index')) btn-primary @else btn-label-primary @endif ">
        Siparişler
        <span class="badge bg-white text-primary badge-center ms-1 rounded-circle ms-2" id="orderCount">{{$claims['orderCount']}}</span>
    </a>
    <a href="{{route('business.claim.packet')}}" class="btn  @if(request()->routeIs('business.claim.packet')) btn-dark @else btn-label-dark @endif ">
        Paket Siparişleri
        <span class="badge bg-white text-dark badge-center ms-1 rounded-circle ms-2" id="packetCount">{{$claims['packetCount']}}</span>
    </a>
    <a href="{{route('business.claim.taxi')}}" class="btn  @if(request()->routeIs('business.claim.taxi')) btn-warning @else btn-label-warning @endif ">
        Taksi Talepleri
        <span class="badge bg-white text-warning badge-center ms-1 rounded-circle ms-2" id="taxiCount">{{$claims['taxiCount']}}</span>
    </a>
    <a href="{{route('business.claim.vale')}}" class="btn  @if(request()->routeIs('business.claim.vale')) btn-success @else btn-label-success @endif ">
        Vale Talepleri
        <span class="badge bg-white text-success badge-center ms-1 rounded-circle ms-2" id="valeCount">{{$claims['valeCount']}}</span>
    </a>
    <a href="{{route('business.claim.waiter')}}" class="btn  @if(request()->routeIs('business.claim.waiter')) btn-danger @else btn-label-danger @endif ">
        Garson Talepleri
        <span class="badge bg-white text-danger badge-center ms-1 rounded-circle ms-2" id="waiterCount">{{$claims['waiterCount']}}</span>
    </a>

</div>

