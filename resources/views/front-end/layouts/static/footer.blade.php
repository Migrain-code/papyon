
<footer>
    <div class="container">
        <div class="top">
            <div class="top_left">
                <h2>Papyoon</h2>
            </div>
            <div class="top_right">
                <a href="kaydol.html"> Demolarımız</a>
                <a href="paketler.html"> Paketlerimiz</a>
                <a href="iletisim.html"> Destek</a>
                <a href="blog.html"> Blog</a>
            </div>
        </div>
        <div class="middle">
            <div class="middle_first">
                <h5>İletişime Geç <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewbox="0 0 24 24" fill="currentColor">
                        <rect fill="none" height="24" width="24"></rect>
                        <path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M12,15.5L7.5,11l1.42-1.41L12,12.67 l3.08-3.08L16.5,11L12,15.5z">
                        </path>
                    </svg> </h5>
                <div>
                    <div>
                        <svg class="custom_icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                            <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p>G.M.K.P Mah. Kartal Sokak No:20 Daire:10</p>
                        <p><a href="tel:05537021355">
                                05537021355</a> </p>
                        <p><a href="mail:destek@papyoon.com">
                                destek@papyoon.com</a> </p>
                    </div>
                </div>
            </div>
            <div class="middle_second">
                <h5>İşletmeler İçin <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewbox="0 0 24 24" fill="currentColor">
                        <rect fill="none" height="24" width="24"></rect>
                        <path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M12,15.5L7.5,11l1.42-1.41L12,12.67 l3.08-3.08L16.5,11L12,15.5z">
                        </path>
                    </svg></h5>
                <p>
                    <a href="{{route('login')}}">Giriş Yap</a>
                </p>
                <p>
                    <a href="{{route('register')}}">KayıtOl</a>
                </p>
                <p>
                    <a href="sss.html">S.S.S</a>
                </p>
            </div>
            <div class="middle_third">
                <h5>Önerilen Linkler <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewbox="0 0 24 24" fill="currentColor">
                        <rect fill="none" height="24" width="24"></rect>
                        <path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M12,15.5L7.5,11l1.42-1.41L12,12.67 l3.08-3.08L16.5,11L12,15.5z">
                        </path>
                    </svg></h5>
                <p><a href="ozellikler.html">Özellikler</a></p>
                <p><a href="referanslar.html">Referanslar</a></p>
                <p><a href="is-birligi.html">İş Ortaklığı</a></p>
                <p><a href="entegrasyonlar.html">Entegrasyonlar</a></p>
            </div>
            <div class="middle_fourth">
                <h5>Yardım <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewbox="0 0 24 24" fill="currentColor">
                        <rect fill="none" height="24" width="24"></rect>
                        <path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M12,15.5L7.5,11l1.42-1.41L12,12.67 l3.08-3.08L16.5,11L12,15.5z">
                        </path>
                    </svg></h5>
                <p><a href="index.htm">Hakkımızda</a></p>
                <p><a href="{{route('contact.index')}}">İletişim</a></p>
            </div>
        </div> <br>
        <div class="end">
            <div>
                @foreach($terms as $term)
                    <a href="{{route('page.detail', $term->slug)}}">{{$term->title}}</a>
                @endforeach
            </div>
            <div>© Papyoon Qr Menü Tüm hakları saklıdır.</div>
            <div>
                <svg class="end_icons" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                    </path>
                </svg>
                <svg class="end_icons" xmlns="http://www.w3.org/2000/svg" role="img" viewbox="0 0 24 24" fill="currentColor">
                    <title>X</title>
                    <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z">
                    </path>
                </svg>
                <svg class="end_icons" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
    <div id="google_translate_element"></div>

</footer>

@include('front-end.layouts.components.modal.footer-modals')
@include('front-end.layouts.components.scripts')

</body>
</html>
