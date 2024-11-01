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
        });
        $(".layer").click(function() {
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
        $("#callWaiterButton").click(function() {
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

        $("#callTaxiButton").click(function() {
            $(".callTaxi").toggleClass("callTaxiShow");
            $(".layer").toggleClass("modal-backdrop fade show");
        })
        $(".callTaxiButtonFromMain").click(function() {
            $(".callTaxi").toggleClass("callTaxiShow");
        })
        $(".close-button-taxi").click(function() {
            $(".callTaxi").toggleClass("callTaxiShow");
            $(".layer").toggleClass("modal-backdrop fade show");
        });

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
<script src="/qr_menu/assets/css/tom-select.complete.min.js"></script>
<script>
    var routeTemplate = '{{ route('productDetail', ['slug' => $place->slug, 'product' => ':product']) }}';

    new TomSelect("#select-beast", {
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        },
         onInitialize: function() {
                document.getElementById('searchIconArea').style.display = 'block';
            }
    });

    $('#select-beast').on('change', function (){
        var productId = $(this).val();
        var slug = $(this).data('slug'); // 'slug' değerini data attribute'undan alıyoruz

        var routeDirect = routeTemplate.replace(':product', productId);

        window.location.href = routeDirect;
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
<script>
    const swiper = new Swiper('#mainPageSwiper', {
        loop: true,
        autoplay: {
            delay: 1700, // Her slaytın gösterilme süresi (ms)
            disableOnInteraction: false, // Kullanıcı etkileşiminden sonra otomatik oynatmayı durdurmaz
        },
        pagination: {
            el: '.swiper-pagination',
        },

    });

</script>
<script>
    const swiper2 = new Swiper('#mainPageSwiper2', {
        loop: true,
        autoplay: {
            delay: 1700, // Her slaytın gösterilme süresi (ms)
            disableOnInteraction: false, // Kullanıcı etkileşiminden sonra otomatik oynatmayı durdurmaz
        },
        pagination: {
            el: '.swiper-pagination',
        },

    });
</script>
<audio id="success-sound" src="/qr_menu/assets/audio/pebble.mp3" preload="auto"></audio>
<audio id="card-delete-sound" src="/qr_menu/assets/audio/trash_cart.wav" preload="auto"></audio>
<script>
    $(document).ready(function() {
        $('#copyButton').on('click', function() {
            var wifiPassword = $('#wifiPassword').text();
            navigator.clipboard.writeText(wifiPassword);
            Toast.fire({
                icon: 'success',
                title: 'Şifre Kopyalandı',
            });
            $(this).text("Şifre Kopyalandı");
        });
    });
</script>
@if(!request()->routeIs('order.detail'))
    <script>
        var cartAddUrl = '{{route('addToCart', $place->slug)}}';
        var cartFetchUrl = '{{route('getCart', $place->slug)}}';
        var emptyCartUrl = '{{route('emptyCart', $place->slug)}}';
    </script>
    <script src="/qr_menu/assets/js/cart.js"></script>
@endif
<script>
    document.addEventListener("scroll", function() {
        const goToTopBtn = document.getElementById("goToTopBtn");
        const pageHeight = document.documentElement.scrollHeight;
        const scrollPosition = window.scrollY + window.innerHeight;

        // Sayfa ortasından daha fazla scroll edildiğinde butonu göster
        if (scrollPosition >= pageHeight / 2) {
            goToTopBtn.style.display = "flex";
        } else {
            goToTopBtn.style.display = "none";
        }
    });
    document.getElementById("goToTopBtn").addEventListener("click", function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@yield('scripts')
