<script>
    $(document).ready(function() {
        $(".close-button").click(function() {
            $(".menu").toggleClass("show-menu");
            $(".layer").toggleClass("modal-backdrop fade show");
            $(".close-button").toggleClass("d-none");
            $("#menuRedLine").toggleClass("d-none");
            // $(".close-button").siblings().toggleClass("d-none");
            // $("#toggleAdvice").toggleClass("d-none");
            // $("#toggleAdvice").siblings().toggleClass("d-none");
        })
        $("#toggleMenu").click(function() {
            $(".layer").toggleClass("modal-backdrop fade show");
            $(".menu").toggleClass("show-menu");
            // $("#toggleMenu").toggleClass("d-none");
            $(".close-button").toggleClass("d-none");
            $("#toggleAdvice").toggleClass("d-none");
            $("#menuRedLine").toggleClass("d-none");
            $("#toggleAdvice").siblings().toggleClass("d-none");
        })
        $(".callWaiterButton").click(function() {
            $(".callWaiter").toggleClass("callWaiterShow");
            $(".layer").toggleClass("modal-backdrop fade show");
        })
        $(".callWaiterButtonFromMain").click(function() {
            $(".callWaiter").toggleClass("callWaiterShow");
        })
        $(".close-button-waiter").click(function() {
            $(".callWaiter").toggleClass("callWaiterShow");
            $(".layer").toggleClass("modal-backdrop fade show");
        })
        $("#popStack").click(function() {
            window?.history?.back();
        })
    })
    document.addEventListener('DOMContentLoaded', function() {
            //location.href = "{{-- route('menu') --}}";
    })

    function handleWaiter() {
        $('#tableNo').val();
    }

    function demandTheAccount() {
        $('#handleAccountForm').submit();
    }
</script>
<script type="text/javascript">
    var otherLanguage = @json($place->other_languages);

    function googleTranslateElementInit() {
        otherLanguage.push('{{$place->main_language}}');
        new google.translate.TranslateElement({
            pageLanguage: "{{ $place->main_language }}",
            includedLanguages: otherLanguage.join(','),
            // includedLanguages: "tr,en,de,az,fr",
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
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
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect("#select-beast",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('select-beast');
        var placeholderOption = document.createElement('option');
        placeholderOption.text = "{{ __('Menüde Arayın') }}...";
        placeholderOption.value = "";
        placeholderOption.disabled = true;
        placeholderOption.selected = true;
        selectElement.insertBefore(placeholderOption, selectElement.firstChild);
    });
</script>
@yield('scripts')
