@extends('business.layouts.master')
@section('title', 'Şablonlar')
@section('styles')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="app-academy">
            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Tüm Şablonlar</h5>
                        <p class="text-muted mb-0">Qr kodlarınızı aşağıdaki şablonlardan birini seçerek oluşturabilirsiniz</p>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @forelse($templates as $template)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="card-body p-3 pt-2">
                                        <div class="rounded-2 text-center mb-3 position-relative" >
                                            <img class="img-fluid rounded" onclick="window.open('{{ storage($template->image) }}', '_blank')" style="max-height: 250px;" src="{{storage($template->image)}}" alt="tutor image 1"/>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                            <a
                                                class="app-academy-md-50 btn btn-label-primary d-flex align-items-center w-100"
                                                href="{{route('business.menu-template.show', $template->id)}}">
                                                <span class="me-2">Bu Şablonu Kullan</span>
                                                <i class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
