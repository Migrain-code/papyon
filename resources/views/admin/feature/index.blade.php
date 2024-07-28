@extends('admin.layouts.master')
@section('title', 'Özellikler')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/editor.css" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span>Özellikler</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Özellikler! 🎉</h5>
                                <p class="mb-2">Tüm Özellikler işlemlerini bu alanda yapabilirsiniz</p>
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
                                    <h4 >Özellikler</h4>
                                </div>
                                <div class="d-flex gap-3">
                                    <x-table-all-delete-button title="Seçilen Özellikleri" model="App\Models\Feature"></x-table-all-delete-button>
                                    <button class="btn btn-primary" data-bs-target="#addAdvertModal" data-bs-toggle="modal">Özellik Ekle</button>
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
    @include('admin.feature.modals.add-advert')
@endsection
@section('scripts')
    <script>
        var DATA_URL = "{{route('admin.feature.datatable')}}";
        var DATA_COLUMNS = [
            {data: 'id'},
            {data: 'title'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'action'}
        ];
        var updateUrl = "feature";
        var statusUrl = "admin";
    </script>
    <script src="/business/assets/js/app-ecommerce-product-list.js"></script>
    <script src="/business/assets/js/project/claim/update-status.js"></script>

    <script>
        var fullEditor;
    </script>
    <script src="/business/assets/vendor/libs/quill/katex.js"></script>
    <script src="/business/assets/vendor/libs/quill/quill.js"></script>
    <script src="/business/assets/js/forms-editors.js"></script>
    <script>
        document.getElementById('editUserForm').addEventListener('submit', function(e) {

            //e.preventDefault();

            // Get Quill editor HTML content
            const quillContent = fullEditor.root.innerHTML;

            // Set the hidden input's value to the Quill editor HTML content
            document.getElementById('editorContent').value = quillContent;

        });
    </script>
@endsection
