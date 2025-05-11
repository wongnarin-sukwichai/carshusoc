import { createRouter, createWebHistory } from "vue-router";


import Login from "../components/Login.vue";
import Register from "../components/Register.vue";

// Auth
import Home from "../components/Home.vue";
import Dashboard from "../components/Dashboard.vue";

//User
import Profile from "../components/Profile.vue";

import store from "../store";

const routes = [
    {
        path: "/home",
        name: "home",
        component: Home,
    },
        {
        path: "/profile",
        name: "profile",
        component: Profile,
    },
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/register",
        name: "register",
        component: Register,
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: {
            guard: "auth",
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (store.getters.user) {
        if (to.matched.some((route) => route.meta.guard === "guest"))
            next({ name: "home" });
        else next();
    } else {
        if (to.matched.some((route) => route.meta.guard === "auth"))
            next({ name: "login" });
        else next();
    }
});

export default router;
