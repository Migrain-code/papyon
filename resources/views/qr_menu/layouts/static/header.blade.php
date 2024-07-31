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

    <header class="header" style="{{$styles}}" id="goToTop">
        <a href="{{url()->previous()}}" class="left" id="popStack">
            <svg width="22" height="36" viewBox="0 0 22 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.8273 -0.364314L17.361 -0.802592L17.0485 -0.244189C16.982 -0.125311 16.9056 -0.0123077 16.8201 0.0936985C11.1831 5.74865 5.53458 11.3934 -0.125708 17.0277L-0.126521 17.0285C-0.304436 17.2064 -0.529208 17.4752 -0.498149 17.8359C-0.483138 18.0102 -0.411554 18.1507 -0.339373 18.2557C-0.269555 18.3572 -0.182604 18.4489 -0.101861 18.5284C5.55804 24.1723 11.2096 29.8251 16.8529 35.487L16.8547 35.4888C16.9911 35.6243 17.2297 35.8507 17.5623 35.8549C17.9006 35.8591 18.1448 35.6334 18.2905 35.4876L18.2906 35.4876L18.2953 35.4827C19.5251 34.2191 20.7659 32.9711 22.0393 31.7603L22.0397 31.76C22.248 31.5615 22.4962 31.2765 22.4726 30.8919C22.461 30.7045 22.387 30.55 22.3072 30.4303C22.2294 30.3135 22.1298 30.2058 22.0318 30.1084L22.0316 30.1083C20.2821 28.3694 18.5353 26.6238 16.7879 24.8777C14.4651 22.5564 12.1413 20.2342 9.80897 17.9259C9.73725 17.8548 9.69438 17.804 9.66937 17.7695C9.69932 17.7293 9.74855 17.6737 9.82904 17.5931C12.2158 15.2233 14.5961 12.8442 16.9759 10.4658C18.6815 8.76109 20.3869 7.05669 22.0941 5.3562L22.0941 5.35612C22.1685 5.282 22.253 5.1943 22.3222 5.09884C22.3925 5.00182 22.4696 4.86664 22.493 4.69523C22.544 4.32079 22.3148 4.04126 22.1202 3.85443L22.1198 3.85402C21.1816 2.95533 20.2651 2.03767 19.3438 1.11533C18.985 0.756101 18.6255 0.396159 18.2637 0.0363508L18.263 0.0356598C18.1989 -0.0278337 18.1327 -0.0869984 18.0662 -0.146498L18.0661 -0.146564L18.0608 -0.151338C17.9939 -0.211092 17.9198 -0.277372 17.8273 -0.364314Z" fill="#F3F3F1" stroke="#F3F3F1"/>
            </svg>

        </a>
        <div class="middle">
            <a href="{{route('menu.index', $place->slug)}}">
                <img src="{{storage($place->logo)}}" style="max-width: 190px;max-height: 40px;min-height: 40px;">
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
                <svg xmlns="http://www.w3.org/2000/svg" id="searchIconArea" style="display: none" width="43.643" height="51.634"
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


