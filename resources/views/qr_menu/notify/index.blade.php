@extends('qr_menu.layouts.master')
@section('title', 'Uyarı')
@section('styles')
    <style>
        .bg-label-warning {
            background-color: #fff1e3 !important;
            color: #ff9f43 !important;
        }
        .bg-label-success {
            background-color: #dff7e9 !important;
            color: #28c76f !important;
        }
        .bg-label-danger {
            background-color: #fce5e6 !important;
            color: #ea5455 !important;
        }
        .bg-label-secondary {
            background-color: #f2f2f3 !important;
            color: #a8aaae !important;
        }
        .bg-label-info {
            background-color: #d9f8fc !important;
            color: #00cfe8 !important;
        }
        .bg-label-success {
            background-color: #dff7e9 !important;
            color: #28c76f !important;
        }
    </style>
@endsection
@section('content')
    <section class="waiter">
        <div class="content">
            <svg xmlns="http://www.w3.org/2000/svg" width="149.567" height="149.581" viewBox="0 0 149.567 149.581">
                <g id="IVGST5.tif" transform="translate(-12482.013 -8218.461)">
                    <g id="Group_2071" data-name="Group 2071">
                        <g id="Group_2069" data-name="Group 2069">
                            <path id="Path_2227" data-name="Path 2227"
                                  d="M12631.58,8293.183a74.784,74.784,0,1,1-74.806-74.722A74.875,74.875,0,0,1,12631.58,8293.183Zm-10.28.03a64.5,64.5,0,1,0-64.513,64.548A64.67,64.67,0,0,0,12621.3,8293.213Z"
                                  fill="#f3f3f1" />
                        </g>
                        <g id="Group_2070" data-name="Group 2070">
                            <path id="Path_2228" data-name="Path 2228"
                                  d="M12549.655,8320.689l-24.44-20.789,6.485-7.819,17.459,14.615c13.484-13.65,26.9-27.233,40.411-40.9,2.377,2.509,4.658,4.918,7.045,7.436Z"
                                  fill="#f3f3f1" />
                        </g>
                    </g>
                </g>
            </svg>
            @if(session('response'))
                <h2 style="text-align: center;">

                </h2>
                <h2> {{session('response.message')}}</h2>
            @endif
                <a href="{{route('menu.index', $place->slug)}}">
                    <button class="btn btn-secondary returnMenu" type="button">
                        {{ __('Menüye Dön') }}
                    </button>
                </a>
        </div>
    </section>
@endsection

@section('scripts')

@endsection