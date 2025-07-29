<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="grid grid-cols-4 gap-4">
            <div
                class="border-2 border-dashed rounded-xl"
                v-for="(content, index) in contentList"
                :key="index"
            >
                <div
                    class="relative group overflow-hidden rounded-xl cursor-pointer"
                >
                    <img
                        :src="pic + content.pic"
                        class="w-full h-auto object-cover rounded-xl cursor-pointer"
                    />
                    <!-- พื้นหลังจาง -->
                    <div
                        class="absolute inset-0 bg-white/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                    ></div>

                    <!-- ปุ่มอยู่ชัดเจน -->
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"
                    >
                        <button
                            class="px-12 py-2 rounded-full text-blue-600 text-md border-2 border-blue-400 hover:bg-blue-400 hover:text-white z-10 mb-4"
                            @click="getDetail(content.id)"
                        >
                            {{ $t("home.detail") }}
                        </button>

                         <button
                            class="px-12 py-2 rounded-full text-amber-600 text-md border-2 border-amber-400 hover:bg-amber-400 hover:text-white z-10 mb-4"
                            @click="getEdit(content.id)"
                        >
                            แก้ไข
                        </button>
                    </div>
                </div>
            </div>

            <div
                class="border-2 border-dashed rounded-xl hover:border-gray-300"
            >
                <router-link
                    to="/addcontent"
                    class="flex justify-center p-24 group overflow-hidden rounded-xl cursor-pointer"
                >
                    <box-icon
                        name="plus"
                        size="lg"
                        class="opacity-10 hover:scale-115 w-24 h-48"
                    ></box-icon>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import "boxicons";

export default {
    mounted() {
        this.getContent();
    },
    data() {
        return {
            ////////////////////////////////////////////////////////////////
            pic: "img/contents/",
            ////////////////////////////////////////////////////////////////
            contentList: [],
        };
    },
    methods: {
        getContent() {
            axios.get("/api/content").then((response) => {
                this.contentList = response.data;
            });
        },
        getDetail(id) {
            const url = this.$router.resolve({ path: '/detail/' + id }).href;
            window.open(url, "_blank");
        },
    },
};
</script>
