@extends('business.layouts.master')
@section('title', 'Gün Sonu Raporu')
@section('styles')
    <link rel="stylesheet" href="/business/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Mekanlar/</span> Mekan Listesi</h4>

        <div class="app-academy">
            <div class="card p-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                    <div class="app-academy-md-25 card-body py-0">
                        <img
                            src="/business/assets/img/illustrations/bulb-light.png"
                            class="img-fluid app-academy-img-height scaleX-n1-rtl"
                            alt="Bulb in hand"
                            data-app-light-img="illustrations/bulb-light.png"
                            data-app-dark-img="illustrations/bulb-dark.png"
                            height="90"
                            style="height: 140px;"
                        />
                    </div>
                    <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                        <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                            Hesabınıza Kayıtlı Olan
                            <span class="text-primary fw-medium text-nowrap">Tüm Mekanlar</span>.
                        </h3>
                        <p class="mb-3">
                            Burada eklediğiniz tüm şubeleriniz için tüm düzenleme, yönetim, şube kopyalama ve kaldırma işlerinizi yapabilirsiniz.
                        </p>

                    </div>
                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                        <img
                            src="/business/assets/img/illustrations/pencil-rocket.png"
                            alt="pencil rocket"
                            height="188"
                            class="scaleX-n1-rtl"
                            style="height: 140px;"
                        />
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Gün Sonu Raporu</h5>
                        <p class="text-muted mb-0">Bu İşletmenizden Bugün Yapmış Olduğunuz Kazanç</p>
                    </div>
                   <div class="d-flex align-items-center gap-2">
                       <button class="btn btn-primary" onclick="printTable()">Yazdır</button>
                       <form method="get" id="reportForm" action="{{route('business.place.todayReport', $place->id)}}">
                           <input type="text" name="date_range" value="{{request()->date_range}}" id="bs-rangepicker-range" class="form-control" />
                       </form>

                   </div>

                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">

                        <table class="table" id="printArea">
                            <thead>
                            <tr>
                                <th>Ödeme Yöntemi</th>
                                <th>Tutar (TL)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Nakit</td>
                                <td>{{formatPrice($case["cashTotal"])}}</td>
                            </tr>
                            <tr>
                                <td>Kredi Kartı</td>
                                <td>{{formatPrice($case["creditTotal"])}}</td>
                            </tr>
                            <tr>
                                <td>Havale</td>
                                <td>{{formatPrice($case["eftTotal"])}}</td>
                            </tr>
                            <tr>
                                <td>Diğer</td>
                                <td>{{formatPrice($case["otherTotal"])}}</td>
                            </tr>
                            <tr class="total-row fw-bold">
                                <td>Toplam</td>
                                <td>{{formatPrice($case["total"])}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="/business/assets/vendor/libs/moment/moment.js"></script>
    <script src="/business/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/business/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="/business/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="/business/assets/vendor/libs/pickr/pickr.js"></script>
    <script>
        var bsRangePickerRange = $('#bs-rangepicker-range');
        if (bsRangePickerRange.length) {
            bsRangePickerRange.daterangepicker({
                ranges: {
                    "Bugün": [moment(), moment()],
                    "Dün": [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Son 7 Gün': [moment().subtract(6, 'days'), moment()],
                    'Son 30 Gün': [moment().subtract(29, 'days'), moment()],
                    'Bu Ay': [moment().startOf('month'), moment().endOf('month')],
                    'Geçen Ay': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    format: 'DD.MM.YYYY', // Tarih formatı
                    separator: ' - ',
                    applyLabel: 'Uygula',
                    cancelLabel: 'İptal',
                    fromLabel: 'Başlangıç',
                    toLabel: 'Bitiş',
                    customRangeLabel: 'Özel',
                    daysOfWeek: ['Paz', 'Pts', 'Sal', 'Çar', 'Per', 'Cum', 'Cts'],
                    monthNames: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                    firstDay: 1 // Haftanın başlangıcı Pazartesi
                },
                opens: isRtl ? 'left' : 'right'
            });
        }
        bsRangePickerRange.on('change', function (){
            var selectedDate = $(this).val();
            $('#reportForm').submit();
        });
    </script>
    <script>
        function printTable() {
            // Tablonun içeriğini alın
            var tableContent = document.getElementById('printArea').outerHTML;

            // Yeni bir pencere açın
            var printWindow = window.open('', '', 'height=600,width=800');

            // Yeni pencereye stil ekleyin ve tabloyu yazdırma formatında ekleyin
            printWindow.document.write('<html><head><title>Yazdır</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
            printWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
            printWindow.document.write('.fw-bold { font-weight: bold; }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(tableContent);
            printWindow.document.write('</body></html>');

            // Pencereyi kapatmadan önce içeriği yazdır
            printWindow.document.close();
            printWindow.print();
        }
    </script>

    <!-- Page JS -->
@endsection
