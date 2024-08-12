$(document).ready(function () {
    fetchCart();
});

function fetchCart(dataDiscount = 0) {
    $.ajax({
        url: cartFetchUrl,
        type: 'GET',
        dataType: 'json',
        data: {
            'discount': dataDiscount,
        },
        success: function (data) {
            var totalProductCount = 0;
            var itemsHtml = '';
            if (data.products.length > 0) {
                data.products.forEach(function (item) {
                    totalProductCount += item.qty;
                    itemsHtml += `
                                <div class="item">
                                    <div class="title">${item.name} <br>
                                        <b>${item.totalPrice}</b>
                                    </div>
                                    <div class="quantity">
                                        <span class="deleteToCartButton" data-product="${item.id}">-</span>
                                        <b>${item.qty}</b>
                                        <span class="addToCartButton" data-product="${item.id}">+</span>
                                    </div>
                                </div>`;
                });
                $('.orderCreateButton').css('display', 'block');

            } else {
                itemsHtml += `<div class="alert alert-warning text-center">Sepetiniz Boş</div>`;
                $('.orderCreateButton').css('display', 'none');
            }

            $('.cart').text(totalProductCount);

            $('.summary .items').html(itemsHtml);

            // Ara toplam, indirim, kurye ve toplam tutar bilgilerini yerleştir
            $('.subtotal-amount').text(`${data.generalTotal}`);
            $('.discount-amount').text(`${data.discount}`);
            $('.delivery-amount').text(`${data.delivery}`);
            $('.total-amount').text(`${data.total}`);
        },
        error: function (error) {
            console.error('Veri çekme hatası:', error);
        }
    });
}

$(document).on('click', '.addToCartButton', function () {
    $(this).addClass('pulse');
    // Pulse effect to last for a few seconds
    setTimeout(() => {
        $(this).removeClass('pulse');
    }, 500);
// Gather selected materials
    var selectedMaterials = [];
    $('input[name="materials[]"]:checked').each(function() {
        selectedMaterials.push($(this).siblings('span').text()); // Assuming you want the material name
    });

    // Gather selected sauces
    var selectedSauces = [];
    $('input[name="sauce_ids[]"]:checked').each(function() {
        selectedSauces.push($(this).siblings('label').text()); // Assuming you want the sauce name
    });
    var product_id = $(this).data('product');
    var button = $(this);
    $.ajax({
        url: cartAddUrl,
        method: 'POST',
        data: {
            _token: csrf_token,
            product_id: product_id,
            materials: selectedMaterials,
            sauces: selectedSauces,
        },
        success: function (response) {
            /*Toast.fire({
                icon: response.status,
                title: response.message,
            });*/
            if (response.status == "success") {
                var audio = document.getElementById('success-sound');
                // Sesi çal
                audio.play();
                fetchCart();
            }
        },
        error: function (xhr) {
            console.error('Ekleme Hata Oluştu:', xhr);
        }
    });
});
$(document).on('click', '.deleteToCartButton', function () {

    var product_id = $(this).data('product');
    var button = $(this);
    var audio = document.getElementById('success-sound');
    $.ajax({
        url: cartAddUrl,
        method: 'POST',
        data: {
            _token: csrf_token,
            product_id: product_id,
            product_delete: true,
        },
        success: function (response) {
            /*Toast.fire({
                icon: response.status,
                title: response.message,
            });*/
            if (response.status == "success") {

                // Sesi çal
                audio.play();
                fetchCart();
            }
            if (response.status == "info") {
                audio.play();
                fetchCart();
            }
        },
        error: function (xhr) {
            console.error('Ekleme Hata Oluştu:', xhr);
        }
    });
});
$(document).on('click', '.emptyCartButton', function () {
    $.ajax({
        url: emptyCartUrl,
        method: 'POST',
        data: {
            _token: csrf_token,
        },
        success: function (response) {
            Toast.fire({
                icon: response.status,
                title: response.message,
            });
            if (response.status == "success") {
                var audioEmpty = document.getElementById('card-delete-sound');
                audioEmpty.play();

                fetchCart();
            }
        },
        error: function (xhr) {
            console.error('Ekleme Hata Oluştu:', xhr);
        }
    });
});
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        const offset = 125; // Menü yüksekliği

        window.scrollTo({
            top: target.offsetTop - offset,
            behavior: 'smooth'
        });
    });
});
