// This is where it all goes :)

//= require_self
//= require siema/dist/siema.min
//= require lightgallery.js/dist/js/lightgallery.min
//= require_tree ./components
//= require_tree ./pages
//= require _app

window.morganeGuerit = {};

document.addEventListener('DOMContentLoaded', function () {
    'use strict';
    window.morganeGuerit.App.init();
});
