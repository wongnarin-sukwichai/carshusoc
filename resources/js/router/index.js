import { createRouter, createWebHistory } from "vue-router";

import Login from "../components/Login.vue";
import Register from "../components/Register.vue";

// Authen
import Home from "../components/Home.vue";
import Information from "../components/Information.vue";

import store from "../store";

const routes = [
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            layout: "guest",
            guard: "guest", // เพิ่ม guard ด้วยก็ได้
        },
    },
    {
        path: "/register",
        name: "register",
        component: Register,
        meta: {
            layout: "guest",
            guard: "guest", // เพิ่ม guard ด้วยก็ได้
        },
    },
    {
        path: "/home",
        name: "home",
        component: Home,
        meta: {
            layout: "auth", // กำหนด layout สำหรับ user ที่ login แล้ว
            guard: "auth",
        },
    },
    {
        path: "/information",
        name: "information",
        component: Information,
        meta: {
            layout: "auth",
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
