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
