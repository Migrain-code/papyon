var updateCategoryModal = new bootstrap.Modal(document.querySelector('#updateMenuCategoryModal'));
var addCategoryModal = new bootstrap.Modal(document.querySelector('#addMenuCategoryModal'));
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

                loadImageIntoCropper(res.image);

                var categoryCheckbox = document.getElementById('categoryImageCheckUpdate');
                categoryCheckbox.checked = true;

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

$('#categoryImageCheck').on('change', function (){

    var imageInputArea = document.getElementById('imageInputContainer');
    if($(this).is(':checked')){
        imageInputArea.style.display = "block";
    } else{
        imageInputArea.style.display = "none";
        $('#categoryImage').val("");
    }
});
$('#categoryImageCheckUpdate').on('change', function (){

    var imageInputArea = document.getElementById('updateImageInputContainer');
    if($(this).is(':checked')){
        imageInputArea.style.display = "block";
    } else{
        imageInputArea.style.display = "none";
        $('#updateCategoryImage').val("");
    }
});
