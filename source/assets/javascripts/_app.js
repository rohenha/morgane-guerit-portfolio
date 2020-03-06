/*  eslint no-param-reassign: 0  */

window.morganeGuerit.App = {
    init: function () {
        'use strict';
        this.header = window.morganeGuerit.Header.init(this.toggleElements.bind(this));
        this.portfolio = window.morganeGuerit.Portfolio.init(this.toggleElements.bind(this));
        this.sliders = window.morganeGuerit.Sliders.init('.js-slider', '.js-slide');
        this.galleries = window.morganeGuerit.Sliders.init('.js-slider', '.js-slide');
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
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
