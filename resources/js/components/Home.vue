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

                        <div class="relative inline-block">
                            <box-icon
                                name="detail"
                                size="lg"
                                :color="
                                    detailHover
                                        ? '#ffffff'
                                        : 'oklch(70.7% 0.165 254.624)'
                                "
                                @mouseenter="detailHover = true"
                                @mouseleave="detailHover = false"
                                class="p-2 rounded-full border-2 border-blue-400 hover:bg-blue-400 z-10"
                                @click="getDetail(content.id)"
                            >
                            </box-icon>

                            <!-- ✅ Popover -->
                            <div
                                v-if="detailHover"
                                class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 w-24 p-1 bg-white border border-gray-900 rounded-full shadow text-xs text-center text-gray-900 z-20"
                            >
                                รายละเอียด
                            </div>

                            <box-icon
                                name="file-pdf"
                                type="solid"
                                size="lg"
                                :color="
                                    toollHover
                                        ? '#ffffff'
                                        : 'oklch(80.8% 0.114 19.571)'
                                "
                                @mouseenter="toolHover = true"
                                @mouseleave="toolHover = false"
                                class="p-2 rounded-full border-2 border-red-400 hover:bg-red-400 z-10 ml-2"
                                @click="getTool(content.file)"
                            >
                            </box-icon>

                            <!-- ✅ Popover -->
                            <div
                                v-if="toolHover"
                                class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 w-24 p-1 bg-white border border-gray-900 rounded-full shadow text-xs text-center text-gray-900 z-20"
                            >
                                ข้อมูล
                            </div>
                        </div>
                        <button
                            class="mt-4 px-8 py-2 rounded-full text-lime-600 text-lg border-2 border-lime-500 hover:bg-lime-500 hover:text-white z-10"
                            @click="getCourse(content.id)"
                        >
                            ลงทะเบียน
                        </button>
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
        this.getContent();
    },
    data() {
        return {
            pic: "img/contents/",
            contentList: [],
            detailHover: false,
            toolHover: false,
        };
    },
    methods: {
        getContent() {
            axios.get("/api/content").then((response) => {
                this.contentList = response.data;
            });
        },
        getDetail(id) {
            this.$router.push("/detail/" + id);
        },
        getCourse(id) {
            this.$router.push("/showSection/" + id);
        },
        getTool(id) {
            window.open("tools/" + id, "_blank");
        }
    },
};
</script>
