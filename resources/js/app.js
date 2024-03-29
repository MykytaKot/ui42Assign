require('./bootstrap');
import * as Vue from 'vue';
import App from './App.vue';
import VueAxios from 'vue-axios';
import * as VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';

const router = new VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes: routes
});
 


Vue.createApp(App).use(router).use(VueAxios, axios).mount('#app');