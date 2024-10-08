<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{storage(setting('site_favicon'))}}"/>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
    rel="stylesheet"/>

<!-- Icons -->
<link rel="stylesheet" href="/business/assets/vendor/fonts/fontawesome.css"/>
<link rel="stylesheet" href="/business/assets/vendor/fonts/tabler-icons.css"/>
<link rel="stylesheet" href="/business/assets/vendor/fonts/flag-icons.css"/>

<!-- Core CSS -->
<link rel="stylesheet" href="/business/assets/vendor/css/rtl/core.css" class="template-customizer-core-css"/>
<link rel="stylesheet" href="/business/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css"/>
<link rel="stylesheet" href="/business/assets/css/demo.css"/>

<!-- Vendors CSS -->
<link rel="stylesheet" href="/business/assets/vendor/libs/node-waves/node-waves.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/typeahead-js/typeahead.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/apex-charts/apex-charts.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css"/>
<link rel="stylesheet" href="/business/assets/vendor/libs/select2/select2.css"/>
<!-- Helpers -->
<script src="/business/assets/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="/business/assets/vendor/js/template-customizer.js"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="/business/assets/js/config.js"></script>
<style>
    .dayArea {
        min-height: 25px;
        min-width: 250px;
    }
    @media (max-width: 576px) {
        .dayArea{
            display: none;
        }

    }
    @media (max-width: 768px) {
        .dtr-control{
            display: flex;
        }
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.dtr-control:before, table.dataTable.dtr-inline.collapsed > tbody > tr > th.dtr-control:before {
            margin-right: 0.5em;
            display: flex !important;

            color: white !important;
            content: "+";
            /* padding: 5px; */
            background: #7367f0;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            justify-content: center;
            align-items: center;
            margin-top: 1px;
        }
        table.dataTable.dtr-inline.collapsed > tbody > tr.parent > td.dtr-control:before, table.dataTable.dtr-inline.collapsed > tbody > tr.parent > th.dtr-control:before {
            content: "-";
        }
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.dtr-control:before, table.dataTable.dtr-inline.collapsed > tbody > tr > th.dtr-control:before {
            margin-right: 0.5em;
            display: inline-block;
            color: rgba(0, 0, 0, 0.5);
            content: "+";
        }
    }

</style>

@yield('styles')
