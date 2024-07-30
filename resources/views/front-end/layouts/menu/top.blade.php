<header class="top_header">
    <div class="container">
        <div class="top_header_mark">
            <a href="{{route('front.index')}}">
                <img src="{{storage(setting('site_white_logo'))}}" style="height: 40px;width: 170px">
            </a>
        </div>
        <div class="top_header_list">
            <ul>
                <li><a href="{{route('property.index')}}">Özellikler</a>
                    <img src="/front/assets/images/circle.svg" alt="">
                </li>

                <li><a href="{{route('package.index')}}">Paketler</a> <img src="/front/assets/images/circle.svg" alt="">
                </li>
                <li><a href="{{route('partnership.index')}}">İş Ortaklığı</a> <img src="/front/assets/images/circle.svg" alt=""></li>
                <li><a href="{{route('contact.index')}}">İletişim</a> <img src="/front/assets/images/circle.svg" alt="">
                </li>
                <li>
                        <span>
                              <img src="/front/assets/images/turkey.png" alt="">
                                <span>TUR</span>
                                    <svg class="w-64 h-64" xmlns="http://www.w3.org/2000/svg"
                                         enable-background="new 0 0 24 24" viewbox="0 0 24 24"
                                         fill="currentColor">
                                            <rect fill="none" height="24" width="24"></rect>
                                        <path
                                             d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M12,15.5L7.5,11l1.42-1.41L12,12.67 l3.08-3.08L16.5,11L12,15.5z">
                                        </path>
                                    </svg>
                        </span>
                    <div class="top_header_list_languages">
                            <span onclick="handleCookie('tr')">
                                <img src="/front/assets/images/turkey.png" alt="">TUR
                                 </span>
                        <span onclick="handleCookie('de')"> <img src="/front/assets/images/germany.png" alt="">GER

                            </span>
                        <span onclick="handleCookie('en')"> <img src="/front/assets/images/united-kingdom.png" alt="">ENG

                            </span>
                        <span onclick="handleCookie('az')"> <img src="/front/assets/images/azerbaijan.png" alt="">AZR

                            </span>
                        <span onclick="handleCookie('fr')"> <img src="/front/assets/images/france.png" alt="">FR
                            </span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="header_button_group">
            <button data-bs-toggle="modal" data-bs-target="#exampleModalToggle" type="button" class="primary_button">
                Demo İste
                <img src="/front/assets/images/right_arrow.svg">
            </button>
            <a href="{{route('login')}}">
                <button style="" class="secondary_button">
                    Giriş Yap
                </button>
            </a>
        </div>
    </div>
</header>
