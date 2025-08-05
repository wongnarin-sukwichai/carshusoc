<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="layer-plus"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">
                เพิ่มเนื้อหา
            </span>
        </div>

        <div class="grid grid-cols-3 gap-2">
            <!-- MNain 1 -->
            <div class="border-2 border-dashed rounded-xl p-8"></div>

            <!-- Main 2 -->
            <div class="col-span-2">
                <div
                    class="grid grid-cols-4 gap-4 border-2 border-dashed rounded-xl p-5"
                >
                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.title") }} :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >ประเภท :
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layout 2 -->
                <div class="my-2">
                    <span class="text-[#85c1e9] text-lg font-bold">
                        : กิจกรรม
                    </span>
                </div>

                <div
                    class="grid grid-cols-2 gap-2 border-2 border-dashed rounded-xl p-5"
                >
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >วันเริ่มกิจกรรม :
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >วันสิ้นสุด :
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layout 3 -->
                <div class="my-2">
                    <span class="text-[#85c1e9] text-lg font-bold">
                        : นัดหมาย
                    </span>
                </div>
                <div
                    class="grid grid-cols-3 gap-2 border-2 border-dashed rounded-xl p-5"
                >
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >วันที่สอบ :
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >เวลาสอบ :
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >สถานที่สอบ :
                        </label>
                        <div class="mt-2">
                            <textarea
                                rows=""
                                class="block w-full rounded-md bg-white px-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <!-- Layout 4 -->
                <div class="grid grid-cols-2 gap-2 my-2">
                    <div>
                        <span class="text-[#85c1e9] text-lg font-bold">
                            : ค่าบริการ
                        </span>

                        <div
                            class="grid grid-cols-2 gap-2 border-2 border-dashed rounded-xl p-5"
                        >
                            <div>
                                <label
                                    for="username"
                                    class="block text-md font-medium text-gray-900"
                                    >ค่าบริการ :
                                </label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                    >
                                        <input
                                            type="text"
                                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label
                                    for="username"
                                    class="block text-md font-medium text-gray-900"
                                    >ค่าไปรษณีย์ :
                                </label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                    >
                                        <input
                                            type="text"
                                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="text-[#85c1e9] text-lg font-bold">
                            : อื่นๆ
                        </span>
                        <div
                            class="col-span-2 border-2 border-dashed rounded-xl p-3.5"
                        >
                            <div>อื่นๆ :</div>
                            <div class="mt-2">
                                <textarea
                                    rows=""
                                    class="block w-full rounded-md bg-white px-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-2 rounded-xl bg-lime-200 border-lime-300 hover:bg-lime-300"
                    @click="sendData()"
                >
                    <box-icon name="plus-circle" class="mr-2"></box-icon>
                    {{ $t("addcont.add") }}
                </button>
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
