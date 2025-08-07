<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="layer-plus"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">
                เพิ่มเนื้อหา
            </span>
        </div>

        <div class="grid grid-cols-5 gap-4">
            <div
                class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center overflow-hidden"
                v-for="(section, index) in sectionList"
                :key="index"
            >
                <div class="card-container">
                    <div class="card">
                        <div class="front-content">
                            <p>{{ section.title }}</p>
                        </div>
                        <div class="content">
                            <p class="heading">Detail</p>
                            <div class="text-sm text-left pl-2">
                                <p v-if="section.start">
                                    <span class="font-semibold"
                                        >วันเริ่ม :</span
                                    >
                                    {{ setMoment(section.start) }} -
                                    {{ setMoment(section.end) }}
                                </p>
                                <p v-if="section.examdate">
                                    <span class="font-semibold"
                                        >วันสอบ/อบรม :</span
                                    >
                                    {{ section.examdate }}
                                </p>
                                <p v-if="section.examtime">
                                    <span class="font-semibold">เวลา : </span
                                    >{{ section.examtime }}
                                </p>
                                <p v-if="section.price">
                                    <span class="font-semibold"
                                        >ค่าสมัคร :</span
                                    >
                                    {{
                                        Number(section.price).toLocaleString()
                                    }}
                                    บาท
                                </p>
                                <p v-if="section.postage">
                                    <span class="font-semibold"
                                        >ค่าไปรษณีย์ :</span
                                    >
                                    {{ section.postage }} บาท
                                </p>
                            </div>

                            <button
                                class="bg-white p-2 rounded-full w-2/4 mt-2 text-gray-900 hover:scale-105 hover:border-2 hover:border-sky-400 hover:text-sky-400"
                                @click="sendData()"
                            >
                                ลงทะเบียน
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- plus -->
            <div
                class="border-2 border-dashed rounded-xl hover:border-lime-400"
                @click="addSection()"
            >
                <div
                    class="flex items-center justify-center group overflow-hidden rounded-xl cursor-pointer h-full w-full"
                >
                    <box-icon
                        name="plus"
                        size="lg"
                        class="opacity-10 hover:scale-115"
                    ></box-icon>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import "boxicons";
import moment from "moment";

export default {
    mounted() {
        this.getSection();
    },
    data() {
        return {
            sectionList: [],
        };
    },
    methods: {
        getSection() {
            axios.get("/api/section/" + this.$route.params.id).then((response) => {
                this.sectionList = response.data;
            });
        },
        addSection() {
            this.$router.push("/addSection/" + this.$route.params.id);
        },
        setMoment(id) {
            return moment(id).format("L");
        },
    },
};
</script>

<style scoped>
/* From Uiverse.io by gharsh11032000 */
.card-container {
    width: 300px;
    height: 300px;
    position: relative;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    font-family: "Anuphan";
}

.card {
    width: 100%;
    height: 100%;
    border-radius: inherit;
}

.card .front-content {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.card .front-content p {
    font-size: 32px;
    font-weight: 700;
    opacity: 1;
    background: linear-gradient(-45deg, #000000 0%, #000000 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.card .content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 10px;
    background: linear-gradient(-45deg, #000000 0%, #000000 100%);
    color: #e8e8e8;
    padding: 20px;
    line-height: 1.5;
    border-radius: 5px;
    /* pointer-events: none; */
    transform: translateX(-96%);
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.card .content .heading {
    font-size: 32px;
    font-weight: 700;
}

.card:hover .content {
    transform: translateY(0);
}

.card:hover .front-content {
    transform: translateX(-30%);
}

.card:hover .front-content p {
    opacity: 0;
}
</style>
