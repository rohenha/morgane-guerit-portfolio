window.morganeGuerit.Header = {

    bindEvent: function () {
        'use strict';
        this.hamburger.addEventListener('click', this.toggleMenu.bind(this));
    },

    init: function () {
        'use strict';
        this.header = document.querySelector('#header');
        this.hamburger = this.header.querySelector('.js-header-hamburger');
        this.nav = this.header.querySelector('.js-header-nav');
        this.active = false;
        this.bindEvent();
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    },

    toggleMenu: function () {
        'use strict';
        var state;
        this.active = !this.active;
        state = this.active ? 'add' : 'remove';
        this.nav.classList[state]('active');
        this.hamburger.classList[state]('active');
    }
}.invoke();
