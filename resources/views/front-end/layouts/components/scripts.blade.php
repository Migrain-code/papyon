<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/front/assets/js/bootstrap.bundle.min.js"></script>
<script src="/front/assets/js/swiper-bundle.min.js"></script>
<script src="/front/assets/js/jquery-3.7.1.min.js"></script>
<script>
    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
<script>
    /*$("#menu__toggle").click(function() {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               */
    $(document).ready(function() {
        if (window.innerWidth < 576) {
            $(".middle_first h5").click(function() {
                $(".middle_first div").is(":visible") ? $(".middle_first div").css("display", "none") :
                    $(
                        ".middle_first div").css("display", "flex");
            })
            $(".middle_second h5").click(function() {
                $(".middle_second p").is(":visible") ? $(".middle_second p").css("display", "none") : $(
                    ".middle_second p").css("display", "flex");
            })
            $(".middle_third h5").click(function() {
                $(".middle_third p").is(":visible") ? $(".middle_third p").css("display", "none") : $(
                    ".middle_third p")
                    .css("display", "flex");
            })
            $(".middle_fourth h5").click(function() {
                $(".middle_fourth p").is(":visible") ? $(".middle_fourth p").css("display", "none") : $(
                    ".middle_fourth p").css("display", "flex");
            })
            if (window?.location?.pathname == "/sign-in" || window?.location?.pathname == "/forget-password") {
                $("footer").css("display", "none")
            }
        }
    })
</script>
<script>
    $("#packages_mounth").click(function() {
        $("#packages_mounth").addClass("packages_buttons_active");
        $("#packages_year").removeClass("packages_buttons_active");
        $(".annual_price").addClass("d-none");
        $(".mountly_price").removeClass("d-none");
    })
    $("#packages_year").click(function() {
        $("#packages_year").addClass("packages_buttons_active");
        $("#packages_mounth").removeClass("packages_buttons_active");
        $(".mountly_price").addClass("d-none");
        $(".annual_price").removeClass("d-none");
    })
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: "tr",
            includedLanguages: "en,de,fr,az",
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        }, 'google_translate_element');

    }

    function handleCookie(val) {
        let check = getCookie("googtrans");
        if (val != "" && val != null) {
            setCookie("googtrans", "/tr/" + val, 365);
            location.reload();
        }
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>

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

@yield('scripts')
