/*  eslint no-param-reassign: 0  */
/* global lightGallery */
window.morganeGuerit.App = {
    init: function () {
        'use strict';
        this.header = window.morganeGuerit.Header.init(this.toggleElements.bind(this));
        this.portfolio = window.morganeGuerit.Portfolio.init(this.toggleElements.bind(this));
        this.sliders = window.morganeGuerit.Sliders.init('.js-slider', '.js-slide');
        this.article = window.morganeGuerit.Article.init();
        this.setLightbox();
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    },

    setLightbox: function () {
        'use strict';
        var lightbox = document.querySelectorAll('.js-lightbox'),
            i = 0,
            length = lightbox.length;

        for (i; i < length; i += 1) {
            lightGallery(lightbox[i], {
                download: false,
                galleryId: i,
                mode: 'lg-slide',
                selector: 'li'
            });
        }
    },

    toggleElements: function (value, first, second) {
        'use strict';
        var state;
        value = !value;
        state = value ? 'add' : 'remove';
        first.classList[state]('active');
        second.classList[state]('active');
    }
}.invoke();
