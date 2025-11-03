<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="shield-plus"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.home")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-2 rounded-xl mb-2 text-center text-[#85c1e9] font-semibold"
        >
            {{ $t("admin.welcome") }}
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mb-2"
        >
            <div class="grid grid-cols-6 gap-4">
                <div
                v-for="(admin, index) in adminList"
                :key="index"
                >
                    <div
                        class="border-2 rounded-lg border-gray-200"
                    >
                        <img :src="pic + admin.pic" class="rounded-lg w-auto" />
                    </div>
                    <div
                        class="mt-2 border-2 rounded-lg border-gray-200 text-center p-2 text-[#85c1e9] text-sm"
                    >
                        <p>{{ admin.name }} {{ admin.surname }}</p>
                        <p>เจ้าหน้าที่ดูแลระบบ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    mounted() {
        this.getAdmin();
    },
    data() {
        return {
            pic: "img/profiles/",
            adminList: "",
        };
    },
    methods: {
        getAdmin() {
            axios.get("/api/userAdmin").then((response) => {
                this.adminList = response.data;
            });
        },
    },
};
</script>
