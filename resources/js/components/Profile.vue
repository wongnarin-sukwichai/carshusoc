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
            <div class="border-2 border-dashed rounded-xl p-8">
                <!-- picture -->
                <div
                    class="flex items-center justify-center"
                    v-if="this.user.pic === null && this.file === null"
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
                <div
                    class="flex items-center justify-center"
                    v-else-if="this.user.pic !== null && this.file === null"
                >
                    <img
                        class="border-gray-200 border-dashed w-42 rounded-full"
                        :src="pic + this.user.pic"
                    />
                </div>

                <div class="flex px-4 justify-center" v-else>
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
                        @click="upload()"
                    >
                        Upload
                    </button>
                </div>

                <!-- Alert Upload-->
                <transition name="fade" mode="out-in">
                    <span
                        class="flex items-center justify-center text-center text-xs text-rose-400"
                        v-if="alertUpload"
                        >*** กรุณาเลือกไฟล์รูปภาพ / Choose file : (jpg, jpeg,
                        png) ***</span
                    >
                </transition>

                <div
                    class="mt-6 border-2 border-gray-200 border-dashed p-8 rounded-xl"
                >
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-right font-semibold">
                            <div>{{ $t("profile.name") }} :</div>
                            <div>{{ $t("profile.email") }} :</div>
                        </div>
                        <div class="text-gray-600">
                            <div>{{ data.name }} {{ data.surname }}</div>
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
                                    :placeholder="data.name"
                                    v-model="data.name"
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
                                    :placeholder="data.surname"
                                    v-model="data.surname"
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
                            <span class="text-sky-300 text-sm"
                                >( Optional field. )</span
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
                                    :placeholder="data.firstname"
                                    v-model="data.firstname"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >นามสกุล (ภาษาอังกฤษ) :
                            <span class="text-sky-300 text-sm"
                                >( Optional field. )</span
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
                                    :placeholder="data.lastname"
                                    v-model="data.lastname"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Sex Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >สัญชาติ :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.nation"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.nation }}</span
                                ></transition
                            ></label
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
                                    <span v-if="data.nation === null"
                                        >เลือก</span
                                    >
                                    <span v-else>
                                        {{ setNation(data.nation) }}
                                    </span>
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
                                        @click="setNation(nation.id)"
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
                            >ว/ด/ป เกิด :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.born"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.born }}</span
                                ></transition
                            >
                        </label>
                        <div class="mt-2">
                            <Datepicker
                                v-model="data.born"
                                class="w-full text-sm"
                            />
                        </div>
                    </div>

                    <!-- Sex Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >เพศ :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.gender"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.gender }}</span
                                ></transition
                            >
                        </label>

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
                                    <span v-if="data.gender === null"
                                        >เลือก</span
                                    >
                                    <span v-else>
                                        {{ setGender(data.gender) }}
                                    </span>
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
                                        @click="setGender(gender.id)"
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
                            >ประเภท :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.type"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.type }}</span
                                ></transition
                            >
                        </label>

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
                                    <span v-if="data.type === null">เลือก</span>
                                    <span v-else>
                                        {{ setType(data.type) }}
                                    </span>
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
                                        @click="setType(type.id)"
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
                            >การศึกษา :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.degree"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.degree }}</span
                                ></transition
                            >
                        </label>

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
                                    <span v-if="data.degree === null"
                                        >เลือก</span
                                    >
                                    <span v-else>
                                        {{ setDegree(data.degree) }}
                                    </span>
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
                                        @click="setDegree(degree.id)"
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
                            >ระบุตัวตนด้วย :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.ident"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.ident }}</span
                                ></transition
                            ></label
                        >
                        <div class="flex flex-col gap-2">
                            <!-- เลขบัตรประชาชน -->
                            <label
                                class="inline-flex items-center gap-x-2 cursor-pointer"
                            >
                                <input
                                    type="radio"
                                    name="gender"
                                    :value="1"
                                    class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded-full"
                                    v-model="data.ident"
                                />
                                <span class="text-gray-700"
                                    >เลขบัตรประชาชน</span
                                >
                            </label>

                            <!-- เลขหนังสือเดินทาง-->
                            <label
                                class="inline-flex items-center gap-x-2 cursor-pointer"
                            >
                                <input
                                    type="radio"
                                    name="gender"
                                    :value="2"
                                    class="text-pink-500 focus:ring-pink-400 border-gray-300 rounded-full"
                                    v-model="data.ident"
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
                            >หมายเลขระบุตัวตน :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.idcard"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.idcard }}</span
                                ></transition
                            >
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    :placeholder="data.idcard"
                                    v-model="data.idcard"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >โทรศัพท์ :
                            <span class="text-sky-300 text-sm"
                                >( Optional field. )</span
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
                                    :placeholder="data.tel"
                                    v-model="data.tel"
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
                                v-model="data.chgPass"
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
                                v-model="data.chgPass"
                            />
                            <span class="text-gray-700">เปลี่ยนรหัสผ่าน</span>
                        </label>
                    </div>
                </div>

                <transition name="fade" mode="out-in">
                    <div
                        v-show="data.chgPass === true"
                        class="grid grid-cols-2 gap-4 mt-6"
                    >
                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >รหัสผ่านใหม่ :
                                <transition name="fade" mode="out-in">
                                    <span
                                        v-if="errorsPass.pass"
                                        class="text-rose-300 text-sm"
                                        >** Required field.</span
                                    ></transition
                                >
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex relative items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                >
                                    <input
                                        :type="showPass ? 'text' : 'password'"
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                        v-model="data.pass"
                                    />
                                    <box-icon
                                        name="low-vision"
                                        size="sd"
                                        color="#abb2b9"
                                        class="w-6 h-6 absolute right-3 cursor-pointer hover:scale-110"
                                        @click="togglePass()"
                                    ></box-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >ยืนยันรหัสผ่าน :
                                <transition name="fade" mode="out-in">
                                    <span
                                        v-if="errorsPass.confirm"
                                        class="text-rose-300 text-sm"
                                        >** Required field.</span
                                    ></transition
                                >
                                <transition name="fade" mode="out-in">
                                    <span
                                        v-if="errorsPass.notmatch"
                                        class="text-rose-300 text-sm"
                                        >** Not Match.</span
                                    ></transition
                                >
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex relative items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                >
                                    <input
                                        :type="
                                            showConfirm ? 'text' : 'password'
                                        "
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                        v-model="data.confirm"
                                    />
                                    <box-icon
                                        name="low-vision"
                                        size="sd"
                                        color="#abb2b9"
                                        class="w-6 h-6 absolute right-3 cursor-pointer hover:scale-110"
                                        @click="toggleConfirm()"
                                    ></box-icon>
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
                    @click="sendData()"
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
import Swal from "sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';

export default {
    async mounted() {
        await this.getUser();
        await this.getGender();
        await this.getType();
        await this.getDegree();
        await this.getNation();
    },
    data() {
        return {
            pic: "user/pics/",
            ////////////////////////////////////////////////////////////////
            genderShow: false,
            typeShow: false,
            degreeShow: false,
            nationShow: false,
            ////////////////////////////////////////////////////////////////
            alertUpload: false,
            ////////////////////////////////////////////////////////////////
            genderList: [],
            typeList: [],
            degreeList: [],
            nationList: [],
            ////////////////////////////////////////////////////////////////
            file: null,
            previewImage: "",
            picName: "",
            ////////////////////////////////////////////////////////////////
            data: {
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
                chgPass: false,
                pass: "",
                confirm: "",
            },
            errors: {
                name: "",
                surname: "",
                born: "",
                gender: "",
                type: "",
                degree: "",
                nation: "",
                ident: "",
                idcard: "",
            },
            errorsPass: {
                pass: false,
                confirm: false,
                notmatch: false,
            },
            showPass: false,
            showConfirm: false,
        };
    },
    methods: {
        ////////////////////////////////////////////////////////////////
        getUser() {
            this.data.name = this.user.name;
            this.data.surname = this.user.surname;
            this.data.firstname = this.user.firstname;
            this.data.lastname = this.user.lastname;
            this.data.born = this.user.born;
            this.data.gender = this.user.gender;
            this.data.type = this.user.type;
            this.data.degree = this.user.degree;
            this.data.nation = this.user.nation;
            this.data.ident = this.user.ident;
            this.data.idcard = this.user.idcard;
            this.data.tel = this.user.tel;
        },
        async getGender() {
            await axios.get("/api/gender").then((response) => {
                this.genderList = response.data;
            });
            /////////////// ดึงค่ามาจาก user
            if (this.user.gender !== null) {
                this.setGender(this.user.gender);
            }
        },
        async getType() {
            await axios.get("/api/type").then((response) => {
                this.typeList = response.data;
            });
            /////////////// ดึงค่ามาจาก user
            if (this.user.type !== null) {
                this.setType(this.user.type);
            }
        },
        async getDegree() {
            await axios.get("/api/degree").then((response) => {
                this.degreeList = response.data;
            });
            /////////////// ดึงค่ามาจาก user
            if (this.user.degree !== null) {
                this.setDegree(this.user.degree);
            }
        },
        async getNation() {
            await axios.get("/api/nation").then((response) => {
                this.nationList = response.data;
            });
            /////////////// ดึงค่ามาจาก user
            if (this.user.nation !== null) {
                this.setNation(this.user.nation);
            }
        },
        ////////////////////////////////////////////////////////////////
        setNation(id) {
            this.nationShow = false;
            if (id != null) {
                const arr = Array.from(this.nationList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
        },
        setGender(id) {
            this.genderShow = false;
            if (id != null) {
                const arr = Array.from(this.genderList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
        },
        setType(id) {
            this.typeShow = false;
            if (id != null) {
                const arr = Array.from(this.typeList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
        },
        setDegree(id) {
            this.degreeShow = false;
            if (id != null) {
                const arr = Array.from(this.degreeList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
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
            this.alertUpload = false;

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
        async upload() {
            if (this.file == null) {
                this.alertUpload = true;
            } else {
                let formData = new FormData(); //สร้าง FromData เพื่อรองรับข้อมูลประเภท File
                formData.append("file", this.file[0]);

                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                try {
                    await axios
                        .post("/api/upload", formData, config)
                        .then((response) => {
                            this.picName = response.data;
                        });
                    await axios
                        .put("/api/userPic/" + this.user.id, {
                            pic: this.picName,
                        })
                        .then(() => {
                            this.user.pic = this.picName;

                            Swal.fire({
                                title: "Upload Complete",
                                icon: "success",
                                timer: 1500,
                            });
                        });
                } catch (err) {
                    throw err;
                }
            }
        },
        sendData() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm the changes?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    if (!this.validateData()) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Check required fields please.",
                        });
                        return;
                    }

                    // ตรวจเฉพาะเมื่อเลือกเปลี่ยนรหัสผ่าน
                    if (this.data.chgPass === true) {
                        const pass = this.data.pass;
                        const confirm = this.data.confirm;
                        const isEmpty = (val) =>
                            val === null ||
                            val === undefined ||
                            val.toString().trim() === "";

                        // reset errors
                        this.errorsPass.pass = false;
                        this.errorsPass.confirm = false;
                        this.errorsPass.notmatch = false;

                        if (isEmpty(pass)) {
                            this.errorsPass.pass = true;
                            return;
                        }

                        if (isEmpty(confirm)) {
                            this.errorsPass.confirm = true;
                            return;
                        }

                        if (pass !== confirm) {
                            this.errorsPass.notmatch = true;
                            return;
                        }
                        axios
                            .put("/api/user/" + this.user.id, this.data)
                            .then((response) => {
                                Swal.fire({
                                    title: response.message,
                                    icon: "success",
                                    draggable: true,
                                });
                            });
                    } else {
                        // ✅ ไม่ได้เปลี่ยนรหัสผ่านก็ส่งข้อมูลได้
                        axios
                            .put("/api/user/" + this.user.id, this.data)
                            .then((response) => {
                                Swal.fire({
                                    title: response.message,
                                    icon: "success",
                                    draggable: true,
                                });
                            });
                    }
                }
            });
        },
        validateData() {
            let isValid = true;

            const req = [
                "name",
                "surname",
                "born",
                "gender",
                "type",
                "degree",
                "nation",
                "ident",
                "idcard",
            ];

            for (let key of req) {
                const value = this.data[key];

                if (
                    value === null ||
                    value === undefined ||
                    value.toString().trim() === ""
                ) {
                    this.errors[key] = "** Required field.";
                    isValid = false;
                } else {
                    this.errors[key] = ""; // เคลียร์ข้อความถ้ามีค่า
                }
            }

            return isValid;
        },
        togglePass() {
            this.showPass = !this.showPass;
        },
        toggleConfirm() {
            this.showConfirm = !this.showConfirm;
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
