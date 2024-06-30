<!-- Add New Address Modal -->
<div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="address-title mb-2">Adres Düzenle</h3>
                    <p class="text-muted address-subtitle">Sipariş Adresi Düzenle</p>
                </div>
                <form id="addNewAddressForm" class="row g-3" method="post" action="{{route('business.order.update', $order->id)}}" >
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioHome">
                                  <span class="custom-option-body">
                                    <i class="ti ti-shopping-bag"></i>

                                    <span class="custom-option-title">Gel Al Sipariş</span>

                                  </span>
                                        <input
                                            name="order_type_id"
                                            class="form-check-input orderType"
                                            data-type-id="2"
                                            type="radio"
                                            value="2"
                                            id="customRadioHome"
                                            @checked($order->order_type == 2) />
                                    </label>
                                </div>
                            </div>
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioOffice">
                                  <span class="custom-option-body">
                                    <i class="ti ti-table-down"></i>

                                    <span class="custom-option-title"> Masa Sipariş </span>
                                  </span>
                                        <input
                                            name="order_type_id"
                                            class="form-check-input orderType"
                                            data-type-id="1"
                                            type="radio"
                                            value="1"
                                            id="customRadioOffice"
                                            @checked($order->order_type == 1)
                                        />
                                    </label>
                                </div>
                            </div>
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioOnline">
                                  <span class="custom-option-body">
                                     <i class="ti ti-shopping-cart"></i>

                                    <span class="custom-option-title"> Paket Servis </span>

                                  </span>
                                        <input
                                            name="order_type_id"
                                            class="form-check-input orderType"
                                            data-type-id="0"
                                            type="radio"
                                            value="0"
                                            id="customRadioOnline"
                                            @checked($order->order_type == 0)
                                        />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab" id="tab1" style="display: none">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalNote">Sipariş Notu</label>
                            <textarea
                                type="text"
                                id="modalNote"
                                name="modalNote"
                                class="form-control"
                                placeholder="Nr. Hard Rock Cafe">{{$order->note}}</textarea>
                        </div>
                    </div>
                    <div class="tab" id="tab2" style="display: none">
                        <div class="accordion accordion-custom-button mt-3" id="accordionCustom">
                            @forelse($regions as $region)

                                <div class="accordion-item @if($loop->index == 0) active @endif">
                                    <h2 class="accordion-header" id="headingCustom{{$region->id}}">
                                        <button type="button" class="accordion-button btn-label-primary collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustom{{$region->id}}" aria-expanded="false" aria-controls="accordionCustom{{$region->id}}">
                                            {{$region->name}}
                                        </button>
                                    </h2>

                                    <div id="accordionCustom{{$region->id}}" class="accordion-collapse collapse @if($loop->index == 0)  show @else collapsed  @endif" aria-labelledby="headingCustom{{$region->id}}" data-bs-parent="#accordionCustom">
                                        <div class="accordion-body text-center pt-3">
                                            <div class="row gap-2">
                                                @foreach($region->tables as $table)
                                                    <div class="col">
                                                        <div class="form-check custom-option custom-option-icon">
                                                            <label class="form-check-label custom-option-content" for="customRadioOnline{{$table->id}}">
                                                                  <span class="custom-option-body">
                                                                     <i class="ti ti-table-down"></i>

                                                                    <span class="custom-option-title"> {{$table->name}} </span>
                                                                  </span>
                                                                <input
                                                                    name="table_id"
                                                                    class="form-check-input"
                                                                    data-type-id="0"
                                                                    type="radio"
                                                                    value="{{$table->id}}"
                                                                    @checked(isset($order->table_id) && $table->id == $order->table_id)
                                                                    id="customRadioOnline{{$table->id}}" />
                                                            </label>
                                                        </div>


                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse

                        </div>
                    </div>
                    <div class="tab" id="tab3" style="display: none">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalAddress">Adres</label>
                            <textarea
                                type="text"
                                id="modalAddress"
                                name="modalAddress"
                                class="form-control"
                                placeholder="Açık Adres">{{$order->address}}</textarea>
                        </div>
                        <div class="row gap-2 mt-3">
                            <div class="col">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioOnlineCredit">
                                          <span class="custom-option-body">
                                             <i class="ti ti-credit-card"></i>

                                            <span class="custom-option-title"> Kredi Kartı </span>
                                          </span>
                                            <input
                                                name="payment_type"
                                                class="form-check-input"
                                                type="radio"
                                                value="1"
                                                @checked($order->payment_type_id == "1")
                                                id="customRadioOnlineCredit" />
                                    </label>
                                </div>


                            </div>
                            <div class="col">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioOnlineCash">
                                          <span class="custom-option-body">
                                             <i class="ti ti-cash-banknote"></i>

                                            <span class="custom-option-title"> Nakit </span>
                                          </span>
                                        <input
                                            name="payment_type"
                                            class="form-check-input"
                                            type="radio"
                                            value="0"
                                            @checked($order->payment_type_id == "0")
                                            id="customRadioOnlineCash" />
                                    </label>
                                </div>


                            </div>
                        </div>
                    </div>




                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success me-sm-3 me-1">Kaydet</button>
                        <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Kapat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add New Address Modal -->
