@extends('admin.layouts.master')
@section('title', 'Sayfa Düzenle')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/editor.css" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2"><span class="text-muted fw-light"> </span>Sayfa Düzenle</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <!-- Multi Column with Form Separator -->
                <div class="card">
                   <div class="card-body">
                       <!-- User Content -->
                       <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.page.update', $page->id)}}" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Kategori</label>
                               <select class="form-select" name="category_id">
                                   <option value="">Kategori Seçiniz</option>
                                   <option value="0" selected>Sözleşme Sayfası</option>

                               </select>
                           </div>
                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Başlık</label>
                               <input
                                   type="text"
                                   id="addProductQuantity"
                                   name="title"
                                   class="form-control"
                                   value="{{$page->title}}"

                               />
                           </div>

                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Açıklama</label>
                               <div id="full-editor">{!! $page->description !!}</div>
                               <input type="hidden" value="{!! $page->description !!}" name="blog_content" id="editorContent">
                           </div>
                           <div class="col-12 text-center">
                               <button type="submit" class="btn btn-primary me-sm-3 me-1">Kaydet</button>
                               <button
                                   type="reset"
                                   class="btn btn-label-secondary"
                                   data-bs-dismiss="modal"
                                   aria-label="Close">
                                   Kapat
                               </button>
                           </div>
                       </form>

                       <!--/ User Content -->
                   </div>
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
@endsection
@section('scripts')
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