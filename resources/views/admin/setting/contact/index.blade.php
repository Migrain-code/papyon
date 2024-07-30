@extends('admin.layouts.master')
@section('title', 'İletişim Sayfası')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">İletişim Sayfası/</span> Bölümler</h4>

        <div class="card my-4">
            <form class="card-body" method="post" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">
                @csrf
                <h6 >1. İletişim Bilgileri</h6>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">1. Başlık</label>
                        <input type="text" id="multicol-username" name="contact_section_1_title" value="{{setting('contact_section_1_title')}}" class="form-control" placeholder="" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">2. Başlık</label>
                        <input type="text" id="multicol-username" name="contact_section_1_sub_title" value="{{setting('contact_section_1_sub_title')}}" class="form-control" placeholder="" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">Telefon</label>
                        <input type="text" id="multicol-username" name="contact_section_1_phone" value="{{setting('contact_section_1_phone')}}" class="form-control" placeholder="" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">Açık Adres</label>
                        <input type="text" id="multicol-username" name="contact_section_1_address" value="{{setting('contact_section_1_address')}}" class="form-control" placeholder="" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">E-posta</label>
                        <input type="text" id="multicol-username" name="contact_section_1_email" value="{{setting('contact_section_1_email')}}" class="form-control" placeholder="" />
                    </div>


                </div>
                <hr/>
                <h6 class="mt-3">2. Form Bilgileri</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">2. Bölüm Başlık</label>
                        <input type="text" id="multicol-username" name="contact_section_2_title" value="{{setting('contact_section_2_title')}}" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">2. Bölüm Al Başlık</label>
                        <input type="text" id="multicol-username" name="contact_section_2_sub_title" value="{{setting('contact_section_2_sub_title')}}" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">2. Bölüm Kısa Açıklama</label>
                        <input type="text" id="multicol-username" name="contact_section_2_description" value="{{setting('contact_section_2_description')}}" class="form-control" placeholder="" />
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="multicol-username">
                            Map Embed (<span class="text-warning">Harita Kodunun Tamamanını İframe Olarak Yapıştırın</span> )
                        </label>
                        <textarea rows="5" name="contact_section_2_map" class="form-control" placeholder="">{{setting('contact_section_2_map')}}</textarea>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
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
