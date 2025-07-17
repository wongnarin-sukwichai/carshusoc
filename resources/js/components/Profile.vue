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
                <div class="flex items-center justify-center"
                v-if="user.pic === null && this.file === null"
                >
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

                <div class="flex px-4 justify-center"
                v-else
                >
                    <transition name="fade" mode="out-in">
                        <div
                            v-if="previewImage"
                            class="imagePreviewWrapper rounded-full"
                            :style="{
                                'background-image': `url(${previewImage})`,
                            }"
                            @click="selectImage"
                        ></div>
                    </transition>
                </div>

                <div class="mt-6 flex justify-center items-center">
                    <box-icon
                        name="image"
                        size="lg"
                        color="#d1d5dc"
                        class="mr-2"
                    ></box-icon>
                    <input
                        class="w-48 cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary mr-2"
                        ref="fileInput"
                        type="file"
                        @input="pickFile"
                    />
                    <button
                        type="button"
                        class="px-2.5 py-1 text-sm text-gray-600 border-1 border-dashed border-gray-300 rounded-lg hover:border-sky-400 hover:text-white hover:bg-sky-300"
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

                <div class="grid grid-cols-3 gap-4 mt-6">
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

                    <!-- Sex Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >สัญชาติ :</label
                        >

                        <div class="relative block w-full text-left mt-2">
                            <div>
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showNation()"
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
                        <transition name="fade" mode="out-in">
                            <div
                                class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                                v-show="nationShow"
                            >
                                <div
                                    class="py-1 max-h-60 overflow-y-auto"
                                    role="none"
                                >
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(nation, index) in nationList"
                                        :key="index"
                                        @click="
                                            selectNation(
                                                nation.id,
                                                nation.title
                                            )
                                        "
                                    >
                                        {{ nation.title }}
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                    <!-- End Dropdown -->
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
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showGender()"
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
                        <transition name="fade" mode="out-in">
                            <div
                                class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                                v-show="genderShow"
                            >
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(gender, index) in genderList"
                                        :key="index"
                                        @click="
                                            selectGender(
                                                gender.id,
                                                gender.title
                                            )
                                        "
                                    >
                                        {{ gender.title }}
                                    </div>
                                </div>
                            </div>
                        </transition>
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
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showType()"
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
                        <transition name="fade" mode="out-in">
                            <div
                                class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                                v-show="typeShow"
                            >
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(type, index) in typeList"
                                        :key="index"
                                        :value="type.id"
                                    >
                                        {{ type.title }}
                                    </div>
                                </div>
                            </div>
                        </transition>
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
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showDegree()"
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
                        <transition name="fade" mode="out-in">
                            <div
                                class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                                v-show="degreeShow"
                            >
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(degree, index) in degreeList"
                                        :key="index"
                                        :value="degree.id"
                                    >
                                        {{ degree.title }}
                                    </div>
                                </div>
                            </div>
                        </transition>
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
import axios from "axios";
import boxicons from "boxicons";
import { types } from "sass";
import Datepicker from "vuejs3-datepicker";

export default {
    mounted() {
        this.getGender();
        this.getType();
        this.getDegree();
        this.getNation();
    },
    data() {
        return {
            // picked: new Date(),
            picked: "2025-07-01",
            chgPass: false,
            genderShow: false,
            typeShow: false,
            degreeShow: false,
            nationShow: false,
            genderList: "",
            typeList: "",
            degreeList: "",
            nationList: "",
            file: null,
            previewImage: "",
            data: {
                uid: "",
                name: "",
                surname: "",
                firstname: "",
                lastname: "",
                born: "",
                gender: "",
                type: "",
                degree: "",
                nation: "",
                ident: "",
                idcard: "",
                tel: "",
                password: "",
            },
        };
    },
    methods: {
        ////////////////////////////////////////////////////////////////
        getGender() {
            axios.get("/api/gender").then((response) => {
                this.genderList = response.data;
            });
        },
        getType() {
            axios.get("/api/type").then((response) => {
                this.typeList = response.data;
            });
        },
        getDegree() {
            axios.get("/api/degree").then((response) => {
                this.degreeList = response.data;
            });
        },
        getNation() {
            axios.get("/api/nation").then((response) => {
                this.nationList = response.data;
            });
        },
        ////////////////////////////////////////////////////////////////
        showGender() {
            this.genderShow = !this.genderShow;
        },
        showType() {
            this.typeShow = !this.typeShow;
        },
        showDegree() {
            this.degreeShow = !this.degreeShow;
        },
        showNation() {
            this.nationShow = !this.nationShow;
        },
        ////////////////////////////////////////////////////////////////
        resetFile() {
            this.$refs.fileInput.value = null; //clear ช่อง choose
            this.previewImage = "";
            this.file = "";
        },
        selectImage() {
            this.$refs.fileInput.click();
        },
        pickFile() {
            let input = this.$refs.fileInput;
            this.file = input.files; //เอาไฟล์รูปเข้าตัวแปร file
            //console.log(this.file[0])
            if (this.file && this.file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage = e.target.result;
                    //this.file = e.target.files[0];
                };
                reader.readAsDataURL(this.file[0]);
                this.$emit("input", this.file[0]);
            }
        },
    },
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

<style>
.imagePreviewWrapper {
    width: 250px;
    height: 250px;
    display: block;
    cursor: pointer;
    margin: 0 auto;
    background-size: cover;
    background-position: center center;
}
</style>
