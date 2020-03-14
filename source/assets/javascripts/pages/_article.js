window.morganeGuerit.Article = {

    init: function () {
        'use strict';
        this.container = document.querySelector('.js-article');
        if (!this.container) {
            return null;
        }
        this.containers = this.container.querySelectorAll('.wp-block-gallery');
        this.setSliders();
        return null;
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    },

    setSliders: function () {
        'use strict';
        var i = 0,
            container,
            length = this.containers.length;

        this.sliders = [];

        for (i; i < length; i += 1) {
            container = this.containers[i];
            this.sliders.push(new window.morganeGuerit.Slider(container.querySelector('.blocks-gallery-grid'), true, '.blocks-gallery-item'));
        }
    }
}.invoke();
