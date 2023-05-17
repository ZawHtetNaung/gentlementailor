/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.$ = require('jquery')
window.JQuery = require('jquery')
window.Vue = require('vue');



Vue.component('hot-grand-rating-texture', require('./components/HotGrandRatingTexture.vue').default);






const front = new Vue({
    el: '#front',

});