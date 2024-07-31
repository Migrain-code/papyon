@extends('business.layouts.master')
@section('title', 'Menü Detayı')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">

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
                                <h5 class="card-title mb-0">Menü Düzenleme Sihirbazı! 🎉</h5>
                                <p class="mb-2">Şimdi Menü Bilgilerinizi Güncelleyin</p>
                                <h4 class="text-primary mb-1"></h4>
                                <a href="{{route('business.menu.index')}}" class="btn btn-primary">Menülerim</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="/business/assets/img/illustrations/card-advance-sale.png"
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
                        @include('business.menu.edit.tabs.menu-content')
                    </div>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
    @include('business.menu.modals.add-menu-category')
    @include('business.menu.modals.update-menu-category')

@endsection
@section('scripts')

    <script src="/business/assets/vendor/libs/sortablejs/sortable.js"></script>
    <script>
        var catgoryUpdateOrderUrl= '{{ route('business.category.updateOrder') }}';
        var productUpdateOrderUrl = '{{ route('business.product.updateOrder') }}'
    </script>
    <!-- Page JS -->
    <script src="/business/assets/js/project/product/listing.js"></script>
    <script src="/business/assets/js/project/product/category.js"></script>
    <script src="https://unpkg.com/cropperjs"></script>
    <script>
        @if($themeId == 3)
            var cropWidth = 190;
            var cropHeight = 150;
            var asRadio = 1;
        @else
            var cropWidth = 900;
            var cropHeight = 400;
            var asRadio = 2.25;
        @endif
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('categoryImage');
            const image = document.getElementById('image');
            const cropButton = document.getElementById('crop-button');
            const canvas = document.getElementById('canvas');
            let cropper;

            fileInput.addEventListener('change', function (e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    const file = files[0];
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        image.src = event.target.result;
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(image, {
                            aspectRatio: asRadio, // 600x400 oranı (3:2)
                            viewMode: 1,
                            minCropBoxWidth: cropWidth,
                            minCropBoxHeight: cropHeight,
                            ready() {
                                cropper.setCropBoxData({ width: cropWidth, height: cropHeight });
                            }
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            cropButton.addEventListener('click', function () {
                if($('#categoryImageCheck').is(':checked')){
                    const croppedCanvas = cropper.getCroppedCanvas({
                        width: cropWidth,
                        height: cropHeight
                    });
                    canvas.style.display = 'none';
                    canvas.width = cropWidth;
                    canvas.height = cropHeight;
                    canvas.getContext('2d').drawImage(croppedCanvas, 0, 0);

                    croppedCanvas.toBlob(function (blob) {
                        const formData = new FormData();
                        formData.append('croppedImage', blob);
                        formData.append('menu_id', '{{$menu->id}}')
                        formData.append('name', $('[name="name"]').val())
                        formData.append('_token', csrf_token);

                        fetch('/business/menu-category', {
                            method: 'POST',
                            body: formData,
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === "success") {
                                    addCategoryModal.hide();
                                    Swal.fire({
                                        title: 'Başarılı!',
                                        text: data.message,
                                        icon: 'success',
                                        confirmButtonText: 'Tamam'
                                    });
                                    setTimeout(function (){
                                        location.reload();
                                    }, 500);
                                } else {
                                    Swal.fire({
                                        title: 'Hata!',
                                        text: 'Bir hata oluştu.',
                                        icon: 'error',
                                        confirmButtonText: 'Tamam'
                                    });
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                Swal.fire({
                                    title: 'Hata!',
                                    text: 'Bir hata oluştu.',
                                    icon: 'error',
                                    confirmButtonText: 'Tamam'
                                });
                            });
                    });
                }
                else{
                    const formData = new FormData();
                    formData.append('menu_id', '{{$menu->id}}')
                    formData.append('name', $('[name="name"]').val())
                    formData.append('_token', csrf_token);

                    fetch('/business/menu-category', {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === "success") {
                                addCategoryModal.hide();
                                Swal.fire({
                                    title: 'Başarılı!',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'Tamam'
                                });
                                setTimeout(function (){
                                    location.reload();
                                }, 500);
                            } else {
                                Swal.fire({
                                    title: 'Hata!',
                                    text: 'Bir hata oluştu.',
                                    icon: 'error',
                                    confirmButtonText: 'Tamam'
                                });
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.fire({
                                title: 'Hata!',
                                text: 'Bir hata oluştu.',
                                icon: 'error',
                                confirmButtonText: 'Tamam'
                            });
                        });
                }


            });
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('updateCategoryImage');
            const image = document.getElementById('updateImage');
            const cropButton = document.getElementById('update-crop-button');
            const canvas = document.getElementById('updateCanvas');
            let cropper;

            fileInput.addEventListener('change', function (e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    image.style.display = "block";
                    const file = files[0];
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        image.src = event.target.result;
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(image, {
                            aspectRatio: asRadio, // 600x400 oranı (3:2)
                            viewMode: 1,
                            minCropBoxWidth: cropWidth,
                            minCropBoxHeight: cropHeight,
                            ready() {
                                cropper.setCropBoxData({ width: cropWidth, height: cropHeight });
                            }
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            cropButton.addEventListener('click', function () {
                const croppedCanvas = cropper.getCroppedCanvas({
                    width: cropWidth,
                    height: cropHeight
                });
                canvas.style.display = 'none';
                canvas.width = cropWidth;
                canvas.height = cropHeight;
                canvas.getContext('2d').drawImage(croppedCanvas, 0, 0);

                croppedCanvas.toBlob(function (blob) {
                    const formData = new FormData();
                    formData.append('croppedImage', blob);
                    formData.append('_token', csrf_token);
                    formData.append('_method', 'PUT');
                    formData.append("name", $('[name="category_name"]').val());
                    fetch('/business/menu-category/'+category_id, {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === "success") {
                                addCategoryModal.hide();
                                Swal.fire({
                                    title: 'Başarılı!',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'Tamam'
                                });
                                setTimeout(function (){
                                    location.reload();
                                }, 500);
                            } else {
                                Swal.fire({
                                    title: 'Hata!',
                                    text: 'Bir hata oluştu.',
                                    icon: 'error',
                                    confirmButtonText: 'Tamam'
                                });
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.fire({
                                title: 'Hata!',
                                text: 'Bir hata oluştu.',
                                icon: 'error',
                                confirmButtonText: 'Tamam'
                            });
                        });
                });
            });
        });
    </script>
@endsection
