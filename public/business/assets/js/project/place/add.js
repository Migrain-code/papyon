$('.flatpickr-time').flatpickr({
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
});
$('.switch-input').on('change', function() {
    var isChecked = $(this).is(':checked');
    var label = $(this).siblings('.switch-label');
    if (isChecked) {
        label.text('Açık');
    } else {
        label.text('Kapalı');
    }
});
$('#packageService').on('change', function() {
    var isChecked = $(this).is(':checked');

    if (isChecked) {
        $('#delivery_fee').css('display', 'flex')
    } else {

        $('#delivery_fee').css('display', 'none')
    }
});
$('#flatpickr-time1').on('change', function (){

    Swal.fire({
        icon: 'question',
        title: "Seçtiğiniz Saatin Tüm Açılış Saatlerine uygulanmasını istermisiniz?",
        showCancelButton: true,
        confirmButtonText: "Evet, Uygula",
        cancelButtonText: "İptal Et",
        cancelButtonColor:"red",
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $('.flatpickr-start-time').val($(this).val())
        }
    });
});

$('#flatpickr-end-time1').on('change', function (){

    Swal.fire({
        icon: 'question',
        title: "Seçtiğiniz Saatin Tüm Kapanış Saatlerine uygulanmasını istermisiniz?",
        showCancelButton: true,
        confirmButtonText: "Evet, Uygula",
        cancelButtonText: "İptal Et",
        cancelButtonColor:"red",
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $('.flatpickr-end-time').val($(this).val())
        }
    });
})
