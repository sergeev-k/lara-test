import Vue from 'vue';
import axios from 'axios';

import router from "./routes";
import App from './App';

import {BootstrapVue} from 'bootstrap-vue'
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.prototype.$axios = axios;
Vue.prototype.$axios.create({
    baseURL: `http://${process.env.APP_URL}`,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
        withCredentials: true,
    },
});

const app = new Vue({
    el: '#app',
    router,
    render: (h) => h(App)
});


