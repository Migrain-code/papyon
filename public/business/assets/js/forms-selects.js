/**
 * Selects & Tags
 */

'use strict';

$(function () {
  const selectPicker = $('.selectpicker'),
    select2 = $('.select2'),
    select2Icons = $('.select2-icons'),
    select2Icons1 = $('.select2-icons-1');

  // Bootstrap Select
  // --------------------------------------------------------------------
  if (selectPicker.length) {
    selectPicker.selectpicker();
  }

  // Select2
  // --------------------------------------------------------------------

  // Default
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent()
      });
    });
  }

  // Select2 Icons
  if (select2Icons.length) {
    // custom template to render icons
    function renderIcons(option) {
      if (!option.id) {
        return option.text;
      }
      var $icon = "<i class='" + $(option.element).data('icon') + " me-2'></i>" + option.text;

      return $icon;
    }
    select2Icons.wrap('<div class="position-relative"></div>').select2({
      dropdownParent: select2Icons.parent(),
      templateResult: renderIcons,
      templateSelection: renderIcons,
      escapeMarkup: function (es) {
        return es;
      }
    });
  }

    if (select2Icons1.length) {
        // custom template to render icons
        function renderIcons(option) {
            if (!option.id) {
                return option.text;
            }
            var $icon = "<img src='" + $(option.element).data('icon') + "' class='me-2' style='width: 20px;height: 20px;'>" + option.text;

            return $icon;
        }
        select2Icons1.wrap('<div class="position-relative"></div>').select2({
            dropdownParent: select2Icons1.parent(),
            templateResult: renderIcons,
            templateSelection: renderIcons,
            escapeMarkup: function (es) {
                return es;
            }
        });
    }
});
