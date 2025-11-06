<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                type="logo"
                name="gmail"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.email")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mb-2"
        >
            <ul role="list" class="divide-y divide-gray-100">
                <li
                    class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50"
                    v-for="(email, index) in mailList"
                    :key="index"
                    @click="link(email.id)"
                >
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                {{ email.title }}
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                {{ email.topic }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">
                            แก้ไขล่าสุด : {{ email.owner }}
                        </p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>            
            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";
import "moment/dist/locale/th";
moment.locale("th");

export default {
    mounted() {
        this.getMail();
    },
    data() {
        return {
            mailList: [],
            moment: moment
        };
    },
    methods: {
        getMail() {
            axios.get("/api/email").then((response) => {
                this.mailList = response.data;
            });
        },
        link(id) {
            this.$router.push("/email/" + id);
        },
    },
};
</script>
