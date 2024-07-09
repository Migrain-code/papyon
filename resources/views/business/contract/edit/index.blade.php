@extends('business.layouts.master')
@section('title', 'Sözleşme Düzenle')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="/business/assets/vendor/libs/quill/editor.css" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <form method="post" id="contractForm" action="{{route('business.contract.update', $contract->id)}}" class="card-body order-0 order-md-1">
                        @csrf
                        @method('PUT')
                        <div class="card-title">
                            <h4 >Sözleşme Düzenle</h4>
                        </div>
                        <div class="row">
                            <input type="hidden" name="editorContent" id="editorContent">
                            <div class="col-12 mt-2">
                                <label class="form-label" for="addProductQuantity">Başlık</label>
                                <input
                                    type="text"
                                    id="addProductQuantity"
                                    name="title"
                                    class="form-control"
                                    value="{{$contract->title}}"
                                />
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label" for="full-editor">Açıklama</label>
                                <div id="full-editor">{!! $contract->description !!}</div>
                            </div>
                        </div>

                        <div class="col-12 text-start mt-3">
                            <button type="submit" class="btn btn-primary w-100" style="max-width: 400px">Kaydet</button>
                        </div>
                    </form>
                    <!--/ User Content -->
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
        document.getElementById('contractForm').addEventListener('submit', function(e) {

            //e.preventDefault();

            // Get Quill editor HTML content
            const quillContent = fullEditor.root.innerHTML;

            // Set the hidden input's value to the Quill editor HTML content
            document.getElementById('editorContent').value = quillContent;

        });
    </script>
@endsection
