<h5 class="card-title mb-2">Kategoriler</h5>
<div class="card shadow-none mb-4 border">
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
                <td class="text-nowrap">Kategori Butonları</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="category_button_bg" value="{{$colors->get('category_button_bg')}}" type="color" id="defaultCheck_cust_1" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="category_button_font" value="{{$colors->get('category_button_font')}}" type="color" id="defaultCheck_cust_2" checked="">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-nowrap">Kategori Arka Plan Rengi</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="category_bg" value="{{$colors->get('category_bg')}}" type="color" id="defaultCheck_cust_1" checked="">
                    </div>
                </td>
                <td>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
