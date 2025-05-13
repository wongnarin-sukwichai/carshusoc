<template>
  <component :is="layout">
    <router-view v-slot="{ Component, route }">
      <component :is="Component" :key="route.fullPath" />
    </router-view>
  </component>
</template>

<script>
import { computed } from "vue";
import { useRoute } from "vue-router";

import HomeLayout from "../layouts/HomeLayout.vue";
import LoginLayout from "../layouts/LoginLayout.vue";

export default {
    setup() {
        const route = useRoute();
        const layout = computed(() =>
            route.meta.layout === 'auth' ? LoginLayout : HomeLayout
        );

        return { layout };
    },
    mounted() {},
    data() {
        return {
            logo: "../img/logo/logo.png",
        };
    },
};
</script>
