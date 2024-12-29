/*global $, dotclear */
'use strict';

// Ready, set, go \o/
dotclear.ready(() => {
  const options = dotclear.getData('magnific_popup');

  const findLegend = (mfp) => {
    if (mfp.img.length) {
      const img = mfp.img[0];
      if (mfp.el.length) {
        // Check if parent is figure and if yes try to find figcaption
        const parent = mfp.el[0].parentElement;
        if (parent.tagName === 'FIGURE') {
          const figcaption = $(parent).find('figcaption');
          if (figcaption.length) {
            // figcaption found, return it's content
            return figcaption[0].textContent;
          }
        }
      }
      if (img?.alt) return img.alt;
    }
    return '';
  };

  const settings = {
    delegate: options.images,
    type: 'image',
    tClose: options.escape,
    gallery: {
      enabled: true,
      tPrev: options.previous,
      tNext: options.next,
      tCounter: options.counter,
    },
    image: {
      titleSrc: findLegend,
    },
  };
  if (options.animate) {
    settings.removalDelay = options.delay || 300;
    settings.mainClass = 'mfp-fade';
  }
  $('div.post-content,div.post-excerpt').magnificPopup(settings);
});
