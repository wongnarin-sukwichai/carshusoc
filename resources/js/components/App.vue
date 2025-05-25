<template>
    <div :class="fontClass">
        <component :is="layout">
            <router-view v-slot="{ Component, route }">
                <component :is="Component" :key="route.fullPath" />
            </router-view>
        </component>
    </div>
</template>

<script>
import { computed } from "vue";
import { useRoute } from "vue-router";
import { useI18n } from "vue-i18n";

import HomeLayout from "../layouts/HomeLayout.vue";
import LoginLayout from "../layouts/LoginLayout.vue";
import AdminLayout from "../layouts/AdminLayout.vue";

export default {
    setup() {
        const route = useRoute();
        const { locale } = useI18n();

        const layout = computed(() => {
            if (route.meta.layout === "auth") return HomeLayout;
            else if (route.meta.layout === "guest") return LoginLayout;
            else if (route.meta.layout === "admin") return AdminLayout;
            else return HomeLayout; // default
        });

        const fontClass = computed(() => {
            return locale.value === "th" ? "font-thai" : "font-en";
        });

        return {
            layout,
            fontClass,
        };
    },
    mounted() {},
    data() {
        return {
            logo: "../img/logo/logo.png",
        };
    },
};
</script>

<style>
.font-thai {
    font-family: "Anuphan", sans-serif;
}

.font-en {
    font-family: "Poppins", sans-serif;
}
</style>
