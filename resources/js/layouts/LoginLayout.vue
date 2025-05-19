<template>
    <!-- Space -->
    <main class="min-h-screen flex items-center justify-center bg-linear-to-r from-amber-100 to-purple-200">
        <router-view v-slot="{ Component, route }">
            <transition name="fade" mode="out-in">
                <div :key="route.name">
                    <component :is="Component"> </component>
                </div>
            </transition>
        </router-view>
    </main>
    <!-- End Space -->
</template>

<script>

export default {
    mounted() {
    },
};
</script>
