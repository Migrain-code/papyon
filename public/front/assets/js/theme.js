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
