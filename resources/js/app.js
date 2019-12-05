require('./bootstrap');

window.Vue = require('vue');

Vue.component('gallery', require('./components/GalleryComponent.vue').default);
Vue.component('profile', require('./components/ProfileComponent.vue').default);

const app = new Vue({
    el: '#app',
});
