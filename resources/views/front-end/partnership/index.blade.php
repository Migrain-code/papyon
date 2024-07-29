@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="contacts_page_banner">
        <div class="container">
            <div class="title">
                Papyoon QR Menü, Bayilere Özel Avantajlı Fiyatlar
            </div>
            <img style="filter: sepia(1);" src="/front/assets/images/home_page_bottom.svg" alt="">
            <div class="subtitle">Bulunduğunuz bölgede mevcut müşteri portföyünüze veya yeni edineceğiniz kafe, restoran, otel vb. işletmelere yeni nesil dijital menü olan Papyoon Qr Menü sistemini sunmak için iş ortağımız olun.</div>
        </div>
    </section>
    <section class="dealership_page_form">
        <div class="container">
            <form action="{{route('partnership.store')}}" method="POST">
               @csrf
                <div class="form">
                    <input name="name" value="{{old('name')}}" type="text" placeholder="Ad/Soyad" required>
                    <input name="phone" value="{{old('phone')}}" placeholder="Cep Telefonu Numarası" type="text">
                </div>
                <div class="form">
                    <input required="" name="email" value="{{old('email')}}" type="email" placeholder="E-Mail Adresiniz">
                    <input name="company_age" value="{{old('company_age')}}" placeholder="Şirket Yaşınız" type="number">
                </div>
                <div class="form">
                    <select name="city_id" required="" placeholder="Şehir Seçiniz">
                        <option value="0">Şehir Seçiniz</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @selected(old('city_id') == $city->id)>{{$city->name}}</option>
                        @endforeach
                    </select>
                    <select name="customer_count" placeholder="Mevcut Müşteri Sayısı">
                        <option value="0">Mevcut Müşteri Sayısı</option>
                        @for($i = 1 ; $i <= 150; $i++)
                            <option value="{{$i}}" @selected($i == old('customer_count'))>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="form">
                    <select name="target_customer_count">
                        <option value="0">Hedef Müşteri Sayısı</option>
                        @for($i = 1 ; $i <= 150; $i++)
                            <option value="{{$i}}" @selected($i == old('target_customer_count'))>{{$i}}</option>
                        @endfor
                    </select>
                    <input name="other_companies" value="{{old('other_companies')}}" type="text" placeholder="Bayilik Yaptığınız Diğer Firmalar">
                </div>
                <div class="form">
                    <textarea name="note" id="" cols="30" rows="7" placeholder="Notunuz">{{old('note')}}</textarea>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="terms" required="" style="width: 30px;height: 20px" id="privacy-policiy">
                    <label for="privacy-policiy">
                        Bu formu doldurarak, <a href="gizlilik-politikas%C4%B1.html">Papyoon Qr Menü Gizlilik Politikası ve Veri İşleme
                            İlkeleri’ni
                        </a>
                        okuyup
                        anladığımı kabul ediyor ve kişisel verilerimin işlenmesine izin veriyorum..
                    </label>
                </div>
                <div class="submit_button">
                    <button data-bs-toggle="" data-bs-target="" class="third_button" style="">
                        Başvurumu Gönder
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
