<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="/business/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/business/assets/vendor/libs/popper/popper.js"></script>
<script src="/business/assets/vendor/js/bootstrap.js"></script>
<script src="/business/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="/business/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/business/assets/vendor/libs/hammer/hammer.js"></script>
<script src="/business/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/business/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/business/assets/vendor/js/menu.js"></script>

<!-- Vendors JS -->
<script src="/business/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="/business/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="/business/assets/vendor/libs/select2/select2.js"></script>

<!-- Main JS -->
<script src="/business/assets/js/main.js"></script>

<!-- Page JS -->
<script src="/business/assets/js/app-ecommerce-dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var csrf_token = "{{csrf_token()}}";
</script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,//3sn
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
@if(session('response'))
    <script>
        Toast.fire({
            icon: '{{session('response.status')}}',
            title: '{{session('response.message')}}',

        })
    </script>
@endif
@if($errors->any())
    <script>
        var errors = [];
        @foreach ($errors->all() as $error)
        errors.push("{{ $error }}");
        @endforeach

        Swal.fire({
            title: 'Hata',
            icon: 'error',
            html: errors.join("<br>"),
            confirmButtonText: "Tamam"
        });
    </script>
@endif
<style>
    .swal2-popup.swal2-toast .swal2-title {
        margin: 0.5em 1em;
        padding: 0;
        font-size: 1em;
        text-align: initial;
        color: black !important;
        font-weight: 700 !important;

    }
</style>
<script src="/business/assets/js/custom.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script>
    $(document).ready(function () {
        $(".phone").inputmask({
            mask: "999 999 9999",
        });
    });
</script>

@yield('scripts')
