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
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
