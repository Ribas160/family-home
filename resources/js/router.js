import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);


import api from "./api/auth";


// const Register = () => import('./views/auth/Register');
const Login = () => import('./views/auth/Login');
const Index = () => import('./views/Index');
const Temperature = () => import('./views/devices/Temperature');
const Humidity = () => import('./views/devices/Humidity');
const Camera = () => import('./views/devices/Camera');

const router = new Router({
    // base: '/projects/tmp/family-home/public/',
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
            path: '/humidity',
            name: 'humidity',
            component: Humidity,
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: '/camera',
            name: 'camera',
            component: Camera,
            meta: {
                requiresAuth: true,
            },
        },
        // {
        //     path: '/register',
        //     name: 'register',
        //     component: Register,
        //     meta: {
        //         guest: true,
        //     },
        // },
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
        api.isAuth().then(() => {
            next();
        }).catch(() => next({name: 'login'}));
    } else if (to.matched.some(record => record.meta.guest)) {
        api.isAuth().then(() => {
            next({name: 'index'})
        }).catch(() => next());
    } else {
        next();
    }
});

export default router;
