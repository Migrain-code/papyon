@extends('admin.layouts.master')
@section('title', 'Galeri Düzenle')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2"><span class="text-muted fw-light"> </span>Galeri Düzenle</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <!-- Multi Column with Form Separator -->
                <div class="card">
                   <div class="card-body">
                       <!-- User Content -->
                       <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.gallery.update', $gallery->id)}}" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')

                           <div class="col-12 mt-2">
                               <label class="form-label" for="addProductQuantity">Görsel <a href="{{storage($gallery->image)}}" target="_blank">Göster</a></label>
                               <input
                                   type="file"
                                   id="addProductQuantity"
                                   name="image"
                                   class="form-control"

                               />
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
