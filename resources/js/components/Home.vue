<template>
    <div class="bg-white p-4 rounded-2xl">
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"
        >
            <div
                class="border-2 rounded-xl shadow-lg"
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
                        class="absolute inset-0 bg-white/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
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

                            <button
                                type="button"
                                @mouseenter="toolHover = true"
                                @mouseleave="toolHover = false"
                                @click="getTool(content.file)"
                                class="p-2 rounded-full border-2 border-red-400 hover:bg-red-400 z-10 ml-2"
                                aria-label="PDF"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-6 h-6"
                                    :style="{
                                        color: toolHover
                                            ? '#ffffff'
                                            : 'oklch(80.8% 0.114 19.571)',
                                    }"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <!-- file shape -->
                                    <path
                                        d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm8 1.5V8h4.5L14 3.5z"
                                    />
                                    <!-- PDF letters -->
                                    <path
                                        d="M7 14h2.2c.9 0 1.5.6 1.5 1.5S10.1 17 9.2 17H8v2H7v-5zm1 1v1h1.1c.3 0 .6-.2.6-.5s-.2-.5-.6-.5H8zm4-1h1.6c1.4 0 2.4 1 2.4 2.5S15 19 13.6 19H12v-5zm1 1v3h.6c.8 0 1.4-.6 1.4-1.5S14.4 15 13.6 15H13zm4-1h3v1h-2v1h1.6v1H18v2h-1v-5z"
                                    />
                                </svg>
                            </button>

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
import "boxicons";

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
        },
    },
};
</script>
