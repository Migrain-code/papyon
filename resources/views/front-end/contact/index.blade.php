@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="contacts_page_banner">
        <div class="container">
            <div class="title">
                İletişim Bilgileri
            </div>
            <img src="/front/assets/images/home_page_bottom.svg" alt="">
            <div class="subtitle">Papyoon QR Menü İletişim
            </div>
        </div>
    </section>
    <section class="contacts_page_contact">
        <div class="container">
            <div class="contact_page_contact_top">
                <div>
                    <h5>Bizi Direkt Olarak
                    </h5>
                    <p>Aramak İsterseniz
                    </p>
                    <p>0212 4682345
                    </p>
                </div>
                <div>
                    <h5>1234 Ari Sokak
                    </h5>
                    <p>Aramak İsterseniz
                    </p>
                    <p>Midyat İlçesi, Mardin Şehir
                    </p>
                </div>
                <div>
                    <h5>Bize Ulaşın
                    </h5>
                    <p>Mail Adresimiz
                    </p>
                    <p>hizlirandevu@gmail.com
                    </p>
                </div>
            </div>
            <div class="contact_page_contact_form">
                <div class="left">
                    <h5>Bizimle İletişime Geç</h5>
                    <p>Aklındaki Soruları Yazabilirsin</p>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, mollitia dolores veniam
                                                                                            doloremque</span>
                    <form action="" method="post">
                        <div class="form">
                            <input type="text" required="" placeholder="Adınız*" name="name"><input type="text" name="surname" required="" placeholder="Soyadınız*">
                        </div>
                        <div class="form">
                            <input type="text" required="" placeholder="Mail Adresi*" name="mail"><input type="text" name="phone" placeholder="Cep Telefonu">
                        </div>
                        <div class="form">
                            <select name="subject" id="">
                                <option value="info">Yazmak İstediğiniz Konu</option>
                                <option value="info">Soru Sormak</option>
                                <option value="info">Bilgi Almak</option>
                            </select>
                        </div>
                        <div class="form">
                            <textarea name="message" placeholder="Lütfen Buraya Yazın*" required="" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form">
                            <button data-bs-toggle="" data-bs-target="" class="third_button" style="">
                                Gönder
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <img src="/front/assets/images/map.svg" alt="">
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')

@endsection
