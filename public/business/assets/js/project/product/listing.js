
$('#productImageCheck').on('change', function (){
    var productImageInputArea = document.getElementById('productImageInputContainer');
    if($(this).is(':checked')){
        productImageInputArea.style.display = "block";
    } else{
        productImageInputArea.style.display = "none";
        $('#productImage').val("");
    }
});


var product_id = null;


document.addEventListener('DOMContentLoaded', (event) => {
    // Kategoriler için sortable
    new Sortable(document.getElementById('sortable-cards'), {
        handle: '.sortable-icon',
        animation: 150,
        onEnd: function (evt) {
            // Kategori sıralama verilerini gönder
            let order = [];
            document.querySelectorAll('#sortable-cards .accordion-item').forEach((item, index) => {

                order.push({
                    id: item.dataset.id,
                    position: index + 1
                });
            });

            // AJAX isteği ile sıralama verilerini gönderin
            $.ajax({
                url: catgoryUpdateOrderUrl,
                method: 'POST',
                data: {
                    _token: csrf_token,
                    order: order
                },
                success: function (response) {
                    console.log('Kategori sıralama güncellendi:');
                },
                error: function (xhr) {
                    console.error('Kategori sıralama hatası:');
                }
            });
        }
    });

    // Her kategori için ürünleri sortable yapma
    document.querySelectorAll('.sortableProd').forEach(function(element) {
        new Sortable(element, {
            handle: '.sortable-icon',
            animation: 150,
            onEnd: function (evt) {
                // Ürün sıralama verilerini gönder
                let order = [];
                element.querySelectorAll('.card').forEach((item, index) => {
                    order.push({
                        id: item.dataset.id,
                        position: index + 1
                    });
                });
                $.ajax({
                    url: productUpdateOrderUrl,
                    method: 'POST',
                    data: {
                        _token: csrf_token,
                        order: order
                    },
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
});
