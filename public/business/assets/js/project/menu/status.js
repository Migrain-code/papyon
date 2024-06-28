$(document).ready(function() {
    $('.categorySwitch').change(function() {
        var category_id = $(this).data('category-id');

        var targetClass = $(this).data('target');
        var isChecked = $(this).is(':checked');
        $('.' + targetClass).prop('checked', isChecked);
        $.ajax({
            url: '/business/menu-category/'+category_id+'/edit?is_checked='+isChecked,
            type: "GET",
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (res) {
                Toast.fire({
                    icon: res.status,
                    title: res.message,
                });
            },
            error: function (xhr) {
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

    $('.productSwitch').change(function() {
        var product_id = $(this).data('product-id');

        $.ajax({
            url: '/business/menu-category-product/'+product_id+'/edit',
            type: "GET",
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (res) {
                Toast.fire({
                    icon: res.status,
                    title: res.message,
                });
            },
            error: function (xhr) {
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
});
