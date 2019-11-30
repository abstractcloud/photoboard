require('./bootstrap');

window.Vue = require('vue');

require('./gallery');


Vue.component('gallery', require('./components/GalleryComponent.vue').default);

const app = new Vue({
    el: '#app',
});
