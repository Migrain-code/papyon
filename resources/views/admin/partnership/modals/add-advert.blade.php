<!-- Edit User Modal -->
<div class="modal fade" id="addAdvertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Talep Ekle</h3>
                </div>
                <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.partnership.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 mt-2">
                        <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Ad/Soyad" required>
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" name="phone" value="{{old('phone')}}" placeholder="Cep Telefonu Numarası" type="text">
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" required="" name="email" value="{{old('email')}}" type="email" placeholder="E-Mail Adresiniz">
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" name="company_age" value="{{old('company_age')}}" placeholder="Şirket Yaşınız" type="number">
                    </div>

                    <div class="col-6 mt-2">
                        <select name="city_id" class="form-control" required="" placeholder="Şehir Seçiniz">
                            <option value="0">Şehir Seçiniz</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" @selected(old('city_id') == $city->id)>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <select name="customer_count" class="form-control" placeholder="Mevcut Müşteri Sayısı">
                            <option value="0">Mevcut Müşteri Sayısı</option>
                            @for($i = 1 ; $i <= 150; $i++)
                                <option value="{{$i}}" @selected($i == old('customer_count'))>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <select name="target_customer_count" class="form-control">
                            <option value="0">Hedef Müşteri Sayısı</option>
                            @for($i = 1 ; $i <= 150; $i++)
                                <option value="{{$i}}" @selected($i == old('target_customer_count'))>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <input name="other_companies" class="form-control" value="{{old('other_companies')}}" type="text" placeholder="Bayilik Yaptığınız Diğer Firmalar">
                    </div>
                    <div class="col-12 mt-2">
                        <textarea name="note" class="form-control" id="" cols="30" rows="7" placeholder="Notunuz">{{old('note')}}</textarea>

                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
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
<!--/ Edit User Modal -->
