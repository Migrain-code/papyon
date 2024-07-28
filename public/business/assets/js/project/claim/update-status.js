var routeUrl = "";

if (typeof statusUrl !== 'undefined') {
    routeUrl = statusUrl;
} else {
    routeUrl = "business"
}
$(document).on('click', '.updateStatus', function (e) {
    let href = $(this).attr('href');

    // Eğer href özelliği varsa, doğrudan linke git
    if (href && href !== 'javascript:void(0)') {
        window.location.href = href;
        return;
    }

    // Eğer href özelliği yoksa, mevcut işlevi çalıştır
    e.preventDefault();

    let statusCode = $(this).data('update-id');
    let claimId = $(this).data('element-id');

    Swal.fire({
        title: 'İşlemi Yapmak İstiyor Musunuz?',
        text: 'Durumu Güncellemek İstiyor Musunuz?',
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Hayır, İptal Et",
        confirmButtonText: "Evet, Güncelle!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/' + routeUrl + '/' + updateUrl + '/' + claimId,
                type: "GET",
                data: {
                    "_token": csrf_token,
                    'statusCode': statusCode,
                },
                dataType: "JSON",
                success: function (res) {
                    if (res.status === "success") {
                        Swal.fire({
                            icon: res.status,
                            text: res.message,
                            confirmButtonText: 'Tamam'
                        });

                        if ($('#datatable').length > 0 && $.fn.DataTable.isDataTable('#datatable')) {
                            $('#datatable').DataTable().ajax.reload();
                        }
                    } else {
                        Swal.fire({
                            title: "Uyarı",
                            icon: res.status,
                            text: res.message,
                            confirmButtonText: 'Tamam'
                        });
                    }
                }
            });
        }
    });
});



var allChecked = false;
$("#serviceAllSelect").on('click', function () {
    let btn = $(this);
    if (!allChecked) {
        $('.orderChecks').prop('checked', true);
        allChecked = true;
        var checkedCheckBox = $('.orderChecks').length;
        updateContainer(checkedCheckBox);
    } else {
        $('.orderChecks').prop('checked', false);
        allChecked = false;
        updateContainer(0);
        //btn.text("Tümünü Seç");
    }
});
$(document).on('click', '.orderChecks', function (){
    var checkedLength = $('.orderChecks:checked').length;
    updateContainer(checkedLength);
});

function updateContainer(selectedCount){
    var deleteButtonContainer =  $('#deleteButtonContainer');
    if (selectedCount > 0){
        deleteButtonContainer.css('display', 'block');
        $('#selectedCheckBoxCount').text(selectedCount);
    } else{
        deleteButtonContainer.css('display', 'none');
        $('#selectedCheckBoxCount').text(selectedCount);
    }
}

$(document).on('click', '#deleteSubmitButton', function () {

    var title = $(this).data('title');
    var model = $(this).data('model');

    var deletedValues = $('.orderChecks:checked').map(function() {
        return $(this).val();
    }).get();

    Swal.fire({
        text: title + " Silmek İstediğinize Eminmisiniz?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Hayır, İptal Et",
        confirmButtonText: "Evet, Sil!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/'+routeUrl+'/ajax/all-delete-object',
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'model': model,
                    'deletedKeys':deletedValues
                },
                dataType: "JSON",
                success: function (res) {
                    if (res.status == "success") {
                        Swal.fire({
                            icon: res.status,
                            text: res.message,
                            confirmButtonText: 'Tamam'
                        })

                        if ($('#datatable').length > 0 && $.fn.DataTable.isDataTable('#datatable')) {
                            $('#datatable').DataTable().ajax.reload();
                        }
                    } else {
                        Swal.fire({
                            title: "Uyarı",
                            icon: res.status,
                            text: res.message,
                            confirmButtonText: 'Tamam'
                        })
                    }

                }
            });
        }
    });

});
