window.morganeGuerit.App = {
    init: function () {
        'use strict';
        this.header = window.morganeGuerit.Header.init();
        this.portfolio = window.morganeGuerit.Portfolio.init();
        this.sliders = window.morganeGuerit.Sliders.init();
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    }
}.invoke();
