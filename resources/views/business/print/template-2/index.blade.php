@extends('business.layouts.master')
@section('title', 'Hesabım')
@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/>

    <style>

        .menu-editor {
            display: flex;
            margin: auto;
        }

        .menu-preview {
            flex: 1;
            padding: 20px;
        }
        #title{
            max-width: 227px;
            color: #2c2e35;
            font-family: adobe-clean-bold;
            font-weight: bold;
            font-size: 23px !important;
        }
        .topBg{
            height: 20cm;
            max-width: 15cm;
            width: 15cm;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgb(209 43 29 / 80%);
        }
        .menu-card {
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
            min-height: 20cm;
            height: 20cm;
            max-width: 15cm;
            width: 15cm;
            position: relative;
            background-image: url('/business/template/dekor.svg');
            background-size: cover;
        }
        .logoArea{
            margin-bottom: 30px;
            margin-top: 30px;
            position: relative;
        }
        .menu-controls {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border: none;

        }

        .menu-controls label {
            display: block;
            margin-top: 10px;
        }

        .menu-controls input,
        .menu-controls textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .borderBox{
            width: 200px;
            height: 230px;

        }
        .custom-table {
            width: 100%;
            color: #B85640;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .custom-table td {
            border-top: 2px solid #B85640;
            border-bottom: 2px solid #B85640;
            padding: 10px;
        }

        .custom-table .slogan {
            width: 60%;
            border-right: 2px solid #B85640;
            padding: 15px 0px;
            text-align: left;
        }

        .custom-table .bahce {
            width: 40%;
            text-align: center;
        }

        .custom-table .bahce span {
            font-weight: bold;
        }

        .logo {
            font-size: 24px;
            color: #B85640;
            font-weight: bold;
            margin-top: 40px;
        }
        #logoImage{
            width: 400px;
            height: 90px;
            max-height: 90px;
            min-height: 90px;
            min-width: 400px;
            max-width: 400px;
            object-fit: cover;
        }
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Yarı saydam siyah */
            z-index: 9998; /* Yüksek z-index */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #242745; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')
    <div id="overlay" style="display:none;flex-direction: column">
        <div id="loader"></div>
        <div class="alert alert-warning mt-5">Şablonlar Oluşturana Kadar Siteyi Kapatmayın</div>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">QR Ayarları/</span> Çıktı Al</h4>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4> Menü Şablonuzu Oluşturun</h4>
                <a class="btn btn-primary d-none" id="showTemplateButton" style="" href="{{route('business.placeTemplate.index')}}">Şablonları Göster</a>
            </div>
            <div class="card-body">
                <div class="menu-editor">
                    @include('business.print.template-2.parts.preivew')
                    @include('business.print.template-2.parts.form')

                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr"></script>

    <script>
        document.getElementById('logoInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const allowedFormats = ['image/png', 'image/jpeg', 'image/jpg'];
                if (allowedFormats.includes(file.type)) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('logoImage').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Sadece PNG, JPG, ve JPEG dosya formatlarına izin verilmektedir.');
                }
            }
        });


        /*document.getElementById('themeColor').addEventListener('input', function() {
            document.getElementById('topBg').style.backgroundColor = this.value;

        });*/

        $(function (){
            changeTextColors();
        });
        function changeTextColors() {
            // SVG elementini seç
            $('.cls-1').css('fill', '#c5483e');//qr çerçeve
            $('.cls-3').css('fill', '#000000');//scan me yazısı
            $('.cls-4').css('fill', '#000000');//okutunuz metni
            $('.cls-5').css('fill', '#000000');//tel icon

        }
        function convertMenuCardToBase64(tableName) {
            const menuCard = document.getElementById('menuCard');
            const factor = 300 / 96;
            html2canvas(menuCard, {
                scale: factor, // Ölçekleme faktörünü artırın
                useCORS: true, // CORS sorunlarını önlemek için
                allowTaint: true, // Taint sorunlarını önlemek için
            }).then(canvas => {
                const base64Image = canvas.toDataURL('image/png');
                // document.getElementById('menuCardBase64').value = base64Image;
                $.ajax({
                    url: '{{route('business.create-template.store')}}',
                    method: 'POST',
                    data: {
                        '_token': csrf_token,
                        'menuCardBase64': base64Image,
                        'table_id': tableName
                    },
                    success: function () {
                        console.log('şablon oluşturuldu');
                    }
                });
            });
        }

    </script>

    <script>
        var apiUrl = '{{route('business.create-template.create')}}';
        async function createTheme() {
            document.getElementById('overlay').style.display = 'flex';

            const response = await $.ajax({
                'url': apiUrl,
                dataType: 'JSON',
                'method': 'GET'
            });

            for (let i = 0; i < response.length; i++) {
                const item = response[i];
                document.getElementById('qrImage').src = item.image;
                document.getElementById('table-number').innerText = item.name;
                await new Promise(resolve => setTimeout(resolve, 1000)); // 1 saniye bekle
                convertMenuCardToBase64(item.id);

            }
            document.getElementById('overlay').style.display = 'none';
            $('#showTemplateButton').removeClass('d-none');
            Toast.fire({
               'icon' : "success",
               'title' : "Şablon Tüm Masalara Uygulandı"
            });
        }
    </script>
    <script>
        (function () {
            const pickers = document.querySelectorAll('.color-picker-classic');

            pickers.forEach(picker => {
                const pickrInstance = Pickr.create({
                    el: picker,
                    theme: 'classic',
                    default: 'rgba(102, 108, 232, 1)',
                    swatches: [
                        'rgba(102, 108, 232, 1)',
                        'rgba(40, 208, 148, 1)',
                        'rgba(255, 73, 97, 1)',
                        'rgba(255, 145, 73, 1)',
                        'rgba(30, 159, 242, 1)'
                    ],
                    components: {
                        // Main components
                        preview: true,
                        opacity: true,
                        hue: true,

                        // Input / output Options
                        interaction: {
                            hex: true,
                            rgba: true,
                            hsla: true,
                            hsva: true,
                            cmyk: true,
                            input: true,
                            clear: true,
                            save: true
                        }
                    }
                });

                pickrInstance.on('change', (color) => {
                    const rgbaColor = color.toRGBA().toString();
                    const targetId = picker.getAttribute('data-color-id');
                    const targetElement = document.getElementById(targetId);
                    const attributeName = picker.getAttribute('data-attribute-name');
                    const className = picker.getAttribute('data-class-name');

                    if (className) {
                        const elements = document.querySelectorAll(`.${className}`);
                        elements.forEach(element => {
                            element.style[attributeName] = rgbaColor;
                        });
                    } else if (targetId) {
                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            targetElement.style[attributeName] = rgbaColor;
                        }
                    }
                });
            });
        })();
    </script>
@endsection
