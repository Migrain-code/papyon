/**
 * Edit User
 */

'use strict';

// Select2 (jquery)
$(function () {
  const select2 = $('.select2');

  // Select2 Country
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent()
      });
    });
  }
});

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // variables
    const modalEditUserPhone = document.querySelector('.phone-number-mask');

    // Phone Number Input Mask
    if (modalEditUserPhone) {
      new Cleave(modalEditUserPhone, {
        phone: true,
        phoneRegionCode: 'TR'
      });
    }

    // Edit user form validation
    FormValidation.formValidation(document.getElementById('editUserForm'), {
      fields: {
        modalEditUserFirstName: {
          validators: {
            notEmpty: {
              message: 'Lütfen müşteri adını giriniz'
            },

          }
        },
        modalEditUserPhone: {
              validators: {
                  notEmpty: {
                      message: 'Lütfen müşteri telefonu giriniz'
                  },

              }
          },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Tüm alanlar geçerli olduğunda formu gönderin
        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    });
  })();
});
