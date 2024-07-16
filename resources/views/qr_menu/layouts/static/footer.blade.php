
@if($footerVisibility)

    <footer class="footer">
        <div class="menu">
            <ul>
                @foreach($menuOrders as $menu)
                    @php
                        $route = $menu->getMenu("route");
                        $route = str_replace('lat', $place->latitude, $route);
                        $route = str_replace('long', $place->longitude, $route);

                    @endphp
                    <li>

                        <a href="{{$route}}" id="{{$menu->getMenu("id")}}">
                            {!! $menu->getMenu('icon') !!}
                            <span>{{ __($menu->getMenu('name')) }}</span></a>
                    </li>
                @endforeach
            </ul>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icons-tabler-outline icon-tabler-x close-button d-none"
                width="24"  height="24"
                viewBox="0 0 24 24"  fill="none"
                stroke="currentColor"
                stroke-width="2"  stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>

        </div>

        <div class="layer"></div>
        <div class="callWaiter">
            <svg class="plate" xmlns="http://www.w3.org/2000/svg" width="316" height="316" viewBox="0 0 316 316">
                <g id="Group_391" data-name="Group 391" transform="translate(-1777 -10542)">
                    <circle id="Ellipse_12" data-name="Ellipse 12" cx="158" cy="158" r="158" transform="translate(1777 10542)" fill="#e0483d"></circle>
                </g>
                <g id="Rx8AUB.tif" transform="translate(-1777 -10542)">
                    <g id="Group_398" data-name="Group 398">
                        <g id="Group_394" data-name="Group 394">
                            <path id="Path_407" data-name="Path 407" d="M1944.405,10635.045c4.826,4.521,9.778,8.917,14.444,13.6,5.2,5.22,10.382,10.5,15.158,16.1,10.594,12.427,15.159,27.244,16.256,43.288.309,4.512.427,9.037.642,13.776h-142.25c-2.031-32.957,27.071-81.538,73.547-90.306-2.608-7.172-1.513-13.4,5.2-17.767a12.833,12.833,0,0,1,14.9.706c5.716,4.545,6.689,10.394,4.044,17,43.711,7.98,74.859,53.426,73.778,90.4h-15.834c-.062-1.141-.164-2.323-.184-3.508-.179-11.019-1.488-21.866-4.946-32.381-5.2-15.82-15.186-28.044-28.959-37.032-7.887-5.146-16.382-9.364-24.609-13.989a5.429,5.429,0,0,0-.989-.332Z" fill="#fff"></path>
                        </g>
                        <g id="Group_395" data-name="Group 395">
                            <path id="Path_408" data-name="Path 408" d="M2041.273,10763.35c-4,16.7-7.927,33.091-11.965,49.946a13.29,13.29,0,0,1-1.458-2.571c-1.23-4.664-4.268-5.5-8.822-5.439-21.561.271-43.128.146-64.693.063a8.606,8.606,0,0,1-4.435-1.312q-26.461-17.3-52.814-34.768c-3.055-2.017-3.829-4.287-2.446-7.071a5.9,5.9,0,0,1,7.74-2.731c8.682,3.463,17.322,7.029,25.979,10.555,2.624,1.067,5.434,1.822,7.843,3.252,11.7,6.941,24.465,5.138,37.023,4.63,6.4-.259,12.787-1.182,19.151-2.015,1.852-.242,3.608-1.215,5.408-1.853l-.106-.9c-2.485-.7-4.961-1.433-7.456-2.093q-15.335-4.056-30.68-8.077c-3.233-.851-4.509-2.755-4.01-5.966.473-3.043,3.11-5.508,5.945-5.377,7.651.354,15.3.773,22.949,1.18,7.932.423,15.9.525,23.78,1.416,5,.567,9.909,2.192,14.794,3.569C2028.986,10759.475,2034.905,10761.4,2041.273,10763.35Z" fill="#fff"></path>
                        </g>
                        <g id="Group_396" data-name="Group 396">
                            <path id="Path_409" data-name="Path 409" d="M2036.3,10743.422H1834.963v-15.84H2036.3Z" fill="#fff"></path>
                        </g>
                        <g id="Group_397" data-name="Group 397">
                            <path id="Path_410" data-name="Path 410" d="M2082,10832.218l-44.945-5.2c4.92-20.5,9.775-40.736,14.7-61.241l30.249,4.566Z" fill="#fff"></path>
                        </g>
                    </g>
                </g>
            </svg>

            <svg class="close-button-waiter" xmlns="http://www.w3.org/2000/svg" width="74" height="74"
                 viewBox="0 0 74 74">
                <g id="Group_905" data-name="Group 905" transform="translate(-3233 -11198)">
                    <g id="Group_903" data-name="Group 903">
                        <circle id="Ellipse_13" data-name="Ellipse 13" cx="37" cy="37" r="37"
                                transform="translate(3233 11198)" fill="#f3f3f1" />
                    </g>
                    <g id="Group_904" data-name="Group 904">
                        <path id="Path_1093" data-name="Path 1093"
                              d="M3286.134,11212.338l-15.958,15.063-15.063-15.958-7.51,7.089,15.063,15.958-15.958,15.063,7.088,7.51,15.958-15.062,15.063,15.958,7.51-7.089-15.063-15.958,15.958-15.062Z"
                              fill="#e0483d" />
                    </g>
                </g>
            </svg>
            <div class="top">
                <p>{{ __('Vale çağırmak için araç plakanızı girmeniz gerekmektedir.') }}</p>
            </div>
            <form action="{{route('call.vale', $place->slug)}}" method="post">
                @csrf
                <div class="middle">
                    <span>{{ __('Araç Plakanız') }}</span>
                    <div class="formItem">
                        <input type="text" name="text" class="" placeholder="35 AB 1525">
                    </div>
                </div>
                <a>
                    <button type="submit">{{ __('Vale Çağır') }}</button>
                </a>
            </form>
        </div>

        <div class="callTaxi">
            <svg class="plate" xmlns="http://www.w3.org/2000/svg" width="316" height="316" viewBox="0 0 316 316">
                <g id="Group_391" data-name="Group 391" transform="translate(-1777 -10542)">
                    <circle id="Ellipse_12" data-name="Ellipse 12" cx="158" cy="158" r="158" transform="translate(1777 10542)" fill="#e0483d"></circle>
                </g>
                <g id="Rx8AUB.tif" transform="translate(-1777 -10542)">
                    <g id="Group_398" data-name="Group 398">
                        <g id="Group_394" data-name="Group 394">
                            <path id="Path_407" data-name="Path 407" d="M1944.405,10635.045c4.826,4.521,9.778,8.917,14.444,13.6,5.2,5.22,10.382,10.5,15.158,16.1,10.594,12.427,15.159,27.244,16.256,43.288.309,4.512.427,9.037.642,13.776h-142.25c-2.031-32.957,27.071-81.538,73.547-90.306-2.608-7.172-1.513-13.4,5.2-17.767a12.833,12.833,0,0,1,14.9.706c5.716,4.545,6.689,10.394,4.044,17,43.711,7.98,74.859,53.426,73.778,90.4h-15.834c-.062-1.141-.164-2.323-.184-3.508-.179-11.019-1.488-21.866-4.946-32.381-5.2-15.82-15.186-28.044-28.959-37.032-7.887-5.146-16.382-9.364-24.609-13.989a5.429,5.429,0,0,0-.989-.332Z" fill="#fff"></path>
                        </g>
                        <g id="Group_395" data-name="Group 395">
                            <path id="Path_408" data-name="Path 408" d="M2041.273,10763.35c-4,16.7-7.927,33.091-11.965,49.946a13.29,13.29,0,0,1-1.458-2.571c-1.23-4.664-4.268-5.5-8.822-5.439-21.561.271-43.128.146-64.693.063a8.606,8.606,0,0,1-4.435-1.312q-26.461-17.3-52.814-34.768c-3.055-2.017-3.829-4.287-2.446-7.071a5.9,5.9,0,0,1,7.74-2.731c8.682,3.463,17.322,7.029,25.979,10.555,2.624,1.067,5.434,1.822,7.843,3.252,11.7,6.941,24.465,5.138,37.023,4.63,6.4-.259,12.787-1.182,19.151-2.015,1.852-.242,3.608-1.215,5.408-1.853l-.106-.9c-2.485-.7-4.961-1.433-7.456-2.093q-15.335-4.056-30.68-8.077c-3.233-.851-4.509-2.755-4.01-5.966.473-3.043,3.11-5.508,5.945-5.377,7.651.354,15.3.773,22.949,1.18,7.932.423,15.9.525,23.78,1.416,5,.567,9.909,2.192,14.794,3.569C2028.986,10759.475,2034.905,10761.4,2041.273,10763.35Z" fill="#fff"></path>
                        </g>
                        <g id="Group_396" data-name="Group 396">
                            <path id="Path_409" data-name="Path 409" d="M2036.3,10743.422H1834.963v-15.84H2036.3Z" fill="#fff"></path>
                        </g>
                        <g id="Group_397" data-name="Group 397">
                            <path id="Path_410" data-name="Path 410" d="M2082,10832.218l-44.945-5.2c4.92-20.5,9.775-40.736,14.7-61.241l30.249,4.566Z" fill="#fff"></path>
                        </g>
                    </g>
                </g>
            </svg>

            <svg class="close-button-taxi" xmlns="http://www.w3.org/2000/svg" width="74" height="74"
                 viewBox="0 0 74 74">
                <g id="Group_905" data-name="Group 905" transform="translate(-3233 -11198)">
                    <g id="Group_903" data-name="Group 903">
                        <circle id="Ellipse_13" data-name="Ellipse 13" cx="37" cy="37" r="37"
                                transform="translate(3233 11198)" fill="#f3f3f1" />
                    </g>
                    <g id="Group_904" data-name="Group 904">
                        <path id="Path_1093" data-name="Path 1093"
                              d="M3286.134,11212.338l-15.958,15.063-15.063-15.958-7.51,7.089,15.063,15.958-15.958,15.063,7.088,7.51,15.958-15.062,15.063,15.958,7.51-7.089-15.063-15.958,15.958-15.062Z"
                              fill="#e0483d" />
                    </g>
                </g>
            </svg>
            <div class="top">
                <p>{{ __('Taxi çağırmak için Ad Soyad bilginizi girmeniz gerekmektedir.') }}</p>
            </div>
            <form action="{{route('call.taxi', $place->slug)}}" method="post">
                @csrf
                <div class="middle">
                    <span>{{ __('Adınız Soyadınız') }}</span>
                    <div class="formItem">
                        <input type="text" name="text" class="" placeholder="Jon Deo">
                    </div>
                </div>
                <a>
                    <button type="submit">{{ __('Taxi Çağır') }}</button>
                </a>
            </form>
        </div>
    </footer>
@endif


@include('qr_menu.layouts.components.modal.footer-modals')
@include('qr_menu.layouts.components.scripts')

</body>
</html>
