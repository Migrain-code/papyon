<section class="home_page_banner" style="background-image:url('/front/assets/images/1709131132_slide1-1.webp')">
    <div class="overlay"></div>
    <div class="container">
        <div class="home_page_banner_left p-5">
            {{--
                @php
                $text = "";
                foreach (explode('-', setting('section_1_title')) as $str){
                    $text .= $str." &amp; ";
                }

            @endphp
            <h3 class="typewrite" data-period="2000" data-type='[&quot;{!! $text !!} &quot;]'>
                <span class="wrap"></span>
            </h3>
            --}}

            <div class="home_page_banner_left_second">
                <h3>{{setting('section_2_title')}} </h3>
            </div>
            <div class="home_page_banner_left_third">
                <h3>{{setting('section_3_title')}} </h3>
            </div>
            <div class="home_page_banner_left_list">
                @php
                    $proparties = explode('-', setting('section_1_proparties'));
                @endphp
                <ul>
                    @foreach($proparties as $prop)
                        <li><span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                            <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                            </path>
                                        </svg></span>
                            <p>{{trim($prop)}} </p>
                        </li>
                    @endforeach



                </ul>
            </div>
            <div class="home_page_banner_left_forth">
                <div>
                    <a href="{{setting('section_1_purple_button_link')}}" class="third_button" style="">
                       {{setting('section_1_purple_button_text')}}
                    </a>
                    <a href="{{setting('section_1_white_button_link')}}" class="secondary_button">
                        {{setting('section_1_white_button_text')}}
                    </a>
                </div>
                <span>  {{setting('section_1_mini_title')}}</span>
            </div>
        </div>
        <div class="home_page_banner_right p-5">
            <img src="{{storage(setting('section_1_image'))}}" alt="">
        </div>
    </div>
</section>
