import Vue from 'vue';
import VueRouter from 'vue-router';
import MainTag from './components/MainTag';

Vue.use(VueRouter);

export default new VueRouter({
    mode : 'history',

    routes : [
        {
            path : '/mainTag', name : 'mainTag', component : MainTag
        }
    ]
})

