<hr class="my-4 mx-n4" />
<h6>6. Wifi / Internet Biglileriniz</h6>
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Wifi Adı</label>
        <input type="text" id="multicol-username" name="wifi_name" value="{{$place->wifi->name ?? ""}}" class="form-control" placeholder="örn. {{\Illuminate\Support\Str::random(8)}}" />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Wifi Şifresi</label>
        <input type="text" id="multicol-username" name="wifi_password" value="{{$place->wifi->pass ?? ""}}" class="form-control" placeholder="örn. {{\Illuminate\Support\Str::random(8)}}" />
    </div>
</div>
