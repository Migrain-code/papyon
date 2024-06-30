/**
 * Edit Product
 */


var productModal = new bootstrap.Modal(document.querySelector('#editProductModal'));

$(function (){
    $('.editProduct').on('click', function (){
        productModal.show();
        var productQuantity = $(this).data('quantity');
        var productId = $(this).data('product-id');
        $('[name="product_quantity"]').val(productQuantity);
        $('[name="product_id"]').val(productId);
    });



});
