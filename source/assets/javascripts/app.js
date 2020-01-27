window.morganeGuerit.App = {
    init: function () {
        'use strict';
        console.log('init App');
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    }
}.invoke();
