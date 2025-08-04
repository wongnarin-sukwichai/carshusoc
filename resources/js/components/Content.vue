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
                        class="absolute inset-0 flex flex-row items-center justify-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"
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
                        </div>

                        <div class="relative inline-block">
                            <box-icon
                                name="cog"
                                size="lg"
                                :color="
                                    editHover
                                        ? '#ffffff'
                                        : 'oklch(66.6% 0.179 58.318)'
                                "
                                @mouseenter="editHover = true"
                                @mouseleave="editHover = false"
                                class="p-2 rounded-full text-amber-600 border-2 border-amber-400 hover:bg-amber-400 z-10"
                                @click="getEdit(content.id)"
                            >
                                แก้ไข
                            </box-icon>

                            <!-- ✅ Popover -->
                            <div
                                v-if="editHover"
                                class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 w-24 p-1 bg-white border border-gray-900 rounded-full shadow text-xs text-center text-gray-900 z-20"
                            >
                                แก้ไข
                            </div>
                        </div>

                        <div class="relative inline-block">
                            <box-icon
                                name="plus"
                                size="lg"
                                :color="
                                    addHover
                                        ? '#ffffff'
                                        : 'oklch(64.8% 0.2 131.684)'
                                "
                                @mouseenter="addHover = true"
                                @mouseleave="addHover = false"
                                class="p-2 rounded-full text-lime-600 border-2 border-lime-400 hover:bg-lime-400 z-10"
                                @click="getAdd(content.id)"
                            >
                                แก้ไข
                            </box-icon>

                            <!-- ✅ Popover -->
                            <div
                                v-if="addHover"
                                class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 w-24 p-1 bg-white border border-gray-900 rounded-full shadow text-xs text-center text-gray-900 z-20"
                            >
                                เพิ่ม
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="border-2 border-dashed rounded-xl hover:border-gray-300"
            >
                <router-link
                    to="/addContent"
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
import boxicons from "boxicons";

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
            ////////////////////////////////////////////////////////////////
            detailHover: false,
            editHover: false,
            addHover: false,
        };
    },
    methods: {
        getContent() {
            axios.get("/api/content").then((response) => {
                this.contentList = response.data;
            });
        },
        getDetail(id) {
            const url = this.$router.resolve({ path: "/detail/" + id }).href;
            window.open(url, "_blank");
        },
        getEdit(id) {
            this.$router.push("/editContent/" + id);
        },
    },
};
</script>
