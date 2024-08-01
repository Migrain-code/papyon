<section>
    <div class="container">
        <div class="packages">
            <div class="packages_top_title">
                {{setting('section_5_title')}}
            </div>
            <div class="packages_middle_title">
                {{setting('section_5_sub_title')}}

            </div>
            <div class="packages_sub_title">
                {{setting('section_5_min_title')}}
            </div>
            <div class="packages_page_extra">
                <style>
                    .newCard {
                        background: #3b3176;
                        padding: 4px;
                        border-radius: 10px;
                        font-size: 12px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: absolute;
                        top: -11px;
                        right: 3%;
                        /* width: 130px; */
                        color: white;
                    }
                </style>
                <div class="packages_items">
                    @foreach($packages as $package)
                        <form class="packages_items_item position-relative" method="get" action="{{route('business.subscribtion.payForm', $package->slug)}}">
                            <div class="title d-flex justify-content-between w-100">
                                <div class="">{{$package->name}} </div>
                                <div class="">{{$package->price. " TL"}}</div>
                                @if($loop->index == 1)
                                    <span class="newCard">Önerilen</span>
                                @endif
                            </div>
                            <div class="props">
                                <ul>
                                    @foreach($package->proparties as $proparty)
                                        <li>

                                            <p>{{\Illuminate\Support\Str::limit($proparty->name, 30)}} @if($proparty->price > 0) ({{"+".$proparty->price. " TL"}}) @endif</p>
                                            <span>
                                                @if($proparty->price > 0)
                                                    <label class="switch">
                                                        <input type="checkbox" name="added_proparties[]" value="{{$proparty->id}}">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <svg version="1.2" baseprofile="tiny" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                                        <path d="M16.972 6.251c-.967-.538-2.185-.188-2.72.777l-3.713 6.682-2.125-2.125c-.781-.781-2.047-.781-2.828 0-.781.781-.781 2.047 0 2.828l4 4c.378.379.888.587 1.414.587l.277-.02c.621-.087 1.166-.46 1.471-1.009l5-9c.537-.966.189-2.183-.776-2.72z">
                                                        </path>
                                                    </svg>
                                                @endif

                                            </span>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                            <div class="packages_items_item_button">
                                <button class="third_button" style="">
                                    Hemen Başla
                                </button>
                            </div>
                        </form>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
</section>
