window.morganeGuerit.App = {
    init: function () {
        'use strict';
        this.header = window.morganeGuerit.Header.init();
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    }
}.invoke();
