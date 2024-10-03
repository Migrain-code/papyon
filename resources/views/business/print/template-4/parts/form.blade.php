<div class="menu-controls">
    <div class="row">
        <div class="form-group col-6">
            <label>Logo</label>
            <input type="file" name="logo"  class="form-control" id="logoInput">
        </div>
        <div class="form-group col-6">
            <label>Arka Plan Görsel</label>
            <input type="file" name="background_image"  class="form-control" id="backgroundInput">
        </div>
        <div class="form-group col-6">
            <label>Şablon Arka Plan</label>
            <input type="color" name="theme_color" style="height: 40px"  class="form-control" id="themeColor">
        </div>
        <div class="form-group col-6">
            <label>Şablon Yazı Rengi</label>
            <input type="color" name="theme_font_color" style="height: 40px"  class="form-control" id="themeFontColor">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <label>Başlık</label>
            <input type="text" name="title" value="TEMASSIZ MENÜ" class="form-control" id="titleInput">
        </div>
        <div class="form-group col-6">
            <label>Başlık Yazı Rengi</label>
            <input type="color" name="title" style="height: 40px" class="form-control" id="titleColorInput">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label>Masa Adı Arka Plan</label>
            <input type="color" name="table_name_bg_color" style="height: 40px" class="form-control" id="tableBgColorInput">
        </div>
        <div class="form-group col-6">
            <label>Masa Adı Yazı Rengi</label>
            <input type="color" name="table_name_font_color" style="height: 40px" class="form-control" id="tableFontColorInput">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label>Menü Açıklama Metni</label>
            <input type="text" name="menu_description" VALUE="Siparişiniz İçin Online Menüye Karekodu Akıllı Telefonunuzdan Okutunuz" class="form-control" id="menuDescriptionInput">
        </div>
        <div class="form-group col-6">
            <label>Menü Açıklama Metni Yazı Rengi</label>
            <input type="color" name="menu_description_font_color" style="height: 40px" class="form-control" id="menuDescriptionColorInput">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label>Çerçeve Rengi</label>
            <input type="color" name="border_color" style="height: 40px" class="form-control" id="borderColor">
        </div>
        <div class="form-group col-6">
            <label>Çerçeve Kalınlığı</label>
            <input type="number" name="border_width" style="height: 40px" class="form-control" id="borderWidth">
        </div>
    </div>
    <div class="col-12 mt-4">
        <a class="btn btn-primary w-100" href="javascript:void(0)" onclick="createTheme()">Şablonu Masalara Uygula</a>

    </div>
</div>
