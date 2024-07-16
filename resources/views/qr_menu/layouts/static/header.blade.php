<!doctype html>

<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{$place->name. " | "}} @yield('title')</title>

    <style>
        ::-webkit-scrollbar{
            width: 5px;
        }
        ::-webkit-scrollbar-track{
            background-color: white;
        }
        ::-webkit-scrollbar-thumb{
            background-color: #e0483d;
            border-radius: 5px;
        }
        iframe{
            display: none !important;
        }
        .goog-te-gadget .goog-te-combo {
            background: #e0483d;
            color: #fff;
            font-size: 12px;
            border-color: #fff;
            padding: 10px;
            border-radius: 10px;
            min-width: 200px;
        }
    </style>
    @include('qr_menu.layouts.components.styles')
</head>

<body>
<!-- Layout wrapper -->
    @php
        $styles = "";
        $inputStyles = "";
        if (isset($place->wallpaper)){
            $styles = "min-height: 180px; background-image: url('".storage($place->wallpaper)."');background-size: cover";
            $inputStyles = "top:125px";
        }
    @endphp

    <header class="header" style="{{$styles}}" >
        <a href="{{url()->previous()}}" class="left" id="popStack">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="35.356" viewBox="0 0 22 35.356">
                <g id="Group_22" data-name="Group 22" transform="translate(-5403 -3653.322)">
                    <path id="Path_18" data-name="Path 18"
                          d="M5420.485,3653.322c.2.188.319.285.426.391,1.285,1.278,2.555,2.571,3.863,3.824.352.338.255.5-.033.787-4.092,4.076-8.167,8.168-12.265,12.237-.4.4-.465.6-.019,1.042,4.088,4.046,8.142,8.127,12.222,12.182.363.361.417.553.016.935-1.28,1.217-2.526,2.47-3.758,3.736-.3.3-.439.289-.73,0q-8.466-8.494-16.957-16.961c-.3-.295-.359-.455-.023-.791q8.5-8.461,16.965-16.953A2.923,2.923,0,0,0,5420.485,3653.322Z"
                          fill="#f3f3f1" />
                </g>
            </svg>
        </a>
        <div class="middle">
            <a href="{{route('menu.index', $place->slug)}}">
                <img src="{{storage($place->logo)}}" style="max-width: 190px;max-height: 40px">
            </a>
        </div>

        <div class="bottomss" style="{{$inputStyles}}">
            <div class="input">
                <select id="select-beast" autocomplete="off">
                    <option value="">{{__('Menüde Arayın')}}...</option>
                    @foreach($categories as $category)
                        <optgroup label="{{$category->name}}">
                            @foreach($category->products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="43.643" height="51.634"
                     viewBox="0 0 43.643 51.634">
                    <g id="Group_1116" data-name="Group 1116" transform="translate(-2798.356 -3782.369)">
                        <path id="Path_1276" data-name="Path 1276"
                              d="M2801.367,3811.808a19.146,19.146,0,0,1,28.709-24.74,18.41,18.41,0,0,1,6.368,11.7,19.094,19.094,0,0,1-6.05,16.96c2.935,3.988,5.8,7.886,8.671,11.783.824,1.118,1.666,2.222,2.474,3.351a1.887,1.887,0,1,1-2.985,2.293c-.26-.319-.5-.659-.74-.992l-10.4-14.191A19.326,19.326,0,0,1,2801.367,3811.808Zm31.339-8.182a15.357,15.357,0,1,0-17.383,13.083A15.379,15.379,0,0,0,2832.706,3803.626Z"
                              fill="#a3acb8" />
                    </g>
                </svg>
            </div>
            <div class="item">
                <a target="_blank" href="{{instagramLink($place->instagram)}}">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"
                          stroke="currentColor"  stroke-width="2"
                          stroke-linecap="round"  stroke-linejoin="round"
                          class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                    </svg>
                </a>
            </div>
            <div data-bs-toggle="modal" data-bs-target="#languageModal" class="item">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"
                      fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"
                      stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-language">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 5h7" />
                    <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
                    <path d="M5 9c0 2.144 2.952 3.908 6.7 4" />
                    <path d="M12 20l4 -9l4 9" />
                    <path d="M19.1 18h-6.2" />
                </svg>
            </div>
            <div class="item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"
                      fill="none"  stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"  stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-wifi">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 18l.01 0" />
                    <path d="M9.172 15.172a4 4 0 0 1 5.656 0" />
                    <path d="M6.343 12.343a8 8 0 0 1 11.314 0" />
                    <path d="M3.515 9.515c4.686 -4.687 12.284 -4.687 17 0" />
                </svg>
            </div>
        </div>

    </header>


