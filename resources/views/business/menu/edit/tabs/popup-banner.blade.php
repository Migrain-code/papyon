@extends('business.layouts.master')
@section('title', 'Menü Detayı')
@section('styles')

@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Menüler /</span> Menü Detayı / Görünütlenen Menü ({{$menu->name}})</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Pop-up Banner! 🎉</h5>
                                <p class="mb-2">Pop-up banner ile indirimlerinizi, favori tabaklarınızı veya kampanyalarınızı duyurabilirsiniz.</p>
                                <h4 class="text-primary mb-1"></h4>
                                <label class="switch switch-lg mt-4">
                                    <span class="switch-label">Popup banneri Aktifleştir</span>

                                    <input type="checkbox" class="switch-input" @checked(isset($banner) && $banner->status == 1) id="productImageCheck">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"><i class="ti ti-check"></i></span>
                                        <span class="switch-off"><i class="ti ti-x"></i></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="/business/assets/img/project/banners/popup-text-image.png"
                                    height="140"
                                    alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <div class="card-body order-0 order-md-1">
                        <!-- User Pills -->
                        @include('business.menu.edit.nav')
                        <!--/ User Pills -->
                        <div class="row" id="productImageInputContainer" style="display: none">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <form method="post" action="{{route('business.menu.updatePopup', $menu->id)}}" enctype="multipart/form-data"
                                                  class="col-lg-8 mb-md-0 mb-4">
                                                @csrf
                                                <div class="row">
                                                    <div class="col mb-4">
                                                        <label for="bannerType" class="form-label">Banner Tipi</label>
                                                        <select class="form-select" id="bannerType" name="banner_type">
                                                            <option value="">Banner Türü Seçiniz</option>
                                                            <option value="1" @selected(isset($banner) && $banner->banner_type == "1")>Metin ve Resim</option>
                                                            <option value="2" @selected(isset($banner) && $banner->banner_type == "2")>Sadece Resim</option>
                                                            <option value="3" @selected(isset($banner) && $banner->banner_type == "3")>Sadece Metin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row" id="imageContainer">
                                                    <div class="col mb-4" >
                                                        <label for="nameBasic" class="form-label">Banner Görseli *tavsiye edilen ölçü : (680x400)</label>
                                                        <input type="file" id="nameBasic" name="banner_image" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row" id="textContainer">
                                                            <div class="col mb-4 bannerContainer" @if(isset($banner) && $banner->banner_type == "2" ) style="display: none"  @endif>
                                                                <label for="nameBasic" class="form-label">Banner Metni</label>
                                                                <textarea type="text" id="nameBasic" name="banner_description"  class="form-control" placeholder="Örn. Menü 1">{{isset($banner) ? $banner->description : ""}}</textarea>
                                                            </div>
                                                </div>
                                                <div class="row">
                                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                                </div>
                                            </form>
                                            <div class="col-lg-4">
                                                @if(isset($banner))
                                                    <img src="{{storage($banner->image)}}" id="bannerTypeImage" class="w-100">
                                                @else
                                                    <img id="bannerTypeImage" class="w-100">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        var productImageInputArea = document.getElementById('productImageInputContainer');

        $('#productImageCheck').on('change', function (){
            if($(this).is(':checked')){
                productImageInputArea.style.display = "block";
            } else{
                productImageInputArea.style.display = "none";
            }

            $.ajax({
                url: '/business/menu/{{$menu->id}}/update-pop-up-status',
                type: "GET",
                dataType: "JSON",
                success: function (res) {
                    Toast.fire({
                        icon: res.status,
                        title: res.message,
                    });
                },
                error: function (xhr) {
                    submitButton.disabled = false;
                    var errorMessage = "<ul>";
                    xhr.responseJSON.errors.forEach(function (error) {
                        errorMessage += "<li>" + error + "</li>";
                    });
                    errorMessage += "</ul>";

                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        html: errorMessage,
                        buttonsStyling: false,
                        confirmButtonText: "Tamam",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });

        });
        $('#bannerType').on('change', function (){
            var bannerType = $(this).val();
            if(bannerType == 1){
                $('#bannerTypeImage').attr('src', '/business/assets/img/project/banners/popup-text-image.png');
                $('#imageContainer').css('display', 'block');
                $('#textContainer').css('display', 'block');
                $('.bannerContainer').css('display', 'block');
            }else if (bannerType == 2){
                $('#bannerTypeImage').attr('src', '/business/assets/img/project/banners/popup-image.png');
                $('#imageContainer').css('display', 'block');
                $('#textContainer').css('display', 'none');

                $('[name="banner_description"]').text("");
            } else if (bannerType == 3){
                $('#bannerTypeImage').attr('src', '/business/assets/img/project/banners/popup-text.png');
                $('#imageContainer').css('display', 'none');
                $('#textContainer').css('display', 'block');
                $('[name="banner_image"]').val("");
            } else{
                $('#bannerTypeImage').attr('src', '/business/assets/img/project/banners/popup-text-image.png');
            }
        });
        $(function (){
            productImageInputArea = document.getElementById('productImageInputContainer');

            if($('#productImageCheck').is(':checked')){
                productImageInputArea.style.display = "block";
            } else{
                productImageInputArea.style.display = "none";
            }
        })
    </script>
@endsection
