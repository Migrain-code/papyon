/**
 * Enable OTP
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    const phoneMask = document.querySelector('.phone-number-otp-mask');

    // Phone Number Input Mask
    if (phoneMask) {
      new Cleave(phoneMask, {
        phone: true,
        phoneRegionCode: 'US'
      });
    }
  })();
});
