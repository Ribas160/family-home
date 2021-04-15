import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import ExampleComponent from "./components/ExampleComponent";
import Register from "./views/auth/Register";
import Login from "./views/auth/Login";
import Index from "./views/Index";
import Temperature from "./views/devices/Temperature";

const router =  new Router({
    // base: `/${window._locale}/`,
    // mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index,
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: '/temperature',
            name: 'temperature',
            component: Temperature,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                guest: true,
            },
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                guest: true,
            },
        }
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('FAToken') == null) {
            next({name: 'login'});
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
