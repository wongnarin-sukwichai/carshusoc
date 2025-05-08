<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <main>
                        <router-view v-slot="{ Component, route }">
                            <transition name="fade" mode="out-in">
                                <div :key="route.name">
                                    <component :is="Component"> </component>
                                </div>
                            </transition>
                        </router-view>

                        <footer
                            class="footer footer-center text-base-content border-t h-auto bottom-0 w-screen text-gray-50 mt-10 bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
                        >
                            <div
                                class="py-4 text-sm text-center dark:text-gray-50"
                            >
                                ©2024 Academic Resource Center MSU
                            </div>
                        </footer>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
