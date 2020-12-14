import Vue from 'vue';
import App from './components/App';

require('./bootstrap');

Window.Vue = require('vue');


Vue.component('App', require('./components/App.vue').default)

const app = new Vue({
    el: "#app"
});