var unitModal = new bootstrap.Modal(document.querySelector('#addUnitModal'));
$(document).ready(function() {
    function updateUnitSelectOptions(units) {
        $('.unitSelect').each(function() {
            var selectElement = $(this);
            var selectedValue = selectElement.val(); // Mevcut seçili değeri saklayın

            selectElement.empty(); // Select alanını temizle
            selectElement.append('<option value="">Birim Seçiniz</option>');

            // Yeni gelen unit'leri select alanına ekleme
            units.forEach(function(unit) {
                selectElement.append(new Option(unit.name, unit.id));
            });

            selectElement.val(selectedValue); // Önceki seçili değeri geri yükleyin
        });
    }
    var newData;
    $('#unitSubmitButton').on('click', function() {
        var unitName = $('[name="unit_name"]').val();
        $.ajax({
            url: unitAddUrl,
            method: 'POST',
            data: {
                _token: csrf_token,
                unit_name: unitName
            },
            success: function(response) {
                if(response.status == "success"){
                    unitModal.hide();
                    Toast.fire({
                        icon: response.status,
                        title: response.message,
                    });
                    newData = response.units;
                    // Select alanlarını güncelleme
                    updateUnitSelectOptions(newData);
                }
            },
            error: function(xhr) {
                console.error('Ekleme Hata Oluştu:', xhr);
            }
        });
    });

    // Yeni form repeater öğesi eklendiğinde select alanlarını güncelleme
    $(document).on('click', '[data-repeater-create]', function() {
        // Yeni form repeater öğesi eklemesi sonrasında biraz bekleyin ve ardından select alanlarını güncelleyin
        setTimeout(function() {
            updateUnitSelectOptions(newData); // response.units verisini uygun şekilde geçmelisiniz
        }, 100); // Bekleme süresini ihtiyacınıza göre ayarlayabilirsiniz
    });
});
