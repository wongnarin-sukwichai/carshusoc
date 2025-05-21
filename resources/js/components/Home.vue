<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="grid grid-cols-4 gap-4">
            <div class="border-2 border-dashed rounded-xl ">
                <div
                    class="relative group overflow-hidden rounded-xl cursor-pointer"
                >
                    <img :src="pic1" class="w-full h-auto object-cover" />
                    <!-- พื้นหลังจาง -->
                    <div
                        class="absolute inset-0 bg-white/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                    ></div>

                    <!-- ปุ่มอยู่ชัดเจน -->
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"
                    >
                        <button
                            class="px-12 py-4 rounded-full text-blue-600 text-lg border-2 border-blue-400 hover:bg-blue-400 hover:text-white z-10 mb-4"
                            @click="getDetail(1)"
                        >
                            {{ $t("home.detail") }}
                        </button>
                        <button
                            class="px-8 py-4 rounded-full text-lime-600 text-lg border-2 border-lime-500 hover:bg-lime-500 hover:text-white z-10"
                            
                        >
                            {{ $t("home.reg") }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-2 border-dashed rounded-xl">
                <div
                    class="relative group overflow-hidden rounded-xl cursor-pointer"
                >
                    <img
                        :src="pic2"
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
                            class="px-12 py-4 rounded-full text-blue-600 text-lg border-2 border-blue-400 hover:bg-blue-400 hover:text-white z-10 mb-4"
                            @click="getDetail(1)"
                        >
                            {{ $t("home.detail") }}
                        </button>
                        <button
                            class="px-8 py-4 rounded-full text-lime-600 text-lg border-2 border-lime-500 hover:bg-lime-500 hover:text-white z-10"
                            
                        >
                            {{ $t("home.reg") }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-2 border-dashed"></div>
            <div class="border-2 border-dashed"></div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        
    },
    data() {
        return {
            pic1: "img/project/01.png",
            pic2: "img/project/02.png",
        };
    },
    methods: {
        getDetail(id) {
            console.log(id)
            this.$router.push("/detail/" + id);
        }
    }
};
</script>
