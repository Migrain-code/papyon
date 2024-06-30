/**
 * Add New Address
 */

'use strict';
$('.orderType').on('click', function (){
   var orderTypeId = $(this).data('type-id');
   if (orderTypeId == 0){
       $('.tab').css('display', 'none');
       $('#tab3').css('display', 'block');
   } else if(orderTypeId == 1){
       $('.tab').css('display', 'none');
       $('#tab2').css('display', 'block');
   } else{
       $('.tab').css('display', 'none');
       $('#tab1').css('display', 'block');
   }
});
// Select2 (jquery)
$(function () {
    var selectedOrderType = $('.orderType:checked');
    if (selectedOrderType.length) {
        selectedOrderType.trigger('click');
    }
});
