$('#categorImageCheck').on('change', function (){
    var imageInputArea = document.getElementById('imageInputContainer');
    if($(this).is(':checked')){
        imageInputArea.style.display = "block";
    } else{
        imageInputArea.style.display = "none";
        $('#categoryImage').val("");
    }
});
$('#productImageCheck').on('change', function (){
    var productImageInputArea = document.getElementById('productImageInputContainer');
    if($(this).is(':checked')){
        productImageInputArea.style.display = "block";
    } else{
        productImageInputArea.style.display = "none";
        $('#productImage').val("");
    }
});

var categoryId = "";
var menuId = "";
var modal = new bootstrap.Modal(document.querySelector('#addMenuProductModal'));
var formType = "add";
var product_id = null;

$('.addProduct').on('click', function (){
    categoryId = $(this).data('category-id');
    menuId = $(this).data('menu-id');
    formType = "add";
    $('[name="product_name"]').val("")
    $('[name="price"]').val("")
    $('[name="product_description"]').val("")
    $('#addProductModalTitle').text('Ürün Ekle');
    modal.show();
});
$('.editProduct').on('click', function (){
    $('#addProductModalTitle').text('Ürün Düzenle');

    product_id = $(this).data('product-id');
    $.ajax({
        url: '/business/menu-category-product/'+product_id,
        type: "GET",
        dataType: "JSON",
        success: function (res) {
            $('[name="product_name"]').val(res.name)
            $('[name="product_description"]').val(res.description)
            $('[name="price"]').val(res.price)
            if(res.image && $('#imageContainer').length > 0){
                var img = document.createElement('img');
                img.style.width="100%";
                img.src = res.image;

                // img etiketini imageContainer içerisine ekle
                var container = document.getElementById('imageContainer');
                container.appendChild(img);

                var checkbox = document.getElementById('productImageCheck');
                checkbox.checked = true;

                var event = new Event('change');
                checkbox.dispatchEvent(event);
            }
        },
        error: function (xhr) {
            submitButton.disabled = false;
            var errorMessage = "<ul>";
            xhr.responseJSON.errors.forEach(function (error) {
                errorMessage += "<li>" + error + "</li>";
            });
            errorMessage += "</ul>";

            Swal.fire({
                icon: 'error',
                title: 'Hata!',
                html: errorMessage,
                buttonsStyling: false,
                confirmButtonText: "Tamam",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
    });



    formType = "edit";
    modal.show();

});
$('#submitButton').on('click', function (){
    var formData = new FormData();
    formData.append("_token", csrf_token);
    formData.append("product_name", $('[name="product_name"]').val());
    formData.append("product_description", $('[name="product_description"]').val());
    formData.append("price", $('[name="price"]').val());
    formData.append("category_id", categoryId);
    formData.append("menu_id", menuId);
    if($('[name="product_image"]').length > 0){
        formData.append("product_image", $('[name="product_image"]')[0].files[0]);
    }
    if(formType === "add"){
        $.ajax({
            url: '/business/menu-category-product',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (res) {
                Toast.fire({
                    icon: res.status,
                    title: res.message,
                });

                if(res.status === "success"){
                    setTimeout(function (){
                        location.reload();
                    }, 1500);
                }
            },
            error: function (xhr) {
                submitButton.disabled = false;
                var errorMessage = "<ul>";
                xhr.responseJSON.errors.forEach(function (error) {
                    errorMessage += "<li>" + error + "</li>";
                });
                errorMessage += "</ul>";

                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    html: errorMessage,
                    buttonsStyling: false,
                    confirmButtonText: "Tamam",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    } else{
        formData.append('_method', 'PUT');
        $.ajax({
            url: '/business/menu-category-product/'+product_id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (res) {
                Toast.fire({
                    icon: res.status,
                    title: res.message,
                });

                if(res.status === "success"){
                    setTimeout(function (){
                        location.reload();
                    }, 1500);
                }
            },
            error: function (xhr) {
                submitButton.disabled = false;
                var errorMessage = "<ul>";
                xhr.responseJSON.errors.forEach(function (error) {
                    errorMessage += "<li>" + error + "</li>";
                });
                errorMessage += "</ul>";

                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    html: errorMessage,
                    buttonsStyling: false,
                    confirmButtonText: "Tamam",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    }


});
