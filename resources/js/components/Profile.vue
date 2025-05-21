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
                            <div>{{ $t("profile.add") }} :</div>
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
                            >{{ $t("profile.fname") }} :</label
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
                            >{{ $t("profile.email") }} :</label
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
                                    :placeholder="user.email"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("profile.pass") }} :</label
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

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("profile.conpass") }} :</label
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
                        >{{ $t('profile.add') }} :</label
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
                    class="flex border-2 border-dashed p-4 rounded-xl bg-amber-200 border-amber-300 hover:bg-amber-300"
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

export default {
    mounted() {
        console.log("Component mounted.");
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>
