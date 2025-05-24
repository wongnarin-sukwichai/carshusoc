import { createRouter, createWebHistory } from "vue-router";

import Login from "../components/Login.vue";
import Register from "../components/Register.vue";

// Authen
import Home from "../components/Home.vue";
import Information from "../components/Information.vue";
import Profile from "../components/Profile.vue";
import Detail from "../components/Detail.vue";
import List from "../components/List.vue";
import Condition from "../components/Condition.vue";

// Admin
import Admin from "../components/Admin.vue";

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
    {
        path: "/profile",
        name: "profile",
        component: Profile,
        meta: {
            layout: "auth",
            guard: "auth",
        },
    },
    {
        path: "/detail/:id",
        name: "detail",
        component: Detail,
        meta: {
            layout: "auth",
            guard: "auth",
        },
    },
    {
        path: "/list",
        name: "list",
        component: List,
        meta: {
            layout: "auth",
            guard: "auth",
        },
    },
    {
        path: "/condition",
        name: "condition",
        component: Condition,
        meta: {
            layout: "auth",
            guard: "auth",
        },
    },
    {
        path: "/admin",
        name: "admin",
        component: Admin,
        meta: {
            layout: "admin",
            guard: "admin",
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const user = store.getters.user;
    const guard = to.meta.guard;

    if (guard === "guest" && user) {
        return next({ name: "home" });
    }

    if (guard === "auth" && !user) {
        return next({ name: "login" });
    }

    if (guard === "admin") {
        if (!user) return next({ name: "login" });

        // ตรวจสอบ role หรือสิทธิ admin จาก user
        if (user.level !== "admin") {
            return next({ name: "home" }); // ไม่ใช่แอดมิน กลับไปหน้า home
        }
    }

    next(); // ถ้าไม่มีปัญหาใด ๆ ให้ผ่านไป
});

export default router;
