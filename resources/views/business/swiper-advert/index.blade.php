@extends('business.layouts.master')
@section('title', 'Kampanyalar')
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
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span>Kampanyalar</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Kampanyalar! 🎉</h5>
                                <p class="mb-2">Tüm Reklam Alanlarınızın işlemlerini bu alanda yapabilirsiniz</p>
                                <h4 class="text-primary mb-1"></h4>
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
                        <!-- Fixed Header -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-title">
                                    <h4 >Kampanyalar</h4>
                                </div>
                                <div class="d-flex gap-3">
                                    <x-table-all-delete-button title="Seçilen Reklamları" model="App\Models\SwiperAdvert"></x-table-all-delete-button>
                                    <button class="btn btn-primary" data-bs-target="#addAdvertModal" data-bs-toggle="modal">Kampanya Oluştur</button>
                                </div>

                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-products table" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>
                                                <input class="form-check-input" id="serviceAllSelect" type="checkbox">
                                            </div>
                                        </th>
                                        <th>Başlık</th>
                                        <th>Görsel</th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Fixed Header -->
                    </div>
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
        var DATA_URL = "{{route('business.swiper-advert.datatable')}}";
        var DATA_COLUMNS = [
            {data: 'id'},
            {data: 'name'},
            {data: 'image'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        var updateUrl = "swiper-advert";
    </script>
    <script src="/business/assets/js/app-ecommerce-product-list.js"></script>
    <script src="/business/assets/js/project/claim/update-status.js"></script>
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
