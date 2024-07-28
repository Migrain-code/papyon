<script href="/business/assets/assets/vendor/libs/jquery/jquery.js"></script>
<script href="/business/assets/assets/vendor/libs/popper/popper.js"></script>
<script href="/business/assets/assets/vendor/js/bootstrap.js"></script>
<script href="/business/assets/assets/vendor/libs/node-waves/node-waves.js"></script>
<script href="/business/assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script href="/business/assets/assets/vendor/libs/hammer/hammer.js"></script>
<script href="/business/assets/assets/vendor/libs/i18n/i18n.js"></script>
<script href="/business/assets/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script href="/business/assets/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script href="/business/assets/assets/vendor/libs/@form-validation/popular.js"></script>
<script href="/business/assets/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script href="/business/assets/assets/vendor/libs/@form-validation/auto-focus.js"></script>

<!-- Main JS -->
<script href="/business/assets/assets/js/main.js"></script>

<!-- Page JS -->
<script href="/business/assets/assets/js/pages-auth.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    body.swal2-toast-shown .swal2-container {
        z-index: 1200;
        box-sizing: border-box;
        width: 360px;
        max-width: 100%;
        background-color: rgba(0, 0, 0, 0);
        pointer-events: none;
    }
</style>

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

    div:where(.swal2-container) {
        z-index: 1100 !important;
    }
</style>
@yield('scripts')
</body>
</html>
