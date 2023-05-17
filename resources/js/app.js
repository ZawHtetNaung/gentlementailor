/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.$ = require('jquery')
window.JQuery = require('jquery')
window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// fit-suit
Vue.component('create-fit-suit', require('./components/CreateFitSuit.vue').default);
Vue.component('edit-fit-suit', require('./components/EditFitSuit.vue').default);

// Categories
// texture
Vue.component('create-texture', require('./components/CreateTexture.vue').default);
Vue.component('edit-texture', require('./components/EditTexture.vue').default);
// ready to wear
Vue.component('create-ready', require('./components/CreateReady.vue').default);
Vue.component('edit-ready', require('./components/EditReady.vue').default);

// style
Vue.component('create-style', require('./components/CreateStyle.vue').default);
Vue.component('edit-style', require('./components/EditStyle.vue').default);

// color
Vue.component('create-color', require('./components/CreateColor.vue').default);
Vue.component('edit-color', require('./components/EditColor.vue').default);

// Size
Vue.component('create-size', require('./components/CreateSize.vue').default);
Vue.component('edit-size', require('./components/EditSize.vue').default);

// Customize
// top
Vue.component('create-top', require('./components/CreateTop.vue').default);
Vue.component('edit-top', require('./components/EditTop.vue').default);

// pant
Vue.component('create-pant', require('./components/CreatePant.vue').default);
Vue.component('edit-pant', require('./components/EditPant.vue').default);

// shirt_button
Vue.component('create-shirt-button', require('./components/CreateShirtButton.vue').default);
Vue.component('edit-shirt-button', require('./components/EditShirtButton.vue').default);

Vue.component('image-uploader', require('./components/ImageUploader.vue').default);

// additional
Vue.component('create-additional', require('./components/CreateAdditional.vue').default);
Vue.component('edit-additional', require('./components/EditAdditional.vue').default);


Vue.component('edit-additional', require('./components/EditAdditional.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});