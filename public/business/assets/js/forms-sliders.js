/**
 * Sliders
 */
'use strict';

(function () {
  const sliderBasic = document.getElementById('slider-basic');
  if (sliderBasic) {
    noUiSlider.create(sliderBasic, {
      start: [5],
      connect: [true, false],
      direction: isRtl ? 'rtl' : 'ltr',
      range: {
        min: 0,
        max: 100
      },
      tooltips: true,
    });


  }
})();
