<script src="/business/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/business/assets/vendor/libs/popper/popper.js"></script>
<script src="/business/assets/vendor/js/bootstrap.js"></script>
<script src="/business/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="/business/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/business/assets/vendor/libs/hammer/hammer.js"></script>
<script src="/business/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/business/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/business/assets/vendor/js/menu.js"></script>
<script src="/business/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="/business/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="/business/assets/vendor/libs/select2/select2.js"></script>

<script src="/business/assets/js/main.js"></script>
<script src="/business/assets/js/app-ecommerce-dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Global Alert box-->
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
<!-- Global csrf variable-->

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

     div:where(.swal2-container) {
         z-index: 1100 !important;
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
<script>
    var counter = 0;
    $(document).on('keyup', '.phone', function (){
        if ($(this).val().startsWith('0')) {
            counter++;
            $(this).val("");
            if(counter == 3){
                alert('Telefon Numaranızın Başına "0" Eklemeden Yazınız');
                counter = 0;
            }
        }
    });

</script>
<audio id="success-sound" src="/business/assets/audio/order_create.mp3" preload="auto"></audio>

@vite(['resources/js/app.js'])


@yield('scripts')
