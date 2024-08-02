@extends('business.layouts.master')
@section('title', 'Hesabım')
@section('styles')
    <style>

        .menu-editor {
            display: flex;
            margin: auto;
        }

        .menu-preview {
            flex: 1;
            padding: 20px;
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
            border: 1px solid #ccc;
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
        #menu_description{

            padding-top: 15px;
            max-width: 300px;
            margin:15px auto;
        }
        #footer{
            padding-top: 15px;
            font-weight: bold;
            font-size: 18px;
            left: 41%;
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
            width: 300px;
        }
    </style>
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">QR Ayarları/</span> Çıktı Al</h4>
        <div class="card">
            <div class="card-header">
                Menü Şablonuzu Oluşturun
            </div>
            <div class="card-body">
                <div class="menu-editor">
                    <div class="menu-preview">
                        <div class="menu-card" id="menuCard">
                            <div class="logoArea">
                                <img id="logoImage" src="/business/assets/img/test_logo.png">
                            </div>
                            <h2 id="title">TEMASSIZ MENÜ</h2>
                            <div id="qrcode">
                                <img id="qrImage" src="/business/assets/img/150.png" alt="QR Code">
                            </div>
                            <div id="table-number"></div>
                            <div id="menu_description">Siparişiniz İçin Online Menüye Karekod Akıllı Telefonunuzdan Okutunuz</div>
                            <div id="footer" style="position: absolute;bottom: 5px">Afiyet Olsun</div>
                        </div>
                    </div>
                    <div class="menu-controls">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Logo</label>
                                <input type="file" name="logo"  class="form-control" id="logoInput">
                            </div>
                            <div class="form-group col-6">
                                <label>Şablon Arka Plan</label>
                                <input type="color" name="theme_color" style="height: 40px"  class="form-control" id="themeColor">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label>Başlık</label>
                                <input type="text" name="title" class="form-control" id="titleInput">
                            </div>
                            <div class="form-group col-6">
                                <label>Başlık Yazı Rengi</label>
                                <input type="color" name="title" style="height: 40px" class="form-control" id="titleColorInput">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Masa Adı Arka Plan</label>
                                <input type="color" name="table_name_bg_color" style="height: 40px" class="form-control" id="tableBgColorInput">
                            </div>
                            <div class="form-group col-6">
                                <label>Masa Adı Yazı Rengi</label>
                                <input type="color" name="table_name_font_color" style="height: 40px" class="form-control" id="tableFontColorInput">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Menü Açıklama Metni</label>
                                <input type="text" name="menu_description" class="form-control" id="menuDescriptionInput">
                            </div>
                            <div class="form-group col-6">
                                <label>Menü Açıklama Metni Yazı Rengi</label>
                                <input type="color" name="menu_description_font_color" style="height: 40px" class="form-control" id="menuDescriptionColorInput">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <a class="btn btn-primary w-100" href="javascript:void(0)" onclick="createTheme()">Şablonu Masalara Uygula</a>

                        </div>
                    </div>
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

        document.getElementById('titleInput').addEventListener('input', function() {
            document.getElementById('title').textContent = this.value;
        });
        document.getElementById('themeColor').addEventListener('input', function() {
            document.getElementById('menuCard').style.backgroundColor = this.value;
        });
        document.getElementById('titleColorInput').addEventListener('input', function() {
            document.getElementById('title').style.color = this.value;
        });

        document.getElementById('tableBgColorInput').addEventListener('input', function() {
            document.getElementById('table-number').style.backgroundColor = this.value;
        });

        document.getElementById('tableFontColorInput').addEventListener('input', function() {
            document.getElementById('table-number').style.color = this.value;
        });

        document.getElementById('menuDescriptionInput').addEventListener('input', function() {
            document.getElementById('menu_description').textContent = this.value;
        });

        document.getElementById('menuDescriptionColorInput').addEventListener('input', function() {
            document.getElementById('menu_description').style.color = this.value;
            document.getElementById('footer').style.color = this.value;
        });
        document.getElementById('generateBase64').addEventListener('click', function() {
            convertMenuCardToBase64();

        });
        function convertMenuCardToBase64() {
            const menuCard = document.getElementById('menuCard');
            html2canvas(menuCard).then(canvas => {
                const base64Image = canvas.toDataURL('image/png');
                //document.getElementById('menuCardBase64').value = base64Image;
                $.ajax({
                    url :'{{route('business.print.store')}}',
                    method: 'POST',
                    data: {
                        '_token' : csrf_token,
                        'menuCardBase64' : base64Image,
                    },
                    success:function (){
                        console.log('şablon oluşturuldu');
                    }
                })
            });
        }

    </script>

    <script>
        var apiUrl = '{{route('business.print.create')}}';
        async function createTheme() {
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
                convertMenuCardToBase64();

            }
        }
    </script>
@endsection
