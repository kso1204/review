import Vue from 'vue';
import router from './router';
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';

Vue.use(ViewUI);

require('./bootstrap');

Window.Vue = require('vue');

Vue.component('App', require('./components/App.vue').default)

const app = new Vue({
    el: "#app",
    router
});