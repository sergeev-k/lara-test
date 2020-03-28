import Vue from "vue";

Vue.use(VueRouter);
import VueRouter from "vue-router";

const loadPage = page => () => import(`./pages/${page}`);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: loadPage('home')
        },
        {
            path: '/sign_up',
            name: 'register',
            component: loadPage('register')
        },
        {
            path: '/sign_in',
            name: 'login',
            component: loadPage('login')
        },
    ]
});


