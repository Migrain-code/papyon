var updateCategoryModal = new bootstrap.Modal(document.querySelector('#updateMenuCategoryModal'));
var category_id = null;
$('.editCategory').on('click', function (){
    category_id = $(this).data('category-id');
    $.ajax({
        url: '/business/menu-category/'+category_id,
        type: "GET",
        dataType: "JSON",
        success: function (res) {
            $('[name="category_name"]').val(res.name)
            if(res.image && $('#updateImageInputContainer').length > 0){
                $('#allImageInputContainer').style.display="block";
                var img = document.createElement('img');
                img.style.width="100%";
                img.src = res.image;

                // img etiketini imageContainer içerisine ekle
                var container = document.getElementById('updateImageInputContainer');
                container.appendChild(img);

                var categoryCheckbox = document.getElementById('categoryImageCheck');
                checkbox.checked = true;

                var updateEvent = new Event('change');
                categoryCheckbox.dispatchEvent(updateEvent);
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
    updateCategoryModal.show();

});
$('#categoryUpdateButton').on('click', function (){
    var formData = new FormData();
    formData.append("_token", csrf_token);
    formData.append('_method', 'PUT');
    formData.append("name", $('[name="category_name"]').val());

    /*if($('[name="product_image"]').length > 0){
        formData.append("product_image", $('[name="product_image"]')[0].files[0]);
    }*/
    $.ajax({
        url: '/business/menu-category/'+category_id,
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



});
