/*global $, getData */
'use strict';

// Ready, set, go \o/
$(document).ready(function() {

    const options =getData('magnific_popup');

    $("div.post-content,div.post-excerpt").magnificPopup({
        delegate: options.images,
        type: 'image',
        tClose: options.escape,
        gallery: {
            enabled: true,
            tPrev: options.previous,
            tNext: options.next,
            tCounter: `<span class="mfp-counter">${options.counter}</span>`,
        }
    });
});
