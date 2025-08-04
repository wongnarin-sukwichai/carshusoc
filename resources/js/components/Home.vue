<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="grid grid-cols-4 gap-4">
            <div class="border-2 border-dashed rounded-xl">
                <div
                    class="relative group overflow-hidden rounded-xl cursor-pointer"
                    v-for="(content, index) in contentList"
                    :key="index"
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
                            class="px-12 py-2 rounded-full text-blue-600 text-lg border-2 border-blue-400 hover:bg-blue-400 hover:text-white z-10 mb-4"
                            @click="getDetail(content.id)"
                        >
                            {{ $t("home.detail") }}
                        </button>
                        <button
                            class="px-8 py-2 rounded-full text-lime-600 text-lg border-2 border-lime-500 hover:bg-lime-500 hover:text-white z-10"
                            @click="getCourse(content.id)"
                        >
                            {{ $t("home.reg") }}
                        </button>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    mounted() {
        this.getContent();
    },
    data() {
        return {
            pic: "img/contents/",
            contentList: []
        };
    },
    methods: {
        getContent() {
            axios.get('/api/content').then((response) => {
                this.contentList = response.data
            })
        },
        getDetail(id) {
            this.$router.push("/detail/" + id);
        },
        getCourse(id) {
            this.$router.push('/course/' + id);
        }
    },
};
</script>
