window.morganeGuerit.Sliders = {

    init: function (container, items) {
        'use strict';
        this.containers = document.querySelectorAll(container);
        this.sliders = [];
        this.items = items;
        if (!this.containers) {
            return null;
        }
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

        for (i; i < length; i += 1) {
            container = this.containers[i];
            this.sliders.push(new window.morganeGuerit.Slider(container, container.dataset.arrows === 'true', this.items));
        }
    }
}.invoke();
