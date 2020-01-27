window.morganeGuerit.Header = {
    init: function () {
        'use strict';
        console.log('init header');
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    }
}.invoke();
