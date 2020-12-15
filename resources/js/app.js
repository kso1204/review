import Vue from 'vue';
import router from './router';

require('./bootstrap');

Window.Vue = require('vue');


Vue.component('App', require('./components/App.vue').default)

const app = new Vue({
    el: "#app",
    router
});