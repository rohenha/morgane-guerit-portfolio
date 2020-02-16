/* global lightGallery */
window.morganeGuerit.Portfolio = {

    bindEvents: function () {
        'use strict';
        var i = 0,
            category,
            length = this.categories.length;

        for (i; i < length; i += 1) {
            category = this.categories[i];
            category.el.addEventListener('click', this.setCategory.bind(this, category, true));
        }
        this.btn.addEventListener('click', this.toggleFilters.bind(this));
    },

    init: function () {
        'use strict';
        this.container = document.querySelector('.js-portfolio');
        if (!this.container) {
            return null;
        }
        this.btn = this.container.querySelector('.js-toggle');
        this.filters = this.container.querySelector('.js-filters');
        this.gallery = this.container.querySelector('.js-images');
        this.categories = this.setElements('.js-categories li', true);
        this.images = this.setElements('.js-images li', false);
        this.filtersOpened = false;
        this.current = {
            category: null
        };
        this.bindEvents();
        this.setCategory(this.categories[this.categories.length - 1], false);
    },

    invoke: function () {
        'use strict';
        return {
            init: this.init.bind(this)
        };
    },

    setCategory: function (category, toggleFilters) {
        'use strict';
        var i = 0,
            image,
            categoryClass = category.category,
            categoryActive = categoryClass !== '' ? 'add' : 'remove',
            length = this.images.length;

        for (i; i < length; i += 1) {
            image = this.images[i];
            image.el.classList.remove('active');
            if (categoryClass === '' || categoryClass === image.category) {
                image.el.classList.add('active');
            }
        }

        if (this.current.category !== null) {
            this.current.category.el.classList.remove('active');
        }
        category.el.classList.add('active');
        this.current.category = category;
        if (toggleFilters) {
            this.toggleFilters();
        }
        this.btn.classList[categoryActive]('selected');
    },

    setElements: function (selector, isCategory) {
        'use strict';
        var i = 0,
            elements = this.container.querySelectorAll(selector),
            single,
            category,
            gallery,
            array = [],
            length = elements.length;

        for (i; i < length; i += 1) {
            single = elements[i];
            category = single.getAttribute('data-category');
            array.push({
                category: category,
                el: single
            });
            if (isCategory && category !== '') {
                gallery = lightGallery(this.gallery, {
                    download: false,
                    galleryId: i,
                    mode: 'lg-slide',
                    selector: '.' + category
                });
                console.log(gallery);
            }
        }
        return array;
    },

    toggleFilters: function () {
        'use strict';
        var state;
        this.filtersOpened = !this.filtersOpened;
        state = this.filtersOpened ? 'add' : 'remove';
        this.filters.classList[state]('active');
        this.btn.classList[state]('open');
    }

}.invoke();
