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
                                    color="#3949ab"
                                ></box-icon>
                                {{ $t("home.home") }}
                            </router-link>
                        </li>

                        <li class="group">
                            <div class="collapsible-toggle">
                                <router-link
                                    to="/information"
                                    class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                                >
                                    <box-icon
                                        name="user"
                                        class="mr-2"
                                        color="#3949ab"
                                    ></box-icon
                                    >{{ $t("home.profile") }}
                                    <!-- <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="arrow w-3 h-3 fill-current transition-all ml-auto rotate-90"
                                        viewBox="0 0 492.004 492.004"
                                    >
                                        <path
                                            d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                                            data-original="#000000"
                                        />
                                    </svg> -->
                                </router-link>
                            </div>

                            <!-- <ul
                                class="space-y-2 pl-2 max-h-[500px] overflow-hidden transition-all duration-300 mt-4"
                            >
                                <li>
                                    <a
                                        href="javascript:void(0)"
                                        class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md px-4 py-2.5 transition-all"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            class="w-[18px] h-[18px] mr-3"
                                            viewBox="0 0 512 512"
                                        >
                                            <path
                                                d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                                                data-original="#000000"
                                            />
                                        </svg>
                                        <span>Audience</span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>

                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <box-icon
                                    name="lock"
                                    class="mr-2"
                                    color="#3949ab"
                                ></box-icon>
                                <span>{{ $t("home.term") }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 512 512"
                                >
                                    <path
                                        d="M122.39 165.78h244.87c10.49 0 19-8.51 19-19s-8.51-19-19-19H122.39c-10.49 0-19 8.51-19 19s8.51 19 19 19zm164.33 99.44c0-10.49-8.51-19-19-19H122.39c-10.49 0-19 8.51-19 19s8.51 19 19 19h145.33c10.49 0 19-8.51 19-19z"
                                        data-original="#000000"
                                    />
                                    <path
                                        d="M486.63 323.71c2.04-22.33 3.41-48.35 3.44-78.68-.06-57.07-4.85-98.86-9.96-129.57-8.94-50.6-54.9-96.56-105.5-105.5C343.9 4.85 302.11.06 245.03 0c-57.07.06-98.87 4.85-129.58 9.96C64.86 18.9 18.9 64.86 9.96 115.46 4.85 146.17.07 187.96 0 245.03c.07 57.07 4.85 98.87 9.96 129.58 8.94 50.6 54.9 96.56 105.5 105.5 30.71 5.11 72.5 9.89 129.58 9.96 30.32-.03 56.34-1.4 78.66-3.44 19.84 15.87 45 25.37 72.38 25.37 64.02 0 115.93-51.9 115.93-115.92 0-27.38-9.5-52.54-25.37-72.37zM245.04 452.07c-45.02-.05-85.3-3.13-123.13-9.41-16.81-3.01-33.84-12.44-47.95-26.55s-23.53-31.13-26.55-47.95c-6.28-37.79-9.35-78.07-9.41-123.13.05-45.04 3.13-85.32 9.41-123.13 3.01-16.81 12.44-33.83 26.55-47.94s31.13-23.53 47.95-26.55C159.72 41.13 200 38.06 245.04 38c45.02.05 85.3 3.13 123.13 9.41 16.81 3.01 33.83 12.44 47.95 26.55 14.11 14.11 23.53 31.13 26.55 47.95 6.28 37.83 9.35 78.1 9.41 123.13-.02 16.9-.48 33.11-1.36 48.79-16.28-8.72-34.88-13.66-54.64-13.66-64.02 0-115.93 51.9-115.93 115.92 0 19.76 4.95 38.35 13.66 54.63-15.68.88-31.89 1.34-48.78 1.35zM396.08 474c-42.97 0-77.93-34.95-77.93-77.92s34.96-77.92 77.93-77.92 77.93 34.95 77.93 77.92S439.05 474 396.08 474z"
                                        data-original="#000000"
                                    />
                                    <path
                                        d="M406.28 418.24c-2.42-.4-5.71-.78-10.2-.78s-7.78.38-10.2.78c-3.98.7-7.6 4.32-8.31 8.31-.4 2.42-.78 5.71-.78 10.2s.38 7.78.78 10.2c.7 3.98 4.32 7.6 8.31 8.31 2.42.4 5.71.78 10.2.78s7.78-.38 10.2-.78c3.98-.7 7.6-4.32 8.31-8.31.4-2.42.78-5.71.78-10.2s-.38-7.78-.78-10.2c-.7-3.98-4.32-7.6-8.31-8.31zm-10.21-12.61c10.49 0 19-8.51 19-19v-31.7c0-10.49-8.51-19-19-19s-19 8.51-19 19v31.7c0 10.49 8.51 19 19 19z"
                                        data-original="#000000"
                                    />
                                </svg>
                                <span>{{ $t("home.list") }}</span>
                                <span
                                    class="bg-red-400 w-[18px] h-[18px] flex items-center justify-center text-white text-[11px] font-bold ml-auto rounded-full animate-bounce"
                                    >2</span
                                >
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 511.414 511.414"
                                >
                                    <path
                                        d="M497.695 108.838a16.002 16.002 0 0 0-9.92-14.8L261.787 1.2a16.003 16.003 0 0 0-12.16 0L23.639 94.038a16 16 0 0 0-9.92 14.8v293.738a16 16 0 0 0 9.92 14.8l225.988 92.838a15.947 15.947 0 0 0 12.14-.001c.193-.064-8.363 3.445 226.008-92.837a16 16 0 0 0 9.92-14.8zm-241.988 76.886-83.268-34.207L352.39 73.016l88.837 36.495zm-209.988-51.67 71.841 29.513v83.264c0 8.836 7.164 16 16 16s16-7.164 16-16v-70.118l90.147 37.033v257.797L45.719 391.851zM255.707 33.297l55.466 22.786-179.951 78.501-61.035-25.074zm16 180.449 193.988-79.692v257.797l-193.988 79.692z"
                                        data-original="#000000"
                                    />
                                </svg>
                                <span>{{ $t("home.his") }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    stroke="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 682.667 682.667"
                                >
                                    <defs>
                                        <clipPath
                                            id="a"
                                            clipPathUnits="userSpaceOnUse"
                                        >
                                            <path
                                                d="M0 512h512V0H0Z"
                                                data-original="#000000"
                                            />
                                        </clipPath>
                                    </defs>
                                    <g
                                        clip-path="url(#a)"
                                        transform="matrix(1.33 0 0 -1.33 0 682.667)"
                                    >
                                        <path
                                            fill="none"
                                            stroke-miterlimit="10"
                                            stroke-width="40"
                                            d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                            data-original="#000000"
                                        />
                                        <path
                                            d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                            data-original="#000000"
                                        />
                                    </g>
                                </svg>
                                <span>{{ $t("home.score") }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    stroke="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 682.667 682.667"
                                >
                                    <defs>
                                        <clipPath
                                            id="a"
                                            clipPathUnits="userSpaceOnUse"
                                        >
                                            <path
                                                d="M0 512h512V0H0Z"
                                                data-original="#000000"
                                            />
                                        </clipPath>
                                    </defs>
                                    <g
                                        clip-path="url(#a)"
                                        transform="matrix(1.33 0 0 -1.33 0 682.667)"
                                    >
                                        <path
                                            fill="none"
                                            stroke-miterlimit="10"
                                            stroke-width="40"
                                            d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                            data-original="#000000"
                                        />
                                        <path
                                            d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                            data-original="#000000"
                                        />
                                    </g>
                                </svg>
                                <span>{{ $t("home.pri") }}</span>
                            </a>
                        </li>
                    </ul>

                    <ul v-if="(level = 'admin')" class="space-y-6 pl-3 mt-8">
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 512 512"
                                >
                                    <circle
                                        cx="256"
                                        cy="378.5"
                                        r="25"
                                        data-original="#000000"
                                    />
                                    <path
                                        d="M256 0C114.516 0 0 114.497 0 256c0 141.484 114.497 256 256 256 141.484 0 256-114.497 256-256C512 114.516 397.503 0 256 0zm0 472c-119.377 0-216-96.607-216-216 0-119.377 96.607-216 216-216 119.377 0 216 96.607 216 216 0 119.377-96.607 216-216 216z"
                                        data-original="#000000"
                                    />
                                    <path
                                        d="M256 128.5c-44.112 0-80 35.888-80 80 0 11.046 8.954 20 20 20s20-8.954 20-20c0-22.056 17.944-40 40-40s40 17.944 40 40-17.944 40-40 40c-11.046 0-20 8.954-20 20v50c0 11.046 8.954 20 20 20s20-8.954 20-20v-32.531c34.466-8.903 60-40.26 60-77.469 0-44.112-35.888-80-80-80z"
                                        data-original="#000000"
                                    />
                                </svg>
                                <span>{{ $t("home.set") }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 512 512"
                                >
                                    <circle
                                        cx="256"
                                        cy="378.5"
                                        r="25"
                                        data-original="#000000"
                                    />
                                    <path
                                        d="M256 0C114.516 0 0 114.497 0 256c0 141.484 114.497 256 256 256 141.484 0 256-114.497 256-256C512 114.516 397.503 0 256 0zm0 472c-119.377 0-216-96.607-216-216 0-119.377 96.607-216 216-216 119.377 0 216 96.607 216 216 0 119.377-96.607 216-216 216z"
                                        data-original="#000000"
                                    />
                                    <path
                                        d="M256 128.5c-44.112 0-80 35.888-80 80 0 11.046 8.954 20 20 20s20-8.954 20-20c0-22.056 17.944-40 40-40s40 17.944 40 40-17.944 40-40 40c-11.046 0-20 8.954-20 20v50c0 11.046 8.954 20 20 20s20-8.954 20-20v-32.531c34.466-8.903 60-40.26 60-77.469 0-44.112-35.888-80-80-80z"
                                        data-original="#000000"
                                    />
                                </svg>
                                <span>{{ $t("home.help") }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                class="text-[#3949ab] font-medium text-[15px] flex items-center rounded-md left-0 hover:left-1 relative transition-all"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3"
                                    viewBox="0 0 6.35 6.35"
                                >
                                    <path
                                        d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                                        data-original="#000000"
                                    />
                                </svg>
                                <span @click="logout()">{{
                                    $t("home.logout")
                                }}</span>
                            </a>
                        </li>
                    </ul>

                    <hr class="my-6 border-gray-200" />

                    <div class="flex flex-wrap items-center cursor-pointer">
                        <div class="relative">
                            <box-icon
                                name="user"
                                size="md"
                                color="#6a7282"
                            ></box-icon>
                            <span
                                class="h-3 w-3 rounded-full bg-green-600 border-2 border-white block absolute bottom-0 right-0"
                            ></span>
                        </div>

                        <div class="ml-4">
                            <p class="text-sm text-[#3949ab] font-semibold">
                                {{ fullname }}
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                {{ email }}
                            </p>
                        </div>
                    </div>
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
        <main class="flex-1 p-6 bg-gray-50">
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
            logo: "/img/logo/logo.png",
            isSidebarOpen: true,
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
        level() {
            return this.$store.getters.level;
        },
        fullname() {
            return this.$store.getters.fullname;
        },
        email() {
            return this.$store.getters.email;
        },
    },
};
</script>
