/* global Siema */
window.morganeGuerit.Slider = function Slider (container, hasArrows, items) {
    'use strict';
    this.container = container;
    this.content = this.container.querySelectorAll(items);
    this.hasArrows = hasArrows;
    this.isSingleSlide = this.container.querySelectorAll('.siema > div').length <= 1;
    this.init();
    this.instanciate();
    this.bindEvents();
};

window.morganeGuerit.Slider.prototype.init = function () {
    'use strict';
    var i = 0,
        length = this.content.length;
    this.createElement('div', 'slider', 'component-slider', '');
    if (this.hasArrows) {
        this.createElement('button', 'nextBtn', 'button button__icon component-slider__button component-slider__button--next', 'suivant');
        this.createElement('button', 'prevBtn', 'button button__icon component-slider__button component-slider__button--previous', 'précédent');
    }
    for (i; i < length; i += 1) {
        this.slider.appendChild(this.content[i]);
    }
};

window.morganeGuerit.Slider.prototype.createElement = function (element, name, classNames, content) {
    'use strict';
    this[name] = document.createElement(element);
    this[name].setAttribute('class', classNames);
    this[name].innerHTML = content;
    this.container.appendChild(this[name]);
};

window.morganeGuerit.Slider.prototype.instanciate = function () {
    'use strict';
    this.instance = new Siema({
        draggable: true,
        duration: 400,
        easing: 'ease-in-out',
        loop: true,
        multipleDrag: false,
        perPage: 1,
        rtl: false,
        selector: this.slider,
        startIndex: 0,
        threshold: 20
    });
};

window.morganeGuerit.Slider.prototype.bindEvents = function () {
    'use strict';
    if (!this.hasArrows) {
        return null;
    }
    this.nextBtn.addEventListener('click', this.changeSliderState.bind(this, true));
    this.prevBtn.addEventListener('click', this.changeSliderState.bind(this, false));
    return null;
};

window.morganeGuerit.Slider.prototype.changeSliderState = function (state) {
    'use strict';
    var event = state ? 'next' : 'prev';
    this.instance[event]();
};
