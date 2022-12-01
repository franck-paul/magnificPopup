/*global $, dotclear */
'use strict';

// Ready, set, go \o/
$(() => {
  const options = dotclear.getData('magnific_popup');

  const settings = {
    delegate: options.images,
    type: 'image',
    tClose: options.escape,
    gallery: {
      enabled: true,
      tPrev: options.previous,
      tNext: options.next,
      tCounter: `<span class="mfp-counter">${options.counter}</span>`,
    },
  };
  if (options.animate) {
    settings.removalDelay = 300;
    settings.mainClass = 'mfp-fade';
  }
  $('div.post-content,div.post-excerpt').magnificPopup(settings);
});
