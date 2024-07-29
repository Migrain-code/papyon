@extends('admin.layouts.master')
@section('title', 'Talep Düzenle')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2"><span class="text-muted fw-light"> </span>Talep Detayı</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">
                <!-- Multi Column with Form Separator -->
                <div class="card">
                   <div class="card-body">
                       <!-- User Content -->
                       <form id="editUserForm" class="row g-3" method="post" action="{{route('admin.partnership.update', $partnership->id)}}" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="col-6 mt-2">
                               <label class="form-label">Ad/Soyad</label>
                               <input class="form-control" name="name" value="{{$partnership->name}}" type="text" placeholder="Ad/Soyad" required>
                           </div>
                           <div class="col-6 mt-2">
                               <label class="form-label">Telefon Numarası</label>
                               <input class="form-control" name="phone" value="{{$partnership->phone}}" placeholder="Cep Telefonu Numarası" type="text">
                           </div>
                           <div class="col-6 mt-2">
                               <label class="form-label">E-Posta Adresi</label>
                               <input class="form-control" required="" name="email" value="{{$partnership->email}}" type="email" placeholder="E-Posta Adresiniz">
                           </div>
                           <div class="col-6 mt-2">
                               <label class="form-label">Şirket Yaşınız</label>
                               <input class="form-control" name="company_age" value="{{$partnership->company_age}}" placeholder="Şirket Yaşınız" type="number">
                           </div>

                           <div class="col-6 mt-2">
                               <label class="form-label">Şehir</label>
                               <select name="city_id" class="form-control" required="" placeholder="Şehir Seçiniz">
                                   <option value="0">Şehir Seçiniz</option>
                                   @foreach($cities as $city)
                                       <option value="{{$city->id}}" @selected($partnership->city_id == $city->id)>{{$city->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-6 mt-2">
                               <label class="form-label">Mevcut Müşteri Sayısı</label>
                               <select name="customer_count" class="form-control" placeholder="Mevcut Müşteri Sayısı">
                                   <option value="0">Mevcut Müşteri Sayısı</option>
                                   @for($i = 1 ; $i <= 150; $i++)
                                       <option value="{{$i}}" @selected($i ==$partnership->customer_count)>{{$i}}</option>
                                   @endfor
                               </select>
                           </div>
                           <div class="col-6 mt-2">
                               <label class="form-label">Hedef Müşteri Sayısı</label>
                               <select name="target_customer_count" class="form-control">
                                   <option value="0">Hedef Müşteri Sayısı</option>
                                   @for($i = 1 ; $i <= 150; $i++)
                                       <option value="{{$i}}" @selected($i == $partnership->goal_customer_count)>{{$i}}</option>
                                   @endfor
                               </select>
                           </div>
                           <div class="col-6 mt-2">
                               <label class="form-label">Bayilik Yaptığınız Diğer Firmalar</label>
                               <input name="other_companies" class="form-control" value="{{$partnership->other_companies}}" type="text" placeholder="Bayilik Yaptığınız Diğer Firmalar">
                           </div>
                           <div class="col-12 mt-2">
                               <label class="form-label">Not</label>
                               <textarea name="note" class="form-control" id="" cols="30" rows="7" placeholder="Notunuz">{{$partnership->note}}</textarea>

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
