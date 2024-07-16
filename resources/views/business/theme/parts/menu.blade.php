<h5 class="card-title mb-2">Menüler</h5>
<div class="card shadow-none mb-4 border">
    <div class="table-responsive rounded">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-nowrap w-50">Yer</th>
                <th class="text-nowrap text-center w-25">Arka Plan</th>
                <th class="text-nowrap text-center w-25">Yazı</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-nowrap">Üst Menü</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="top_menu_bg" value="{{$colors->get('top_menu_bg')}}" type="color" id="defaultCheck_cust_1" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="top_menu_font" value="{{$colors->get('top_menu_font')}}" type="color" id="defaultCheck_cust_2" checked="">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-nowrap">Alt Menü Açık Versiyon</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="bottom_menu_bg" value="{{$colors->get('bottom_menu_bg')}}" type="color" id="defaultCheck_cust_3" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="bottom_menu_font" value="{{$colors->get('bottom_menu_font')}}" type="color" id="defaultCheck_cust_4" checked="">
                    </div>
                </td>
            </tr>
            <tr class="border-transparent">
                <td class="text-nowrap">Alt Menü Kapalı Versiyon</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="bottom_menu_bg_close" value="{{$colors->get('bottom_menu_bg_close')}}" type="color" id="defaultCheck_cust_3" checked="">
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="bottom_menu_font_close" value="{{$colors->get('bottom_menu_font_close')}}" type="color" id="defaultCheck_cust_4" checked="">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
