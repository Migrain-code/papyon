@extends('business.layouts.master')
@section('title', 'Hesabım')
@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
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
            margin-top: 80px;
            font-size: 48px;
            font-family: adobe-clean-bold;
        }
        .menu-card {
            background-color: #d6cfc7;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
            min-height: 20cm;
            height: 20cm;
            max-width: 15cm;
            width: 15cm;
            position: relative;
        }

        .menu-card h1 {
            font-size: 36px;
            color: #e0d02d;
        }

        .menu-card h3 {
            font-size: 18px;
            color: #f6f2e1;
        }

        .menu-controls {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border: none;

        }
        #menuBorder {
            position: relative;
            min-height: 19cm;
            min-width: 14cm;
            border: 3px solid red;
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
        .logoArea {
            margin: 10px 0;
            min-height: 100px;
            max-height: 100px;
            height: 100px;
        }
        #table-number{
            background-color: black;
            padding: 5px;
            max-width: 130px;
            min-width: 130px;
            min-height: 30px;
            margin: auto;
            border-radius: 5px;
        }
        #menu_description {
            /* font-weight: 800; */
            padding-top: 15px;
            max-width: 230px;
            margin: 7px auto;
            font-size: 24px;
            font-family: 'Quicksand';
        }
        #footer{
            padding-top: 15px;
            font-weight: bold;
            font-size: 42px;
            left: 30%;
            font-family: "Alex Brush", cursive;
        }
        #qrcode{
            max-width: 150px;
            margin: auto;
            background: white;
            padding: 10px;
            border-radius: 8px;
            position: relative;
        }
        #qrImage{
            border-radius: 10px;
            max-width: 130px;
            max-height: 130px;
        }
        #logoImage{
            width: 500px;
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
                    @include('business.print.parts.preivew')
                    @include('business.print.parts.form')

                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.getElementById('logoInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logoImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('backgroundInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('menuCard').style.backgroundImage = `url(${e.target.result})`;
                    document.getElementById('menuCard').style.backgroundSize = 'cover'; // Arka planı kapsayacak şekilde ayarlar
                    document.getElementById('menuCard').style.backgroundPosition = 'center'; // Arka planın merkezlenmesini sağlar
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('titleInput').addEventListener('input', function() {
            document.getElementById('title').textContent = this.value;

        });
        document.getElementById('themeColor').addEventListener('input', function() {
            document.getElementById('menuCard').style.backgroundImage = null;
            document.getElementById('menuCard').style.backgroundColor = this.value;

        });
        document.getElementById('titleColorInput').addEventListener('input', function() {
            document.getElementById('title').style.color = this.value;
            document.getElementById('footer').style.color = this.value;
        });

        document.getElementById('tableBgColorInput').addEventListener('input', function() {
            document.getElementById('table-number').style.backgroundColor = this.value;
        });

        document.getElementById('tableFontColorInput').addEventListener('input', function() {
            document.getElementById('table-number').style.color = this.value;
        });
        document.getElementById('borderColor').addEventListener('input', function() {
            document.getElementById('menuBorder').style.borderColor = this.value;
        });
        document.getElementById('borderWidth').addEventListener('input', function() {
            document.getElementById('menuBorder').style.borderWidth = this.value+ "px";
        });
        document.getElementById('menuDescriptionInput').addEventListener('input', function() {
            document.getElementById('menu_description').textContent = this.value;
        });

        document.getElementById('menuDescriptionColorInput').addEventListener('input', function() {
            document.getElementById('menu_description').style.color = this.value;

        });

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
                    url: '{{route('business.print.store')}}',
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
        var apiUrl = '{{route('business.print.create')}}';
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
@endsection
