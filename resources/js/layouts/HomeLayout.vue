<template>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <transition name="slide-fade">
            <aside
                class="fixed lg:static top-0 left-0 z-50 w-[220px] h-full bg-white border-r shadow transition-transform"
                v-if="isSidebarOpen"
            >
                <nav
                    class="bg-white shadow-md border-r border-gray-200 h-screen fixed top-0 left-0 min-w-[220px] py-6 px-6 flex flex-col overflow-auto"
                >
                    <div
                        class="flex flex-wrap items-center cursor-pointer relative"
                    >
                        <img
                            :src="logo"
                            class="w-32 h-32 lg:w-20 lg:h-20 lg:border-r lg:justify-center"
                        />

                        <div class="ml-4 hidden lg:block">
                            <p
                                class="font-medium bg-gradient-to-r from-amber-400 via-amber-600 to-purple-500 inline-block text-transparent bg-clip-text text-[15px]"
                            >
                                CARS-HUSOC
                            </p>
                            <p class="text-xs text-slate-500 mt-0.5">
                                Humanities & <br />
                                Social Sciences
                            </p>
                        </div>
                    </div>

                    <hr class="my-6 border-gray-200" />

                    <ul class="space-y-6 pl-3 flex-1">
                        <li>
                            <router-link
                                to="/home"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="home"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                {{ $t("home.home") }}
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                to="/profile"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="user"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon
                                >{{ $t("home.profile") }}
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                to="/condition"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="lock"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.cond") }}</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/list"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="spreadsheet"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.list") }}</span>
                                <span
                                    class="bg-red-400 w-[18px] h-[18px] flex items-center justify-center text-white text-[11px] font-bold ml-auto rounded-full animate-bounce"
                                    >2</span
                                >
                            </router-link>
                        </li>
                        <!-- <li>
                            <router-link
                                to="/home"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="history"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.his") }}</span>
                            </router-link>
                        </li> -->
                        <li>
                            <router-link
                                to="/cert"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="certification"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.cert") }}</span>
                            </router-link>
                        </li>
                        <li>
                            <a
                                href="https://pdpa.msu.ac.th/"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                                target="_blank"
                            >
                                <box-icon
                                    name="shield"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.pri") }}</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="space-y-6 pl-3 mt-8">
                        <li v-if="user && user.level === 'admin'">
                            <router-link
                                to="/admin"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="cog"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.set") }}</span>
                            </router-link>
                        </li>
                        <li>
                            <a
                                href="https://www.facebook.com/profile.php?id=100065010669710"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                                target="_blank"
                            >
                                <box-icon
                                    name="help-circle"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("home.help") }}</span>
                            </a>
                        </li>
                        <li>
                            <div
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all hover:cursor-pointer"
                            >
                                <box-icon
                                    name="log-out-circle"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span @click="logout()">{{
                                    $t("home.logout")
                                }}</span>
                            </div>
                        </li>
                    </ul>

                    <hr class="my-6 border-gray-200" />

                    <router-link
                        to="/profile"
                        class="flex flex-wrap items-center cursor-pointer"
                    >
                        <div class="relative">
                            <div v-if="user.pic === null">
                                <box-icon
                                    name="user"
                                    size="md"
                                    color="#6a7282"
                                ></box-icon>
                            </div>
                            <div v-else>
                            <img
                            class="rounded-full w-10"
                            :src="pic + this.user.pic"
                            /></div>
                            <span
                                class="h-3 w-3 rounded-full bg-green-600 border-2 border-white block absolute bottom-0 right-0"
                            ></span>
                        </div>

                        <div v-if="user" class="ml-4">
                            <p class="text-sm text-[#3949ab] font-semibold">
                                {{ user.name }} {{ user.surname }}
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                {{ user.email }}
                            </p>
                        </div>
                    </router-link>
                </nav>
            </aside>
        </transition>
        <!-- End Sidebar -->

        <!-- Hamberger -->
        <transition name="slide-fade">
            <div
                v-if="isSidebarOpen"
                @click="toggleSidebar"
                class="fixed left-51 top-1/2 -translate-y-1/2 z-50 h-24 w-4 rounded-l-md shadow-md cursor-pointer flex items-center justify-center lg:hidden bg-blue-950"
            >
                <box-icon
                    name="chevrons-left"
                    type="solid"
                    color="white"
                    class="w-4 h-4"
                ></box-icon>
            </div>
        </transition>

        <div
            v-if="!isSidebarOpen"
            @click="toggleSidebar"
            class="fixed left-0 top-1/2 -translate-y-1/2 z-50 h-24 w-4 bg-blue-900 rounded-r-md shadow-md cursor-pointer flex items-center justify-center lg:hidden"
        >
            <!-- Optional: icon หรือแถบสี -->
            <box-icon
                name="chevrons-right"
                type="solid"
                color="white"
                class="w-4 h-4"
            ></box-icon>
        </div>

        <!-- Overlay สีดำ (เฉพาะ mobile) -->
        <transition name="fade">
            <div
                v-if="isSidebarOpen"
                class="fixed inset-0 bg-gray-100 bg-opacity-70 z-40 lg:hidden"
                @click="toggleSidebar"
            ></div>
        </transition>

        <!-- Space -->
        <main class="flex-1 p-6 bg-gray-100">
            <router-view v-slot="{ Component, route }">
                <transition name="fade" mode="out-in">
                    <div :key="route.name">
                        <component :is="Component"> </component>
                    </div>
                </transition>
            </router-view>
        </main>
        <!-- End Space -->
    </div>
</template>

<script>
import "boxicons";

export default {
    mounted() {},
    data() {
        return {
            logo: "/img/logo/logo-rm.png",
            isSidebarOpen: true,
            pic: "img/profiles/thumbnails/",
        };
    },
    methods: {
        async logout() {
            await this.$store.dispatch("logout");
            this.$router.push({ name: "login" });
        },
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        },
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>
