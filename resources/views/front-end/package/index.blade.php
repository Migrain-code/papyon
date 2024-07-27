@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="packages_page_packages">
        <div class="container">
            <div class="packages">
                <div class="packages_top_title">
                    Paketler &amp; Özellikleri
                </div>
                <div class="packages_middle_title">
                    30 gün boyunca ÜCRETSİZ deneyin!
                    <div class="qr_menu_card_title_line"></div>
                </div>
                <div class="packages_sub_title">
                    Kredi kartı gerekmez ve devam etmek zorunda değilsiniz.
                </div>
                <div class="packages_page_extra">
                    <div class="packages_buttons">
                        <button id="packages_mounth" class="packages_buttons_active">Aylık</button>
                        <button id="packages_year">Yıllık <img src="images/discount.svg" alt=""></button>
                    </div>
                    <div class="packages_items">
                        <div class="packages_items_item">
                            <div class="title"> </div>
                            <div class="price mountly_price">333333 TL <span>/AY</span></div>
                            <div class="price annual_price d-none">222222 TL <span>/YIL</span></div>
                            <div class="props">
                                <ul>
                                    <li>
                                        <p>testtt</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>

                                </ul>
                            </div>
                            <div class="packages_items_item_button">
                                <button data-bs-toggle="" data-bs-target="" class="third_button" style="">
                                    Hemen Başla
                                </button>
                            </div>
                        </div>
                        <div class="packages_items_item">
                            <div class="title"> </div>
                            <div class="price mountly_price">400 TL <span>/AY</span></div>
                            <div class="price annual_price d-none">1500 TL <span>/YIL</span></div>
                            <div class="props">
                                <ul>
                                    <li>
                                        <p>testtt</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>
                                    <li>
                                        <p>test3</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>

                                </ul>
                            </div>
                            <div class="packages_items_item_button">
                                <button data-bs-toggle="" data-bs-target="" class="third_button" style="">
                                    Hemen Başla
                                </button>
                            </div>
                        </div>
                        <div class="packages_items_item">
                            <div class="title"> </div>
                            <div class="price mountly_price">200 TL <span>/AY</span></div>
                            <div class="price annual_price d-none">1200 TL <span>/YIL</span></div>
                            <div class="props">
                                <ul>
                                    <li>
                                        <p>testtt</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>
                                    <li>
                                        <p>test3</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>
                                    <li>
                                        <p>test1</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>
                                    <li>
                                        <p>test2</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>
                                    <li>
                                        <p>test3</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>
                                    <li>
                                        <p>test4</p> <span><svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                </path>
                                            </svg></span>
                                    </li>

                                </ul>
                            </div>
                            <div class="packages_items_item_button">
                                <button data-bs-toggle="" data-bs-target="" class="third_button" style="">
                                    Hemen Başla
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $("#packages_mounth").click(function() {
                    $("#packages_mounth").addClass("packages_buttons_active");
                    $("#packages_year").removeClass("packages_buttons_active");
                    $(".annual_price").addClass("d-none");
                    $(".mountly_price").removeClass("d-none");
                })
                $("#packages_year").click(function() {
                    $("#packages_year").addClass("packages_buttons_active");
                    $("#packages_mounth").removeClass("packages_buttons_active");
                    $(".mountly_price").addClass("d-none");
                    $(".annual_price").removeClass("d-none");
                })
            </script>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
