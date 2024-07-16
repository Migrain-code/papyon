<h5 class="card-title mb-2">Ürünler</h5>
<div class="card shadow-none border">
    <div class="table-responsive rounded">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-nowrap w-50">Yer</th>
                <th class="text-nowrap text-center w-25">Arka Plan</th>
                <th class="text-nowrap text-center w-25">Yazı Rengi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-nowrap">Ürün Kartları</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="product_card_bg" value="{{$colors->get('product_card_bg')}}" type="color" id="defaultCheck_cust_1" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="product_card_font" value="{{$colors->get('product_card_font')}}" type="color" id="defaultCheck_cust_2" checked="">
                    </div>
                </td>
            </tr>

            <tr>
                <td class="text-nowrap">Ürün Kalori ve Süre Alanı</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="product_card_time_bg" value="{{$colors->get('product_card_time_bg')}}" type="color" id="defaultCheck_cust_1" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="product_card_time_font" value="{{$colors->get('product_card_time_font')}}" type="color" id="defaultCheck_cust_2" checked="">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-nowrap">Sepete Ekleme Butonu</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="product_card_add_button_bg" value="{{$colors->get('product_card_add_button_bg')}}" type="color" id="defaultCheck_cust_1" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="product_card_add_button_font" value="{{$colors->get('product_card_add_button_font')}}" type="color" id="defaultCheck_cust_2" checked="">
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
        <div class="d-flex justify-content-end gap-3 p-3">
            <button type="submit" class="btn btn-primary waves-effect waves-light w-100">Kaydet</button>
        </div>
    </div>
</div>
