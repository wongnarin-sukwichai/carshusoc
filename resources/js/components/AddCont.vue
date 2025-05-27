<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="layer-plus"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.cont")
            }}</span>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <!-- Layout 1 -->
            <div class="border-2 border-dashed rounded-xl p-48 cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center">
                <box-icon name="plus" size="lg" class="opacity-10 hover:scale-115 w-24 h-24"></box-icon>
                <div class="text-gray-300 text-sm">Upload a File <br> jpg, png to 4MB</div>
            </div>

            <!-- Layout 2 -->
            <div class="col-span-2 border-2 border-dashed rounded-xl p-8">
                <div class="grid grid-cols-4 gap-4">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.init") }} :</label
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
                    <div class="col-span-3">
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
                                    name="username"
                                    id="username"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-4 mt-6">
                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.owner") }} :</label
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
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.type") }} :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <div
                                    class="shrink-0 text-base text-gray-500 select-none sm:text-md"
                                ></div>
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
                            >{{ $t("addcont.budget") }} :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <div
                                    class="shrink-0 text-base text-gray-500 select-none sm:text-md"
                                ></div>
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

                <div class="mt-6">
                    <label
                        for="about"
                        class="block text-md font-medium text-gray-900"
                        >{{ $t("addcont.address") }} :</label
                    >
                    <div class="mt-2">
                        <textarea
                            name="about"
                            id="about"
                            rows="3"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                        ></textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <label
                        for="about"
                        class="block text-md font-medium text-gray-900"
                        >{{ $t("addcont.detail") }} :</label
                    >
                    <div class="mt-2">
                        <textarea
                            name="about"
                            id="about"
                            rows="3"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                        ></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-2 rounded-xl bg-lime-200 border-lime-300 hover:bg-lime-300"
                >
                    <box-icon name="plus-circle" class="mr-2"></box-icon>
                    {{ $t("addcont.add") }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import boxicons from "boxicons";

export default {
    mounted() {},
};
</script>
