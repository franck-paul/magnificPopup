/*global $, dotclear */
'use strict';

// Ready, set, go \o/
$(() => {
  const options = dotclear.getData('magnific_popup');

  $('div.post-content,div.post-excerpt').magnificPopup({
    delegate: options.images,
    type: 'image',
    tClose: options.escape,
    gallery: {
      enabled: true,
      tPrev: options.previous,
      tNext: options.next,
      tCounter: `<span class="mfp-counter">${options.counter}</span>`,
    },
  });
});
