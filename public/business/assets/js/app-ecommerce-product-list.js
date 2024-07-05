
$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }
    var dt_product_table = $('.datatables-products');
  // Variable declaration for table
    setTimeout(function (){
        var dt_products = dt_product_table.DataTable({
            ajax: {
                url: DATA_URL,
            },
            columns:DATA_COLUMNS,
            order: [2, 'asc'], //set any columns order asc/desc
            lengthMenu: [7, 10, 20, 50, 70, 100], //for length of menu
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.11.2/i18n/tr.json",
                sLengthMenu: '_MENU_',
                search: '',
                searchPlaceholder: 'Taleplerde Ara',
                info: '_TOTAL_ kayıttan _START_ ile _END_ arasındakiler gösteriliyor'
            },

        });

    }, 1000);

});
