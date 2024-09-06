@extends('business.layouts.master')
@section('title', 'Masalar ve Bölgeler')
@section('styles')
    <style>
        .accordion-button {
            background: #7367f0 !important;
            color: white;
        }
        .accordion-header + .accordion-collapse .accordion-body {
            padding-top: 15px;
        }
        .accordion-button:not(.collapsed) {
            color: white;
        }
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Yarı saydam siyah */
            z-index: 9998; /* Yüksek z-index */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #242745; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')
    <div id="overlay" style="display:none;flex-direction: column">
        <div id="loader"></div>
        <div class="text-warning fs-4 mt-5 text-center" style="max-width: 500px">Bu işlem biraz uzun sürebilir bu sürede lütfen ekranı kapatmayınız. Pencereyi arka plana atıp bekleyebilrisniz</div>

    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Masalar ve Bölgeler/</span> Masa Listesi</h4>

        <div class="app-academy">
            <div class="card p-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                    <div class="app-academy-md-25 card-body py-0">
                        <img
                            src="/business/assets/img/illustrations/bulb-light.png"
                            class="img-fluid app-academy-img-height scaleX-n1-rtl"
                            alt="Bulb in hand"
                            data-app-light-img="illustrations/bulb-light.png"
                            data-app-dark-img="illustrations/bulb-dark.png"
                            height="90"
                            style="height: 140px;"
                        />
                    </div>
                    <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                        <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                            Bulunduğunuz Mekanda Kayıtlı Olan
                            <span class="text-primary fw-medium text-nowrap">Tüm Bölgeler ve Masalar</span>.
                        </h3>
                        <p class="mb-3">
                            Burada bu mekana eklediğiniz tüm bölgeler ve masalar için işlem yapabilirsiniz.
                        </p>

                    </div>
                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                        <img
                            src="/business/assets/img/illustrations/pencil-rocket.png"
                            alt="pencil rocket"
                            height="188"
                            class="scaleX-n1-rtl"
                            style="height: 140px;"
                        />
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Masalar ve Bölgeler</h5>
                        <p class="text-muted mb-0">Mekanınıza Kayıt Edilmiş Tüm Bölgeler Ve Masalar</p>
                    </div>
                    <button class="btn btn-label-primary" data-bs-toggle="modal" data-bs-target="#addRegionModal">Bölge Ekle</button>
                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        <div class="accordion accordion-custom-button mt-3" id="accordionCustom">
                            @forelse($regions as $region)

                                <div class="accordion-item @if($loop->index == 0) active @endif">
                                    <h2 class="accordion-header" id="headingCustom{{$region->id}}">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustom{{$region->id}}" aria-expanded="false" aria-controls="accordionCustom{{$region->id}}">
                                            {{$region->name}}
                                        </button>
                                    </h2>

                                    <div id="accordionCustom{{$region->id}}" class="accordion-collapse collapse @if($loop->index == 0)  show @else collapsed  @endif" aria-labelledby="headingCustom{{$region->id}}" data-bs-parent="#accordionCustom">
                                        <div class="accordion-body text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#backDropModal" onclick="addTable('{{$region->id}}')"
                                                >
                                                    <i class="fa fa-plus me-2"></i>
                                                    Masa Ekle
                                                </button>
                                                <a class="btn btn-warning mb-3" href="{{route('business.downloadRegion', $region->id)}}"
                                                >
                                                    <i class="fa fa-print me-2"></i>
                                                    İndir
                                                </a>
                                                <button class="btn btn-success mb-3 editRegionButton" data-url="{{route('business.region.update', $region->id)}}" data-name="{{$region->name}}">
                                                    <i class="fa fa-edit me-2"></i>
                                                    Düzenle
                                                </button>
                                                {!! create_html_delete_big_button('Region', $region->id,'Bölge','Bölge kaydını silmek istediğinize emin misiniz? Bölgeyi Sildiğinizde Altındaki Masalarda Silinecektir.',route('business.region.destroy', $region->id),true)!!}

                                            </div>
                                            <div class="row">
                                               @foreach($region->tables as $table)
                                                    <div class="col-2 card position-relative">

                                                        <div class="p-2">
                                                            <img src="{{storage($table->qr_code)}}" class="card-img-top" alt="...">
                                                        </div>
                                                        <div class="card-body text-center" style="padding: 0px;padding-top: 10px;">
                                                            <h5 class="card-title">{{$table->name}}</h5>

                                                            <div class="d-flex gap-2 mb-3">
                                                                <a class="btn btn-success" href="{{route('business.downloadTable', $table->id)}}"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-html="true"
                                                                        title="<em>İndir</em>">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                                <button class="btn btn-warning"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-html="true"
                                                                        title="<em>Düzenle</em>"
                                                                >
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                {!! create_html_delete_button('Table', $table->id,'Masa','Masa kaydını silmek istediğinize emin misiniz?',route('business.table.destroy', $table->id),true)!!}

                                                            </div>
                                                        </div>
                                                    </div>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse

                        </div>
                    </div>
                    <div class="navigationArea d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('business.table.modals.add-table')
    @include('business.table.modals.add-region')
    @include('business.table.modals.edit-region')
@endsection
@section('scripts')
    <script>

        function addTable(region_id){
            $('[name="region_id"]').val(region_id);
        }
        function downloadRegion(regionId){
            $.ajax({
                url: `download/${regionId}/zip`,
                type: "GET",
                dataType: "JSON",
                success: function (res) {
                    Swal.fire({
                        text: 'Klasörünüz Hazılanıyor',
                        icon: 'Lütfen Biraz Bekleyiniz. Masa sayınıza bağlı olarak bekleme süreniz artabilir ',
                        buttonsStyling: false,
                        confirmButtonText: "Tamam, devam et!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        }

        $('.editRegionButton').on('click', function (){
           var dataUrl = $(this).data('url');
           var dataName = $(this).data('name');

           var modal = new bootstrap.Modal(document.querySelector('#editRegionModal'));
           $('[name="region_new_name"]').val(dataName);
           $('#editRegionForm').attr('action', dataUrl);
           modal.show();
        });

        $('.addTableBtn').on('click', function (){
            document.getElementById('overlay').style.display = 'flex';
        });
    </script>
@endsection
