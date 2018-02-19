
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import store from './store/index';
import VueChatScroll from 'vue-chat-scroll'
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

Vue.use(VueRouter)
Vue.use(VueChatScroll)
Vue.use(Toaster)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
	mode: 'history',
    routes
});

const app = new Vue({
    router,
    store,
}).$mount('#app');

Vue.config.devtools = false
Vue.config.debug = false
Vue.config.silent = true
