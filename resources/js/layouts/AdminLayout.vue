<template>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <transition name="slide-fade">
            <aside
                class="fixed lg:static top-0 left-0 z-50 w-[220px] h-full bg-white border-r shadow transition-transform"
                v-if="isSidebarOpen"
            >
                <nav
                    class="bg-slate-700 shadow-md border-r border-gray-200 h-screen fixed top-0 left-0 min-w-[220px] py-6 px-6 flex flex-col overflow-auto"
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
                                to="/enroll"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="list-check"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                รายการลงทะเบียน
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/member"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="user-plus"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                {{ $t("admin.member") }}
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/content"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="layer-plus"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                {{ $t("admin.cont") }}
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/mail"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    type="logo"
                                    name="gmail"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                {{ $t("admin.email") }}
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/admin"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="user"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                เจ้าหน้าที่ดูแลระบบ
                            </router-link>
                        </li>
                         <li>
                            <router-link
                                to="/report"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="report"
                                    type="solid"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                รายงาน (Excel)
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/stat"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="bar-chart-square"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                {{ $t("admin.stat") }}
                            </router-link>
                        </li>
                        <li>
                            <div
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all cursor-pointer"
                                @click="link()"
                            >
                                <box-icon
                                    name="file-pdf"
                                    type="solid"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                คู่มือระบบ
                            </div>
                        </li>
                    </ul>

                    <ul class="space-y-6 pl-3 mt-8">
                        <li>
                            <router-link
                                to="/home"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="right-arrow-circle"
                                    class="mr-2"
                                    color="#85c1e9"
                                ></box-icon>
                                <span>{{ $t("admin.back") }}</span>
                            </router-link>
                        </li>
                        <li>
                            <a
                                href="https://www.facebook.com/profile.php?id=100065010669710"
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
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
                                class="text-gray-50 font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all hover:cursor-pointer"
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
                                />
                            </div>
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

        <!-- menu -->
        <transition name="slide-fade">
            <div
                v-if="isSidebarOpen"
                @click="toggleSidebar"
                class="fixed opacity-50 top-4 left-3.5 z-50 flex items-center justify-center w-10 h-10 rounded-full bg-sky-500 text-white shadow-lg cursor-pointer hover:bg-sky-600 hover:opacity-100 transition duration-300"
            >
                <box-icon
                    name="menu"
                    type="solid"
                    color="white"
                    class="w-4 h-4"
                ></box-icon>
            </div>
        </transition>

        <div
            v-if="!isSidebarOpen"
            @click="toggleSidebar"
            class="fixed opacity-50 top-4 left-3.5 z-50 flex items-center justify-center w-10 h-10 rounded-full bg-sky-500 text-white shadow-lg cursor-pointer hover:bg-sky-600 hover:opacity-100 transition duration-300"
        >
            <!-- Optional: icon หรือแถบสี -->
            <box-icon
                name="menu"
                type="solid"
                color="white"
                class="w-4 h-4"
            ></box-icon>
        </div>

        <!-- Overlay สีดำ (เฉพาะ mobile) -->


        <!-- Space -->
        <main
        :class="isSidebarOpen ? 'flex-1 p-6' : 'flex-1 ml-0'"
        >
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
        link(){
            window.open("files/tools/tools.pdf" , "_blank");
        }
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>
