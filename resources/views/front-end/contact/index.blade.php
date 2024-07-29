@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="contacts_page_banner">
        <div class="container">
            <div class="title">
                {{setting('contact_section_1_title')}}
            </div>
            <img src="/front/assets/images/home_page_bottom.svg" alt="">
            <div class="subtitle">{{setting('contact_section_1_sub_title')}}
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
                    <p>{{setting('contact_section_1_phone')}}
                    </p>
                </div>
                <div>
                    <h5>Tanışmak İsterseniz
                    </h5>
                    <p>Adresimiz
                    </p>
                    <p>{{setting('contact_section_1_address')}}
                    </p>
                </div>
                <div>
                    <h5>Bize Ulaşın
                    </h5>
                    <p>Mail Adresimiz
                    </p>
                    <p>{{setting('contact_section_1_email')}}
                    </p>
                </div>
            </div>
            <div class="contact_page_contact_form">
                <div class="left">
                    <h5>{{setting('contact_section_2_title')}}</h5>
                    <p>{{setting('contact_section_2_sub_title')}}</p>
                    <span>{{setting('contact_section_2_description')}}</span>
                    <form action="{{route('contact.form')}}" method="post">
                        @csrf
                        <div class="form">
                            <input type="text" required="" placeholder="Adınız/Soyadınız" class="w-100" name="name">
                        </div>
                        <div class="form">
                            <input type="text" required="" class="w-100" placeholder="Mail Adresi*" name="mail">
                            <input type="text" name="phone" class="w-100" placeholder="Cep Telefonu">
                        </div>
                        <div class="form">
                            <select name="subject" id="">
                                <option value="info">Yazmak İstediğiniz Konu</option>
                                <option value="Soru Sormak">Soru Sormak</option>
                                <option value="Bilgi Almak">Bilgi Almak</option>
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
                    {!! setting('contact_section_2_map') !!}
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')

@endsection
