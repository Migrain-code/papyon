@extends('admin.layouts.master')
@section('title', 'Anasafa')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Ayarlar/</span> Bölümler</h4>

        <div class="card my-4">
            <h5 class="card-header" data-i18n="1.Bölüm / Header">1.Bölüm / Header</h5>
            <form class="card-body" method="post" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">
                @csrf
                @include('admin.setting.steps.step-1')
                @include('admin.setting.steps.step-2')
                @include('admin.setting.steps.step-3')
                @include('admin.setting.steps.step-4')


                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Oluştur</button>
                    <button type="button" onclick="location.reload()" class="btn btn-label-secondary">Temizle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summerNote').summernote({
                'height': 200,
            });
        });
    </script>
@endsection
