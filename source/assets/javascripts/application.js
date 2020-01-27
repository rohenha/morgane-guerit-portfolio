// This is where it all goes :)

//= require_self
//= require_tree ./vendors
//= require_tree ./components
//= require app

window.morganeGuerit = {};

document.addEventListener('DOMContentLoaded', function () {
    'use strict';
    console.log(window.morganeGuerit);
    window.morganeGuerit.App.init();
});
