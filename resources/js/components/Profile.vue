<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="user"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("profile.profile")
            }}</span>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <!-- Layout 1 -->
            <div class="border-2 border-dashed rounded-xl p-8">
                <!-- picture -->
                <div class="flex items-center justify-center">
                    <div
                        class="border-2 rounded-full p-12 border-gray-200 border-dashed mt-6"
                    >
                        <box-icon
                            name="user"
                            color="#e5e7eb"
                            size="lg"
                            class="w-24 h-24"
                        ></box-icon>
                    </div>
                </div>

                <div class="mt-6 flex justify-center items-center">
                    <box-icon
                        name="image"
                        size="lg"
                        color="#d1d5dc"
                        class="mr-2"
                    ></box-icon>
                    <button
                        type="button"
                        class="px-2.5 py-1.5 text-sm text-gray-600 border-1 border-dashed border-gray-300 rounded-lg hover:border-sky-300 hover:text-white hover:bg-sky-300"
                    >
                        Upload
                    </button>
                </div>

                <div
                    class="mt-6 border-2 border-gray-200 border-dashed p-8 rounded-xl"
                >
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-right font-semibold">
                            <div>{{ $t("profile.name") }} :</div>
                            <div>{{ $t("profile.email") }} :</div>
                        </div>
                        <div class="text-gray-600">
                            <div>{{ user.name }} {{ user.surname }}</div>
                            <div>{{ user.email }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layout 2 -->
            <div class="col-span-2 border-2 border-dashed rounded-xl p-8">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("profile.fname") }} :
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="user.name"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("profile.sname") }} :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="user.surname"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >ชื่อ (ภาษาอังกฤษ) :
                            <span class="text-rose-300"
                                >(ไม่บังคับ)</span
                            ></label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="user.firstname"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >นามสกุล (ภาษาอังกฤษ) :
                            <span class="text-rose-300"
                                >(ไม่บังคับ)</span
                            ></label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="user.lastname"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-4 mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >ว/ด/ป เกิด :</label
                        >
                        <div class="mt-2">
                            <Datepicker
                                v-model="picked"
                                class="w-full text-sm"
                            />
                        </div>
                    </div>

                    <!-- Sex Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >เพศ :</label
                        >

                        <div class="relative block w-full text-left mt-2">
                            <div>
                                <button
                                    type="button"
                                    class="inline-flex w-full rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                >
                                    Options
                                    <svg
                                        class="-mr-1 size-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        data-slot="icon"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Dropdown List -->
                        <div
                            class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            tabindex="-1"
                        >
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-0"
                                    >Account settings</a
                                >
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-1"
                                    >Support</a
                                >
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-2"
                                    >License</a
                                >
                                <form method="POST" action="#" role="none">
                                    <button
                                        type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="menu-item-3"
                                    >
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->

                    <!-- Type Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >ประเภท :</label
                        >

                        <div class="relative block w-full text-left mt-2">
                            <div>
                                <button
                                    type="button"
                                    class="inline-flex w-full rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                >
                                    Options
                                    <svg
                                        class="-mr-1 size-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        data-slot="icon"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Dropdown List -->
                        <div
                            class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            tabindex="-1"
                        >
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-0"
                                    >Account settings</a
                                >
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-1"
                                    >Support</a
                                >
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-2"
                                    >License</a
                                >
                                <form method="POST" action="#" role="none">
                                    <button
                                        type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="menu-item-3"
                                    >
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->

                    <!-- Degree Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >การศึกษา :</label
                        >

                        <div class="relative block w-full text-left mt-2">
                            <div>
                                <button
                                    type="button"
                                    class="inline-flex w-full rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                >
                                    Options
                                    <svg
                                        class="-mr-1 size-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        data-slot="icon"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Dropdown List -->
                        <div
                            class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            tabindex="-1"
                        >
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-0"
                                    >Account settings</a
                                >
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-1"
                                    >Support</a
                                >
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-2"
                                    >License</a
                                >
                                <form method="POST" action="#" role="none">
                                    <button
                                        type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="menu-item-3"
                                    >
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>

                <div class="grid grid-cols-5 gap-4 mt-6">
                    <div class="space-y-2">
                        <label class="block text-md font-medium text-gray-900"
                            >ระบุตัวตนด้วย :</label
                        >
                        <div class="flex flex-col gap-2">
                            <!-- เพศชาย -->
                            <label
                                class="inline-flex items-center gap-x-2 cursor-pointer"
                            >
                                <input
                                    type="radio"
                                    name="gender"
                                    value="male"
                                    class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded-full"
                                />
                                <span class="text-gray-700"
                                    >เลขบัตรประชาชน</span
                                >
                            </label>

                            <!-- เพศหญิง -->
                            <label
                                class="inline-flex items-center gap-x-2 cursor-pointer"
                            >
                                <input
                                    type="radio"
                                    name="gender"
                                    value="female"
                                    class="text-pink-500 focus:ring-pink-400 border-gray-300 rounded-full"
                                />
                                <span class="text-gray-700"
                                    >เลขหนังสือเดินทาง</span
                                >
                            </label>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >หมายเลขระบุตัวตน :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="user.born"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >โทรศัพท์ :
                            <span class="text-rose-300"
                                >(ไม่บังคับ)</span
                            ></label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="user.born"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-1 border-dashed" />

                <div>
                    <label class="block text-md font-medium text-gray-900"
                        >รหัสผ่าน :</label
                    >
                    <div class="flex flex-col sm:flex-row gap-4 mt-2">
                        <!-- ไม่เปลี่ยน -->
                        <label
                            class="inline-flex items-center gap-x-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                name="chgPass"
                                class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded-full"
                                checked
                                :value="false"
                                v-model="this.chgPass"
                            />
                            <span class="text-gray-700">ไม่เปลี่ยน</span>
                        </label>

                        <!-- เปลี่ยนรหัส -->
                        <label
                            class="inline-flex items-center gap-x-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                name="chgPass"
                                class="text-pink-500 focus:ring-pink-400 border-gray-300 rounded-full"
                                :value="true"
                                v-model="this.chgPass"
                            />
                            <span class="text-gray-700">เปลี่ยนรหัสผ่าน</span>
                        </label>
                    </div>
                </div>

                <transition name="fade" mode="out-in">
                    <div
                        v-show="chgPass === true"
                        class="grid grid-cols-2 gap-4 mt-6"
                    >
                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >รหัสผ่านใหม่ :
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                >
                                    <input
                                        type="text"
                                        name="username"
                                        id="username"
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >ยืนยันรหัสผ่าน :</label
                            >
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                >
                                    <input
                                        type="text"
                                        name="username"
                                        id="username"
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-3 rounded-xl bg-amber-200 border-amber-300 hover:bg-amber-300"
                >
                    <box-icon name="cog" class="mr-2"></box-icon>
                    {{ $t("profile.update") }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import boxicons from "boxicons";
import Datepicker from "vuejs3-datepicker";

export default {
    mounted() {},
    data() {
        return {
            // picked: new Date(),
            picked: "2025-07-01",
            chgPass: false,
            data: {},
        };
    },
    methods: {},
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
    components: {
        Datepicker,
    },
};
</script>
