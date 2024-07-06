@extends('business.layouts.master')
@section('title', 'Reklam Alanı Düzenle')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />
    <style>
        .drop-container {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .drop-container:hover {
            border-color: #333;
        }

        #fileName {
            font-style: italic;
            display: block;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span>Reklam Alanı Düzenle</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">


                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <form method="post" action="{{route('business.swiper-advert.update', $swiperAdvert->id)}}" enctype="multipart/form-data" class="card-body order-0 order-md-1">
                        @csrf
                        @method('PUT')
                        <div class="card-title">
                            <h4 >Reklam Düzenle</h4>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-2">
                                <label class="form-label" for="addProductQuantity">Reklam Görseli</label>
                                <div id="dropContainer" class="drop-container">
                                    Dosyayı buraya sürükleyin veya seçmek için tıklayın
                                </div>
                                <input
                                    type="file"
                                    id="addProductQuantity"
                                    name="image"
                                    class="form-control"
                                    style="display: none;"
                                />
                                <span id="fileName" class="ml-2"></span>
                            </div>
                            <div class="col-6 mt-2">
                                <h4 class="form-label" for="addProductQuantity">Varsayılan Görseli</h4>
                                <img src="{{storage($swiperAdvert->image)}}" class="w-100" style="max-width: 300px">
                            </div>
                        </div>

                        <div class="col-12 text-start">
                            <button type="submit" class="btn btn-primary w-100" style="max-width: 400px">Kaydet</button>
                        </div>
                    </form>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
    @include('business.swiper-advert.modals.add-advert')
@endsection
@section('scripts')

    <script>
        const dropContainer = document.getElementById('dropContainer');
        const fileInput = document.getElementById('addProductQuantity');
        const fileName = document.getElementById('fileName');

        dropContainer.addEventListener('click', () => {
            fileInput.click();
        });

        dropContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropContainer.style.borderColor = '#333';
        });

        dropContainer.addEventListener('dragleave', () => {
            dropContainer.style.borderColor = '#ccc';
        });

        dropContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            fileInput.files = e.dataTransfer.files;
            updateFileName();
            dropContainer.style.borderColor = '#ccc';
        });

        fileInput.addEventListener('change', updateFileName);

        function updateFileName() {
            if (fileInput.files.length > 0) {
                fileName.textContent = fileInput.files[0].name;
            } else {
                fileName.textContent = '';
            }
        }

    </script>
@endsection
