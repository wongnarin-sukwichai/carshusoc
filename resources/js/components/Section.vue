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
                                    {{ Number(section.price).toLocaleString() }}
                                    บาท
                                </p>
                                <p v-if="section.postage">
                                    <span class="font-semibold"
                                        >ค่าไปรษณีย์ :</span
                                    >
                                    {{ section.postage }} บาท
                                </p>
                            </div>

                            <div class="flex">
                                <button
                                    class="bg-white p-2 rounded-full mt-2 text-gray-900 border-2 hover:border-2 hover:border-amber-400"
                                    @click="editSection(section.id)"
                                >
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <box-icon
                                            name="cog"
                                            size="sm"
                                            color="oklch(82.8% 0.189 84.429)"
                                            class="hover:scale-115"
                                        ></box-icon>
                                    </div>
                                </button>

                                <button
                                    class="bg-white p-2 rounded-full mt-2 text-gray-900 border-2 hover:border-2 hover:border-lime-400 ml-2"
                                    @click="showCourse(section_id)"
                                >
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <box-icon
                                            name="plus"
                                            size="sm"
                                            color="oklch(64.8% 0.2 131.684)"
                                            class="hover:scale-115"
                                        ></box-icon>
                                    </div>
                                </button>
                            </div>
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

    <!-- Show Course -->
    <transition name="fade" mode="out-in" v-show="this.courseShow">
        <div class="bg-white p-4 rounded-2xl md:ml-8 mt-4">
            <div class="grid grid-cols-5 gap-4">
                <div
                    class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center"
                >
                    555
                </div>

                <!-- plus -->
                <div
                    class="border-2 border-dashed rounded-xl hover:border-sky-400"
                    @click="addCourse()"
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
    </transition>

    <!-- Modal Add Course -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalCourse">
            <div
                class="fixed inset-0 bg-gray-500/50 bg-opacity-90 transition-opacity"
            ></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div
                                class="border-2 border-dashed rounded-xl p-3.5 mb-2"
                            >
                                <span class="text-[#85c1e9] text-lg font-bold">
                                    : ชื่อเรื่อง
                                </span>
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                >
                                    <input
                                        type="text"
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- ค่าบริการ -->
                                <div
                                    class="border-2 border-dashed rounded-xl p-3.5 mb-2"
                                >
                                    <label
                                        class="block text-[#85c1e9] text-lg font-bold mb-1"
                                        for="service"
                                    >
                                        ค่าบริการ :
                                    </label>
                                    <input
                                        id="service"
                                        type="number"
                                        class="block w-full py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md border border-gray-300 rounded-md"
                                    />
                                </div>

                                <!-- ค่าไปรษณีย์ -->
                                <div
                                    class="border-2 border-dashed rounded-xl p-3.5 mb-2"
                                >
                                    <label
                                        class="block text-[#85c1e9] text-lg font-bold mb-1"
                                        for="postage"
                                    >
                                        ค่าไปรษณีย์ :
                                    </label>
                                    <input
                                        id="postage"
                                        type="number"
                                        class="block w-full py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md border border-gray-300 rounded-md"
                                    />
                                </div>
                            </div>
                            <div
                                class="border-2 border-dashed rounded-xl p-3.5"
                            >
                                <span class="text-[#85c1e9] text-lg font-bold">
                                    : อื่นๆ
                                </span>
                                <div class="mt-2">
                                    <textarea
                                        rows=""
                                        class="block w-full rounded-md bg-white px-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                                        v-model="other"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                        >
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-green-400 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-green-500 sm:ml-3 sm:w-auto"
                                @click="sendData()"
                            >
                                บันทึก
                            </button>
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-red-400 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto"
                                @click="close()"
                            >
                                ปิด
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import axios from "axios";
import "boxicons";
import moment from "moment";
import Swal from "sweetalert2";

export default {
    mounted() {
        this.getSection();
    },
    data() {
        return {
            sectionList: [],
            courseList: [],
            courseShow: false,
            modalCourse: false,
            data: {
                section_id: "",
                title: "",
                price: "",
                postage: "",
                other: "",
            },
        };
    },
    methods: {
        getSection() {
            axios
                .get("/api/section/" + this.$route.params.id)
                .then((response) => {
                    this.sectionList = response.data;
                });
        },
        addSection() {
            this.$router.push("/addSection/" + this.$route.params.id);
        },
        setMoment(id) {
            return moment(id).format("L");
        },
        editSection(id) {
            this.$router.push("/editSection/" + id);
        },
        showCourse(id) {
            this.data.section_id = id;
            axios.get("/api/course/" + id).then((response) => {
                this.courseList = response.data;
            });
            this.courseShow = true;
        },
        addCourse() {
            this.modalCourse = true;
        },
        close() {
            this.modalCourse = false;
        },
        sendData() {
            // SweetAlert Confirm
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                customClass: {
                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                    title: "text-2xl font-bold text-gray-800",
                    htmlContainer: "text-base text-gray-600",
                    confirmButton:
                        "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                    cancelButton:
                        "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                },
                didOpen: () => {
                    Swal.getPopup().style.fontFamily = "Poppins, sans-serif";
                },
            }).then(async (result) => {
                if (result.isConfirmed) {
                    axios.post("/api/course", this.data).then((response) => {
                        Swal.fire({
                            title: response.data.message,
                            icon: "success",
                            draggable: true,
                            customClass: {
                                popup: "rounded-xl shadow-lg bg-white font-poppins",
                                title: "text-2xl text-gray-800",
                                htmlContainer: "text-base text-gray-600",
                                confirmButton:
                                    "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                                cancelButton:
                                    "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                            },
                            didOpen: () => {
                                Swal.getPopup().style.fontFamily =
                                    "Poppins, sans-serif";
                            },
                        });
                        this.showCourse();
                    });
                }
            });
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
    background: linear-gradient(
        -45deg,
        oklch(27.9% 0.041 260.031) 0%,
        oklch(27.9% 0.041 260.031) 100%
    );
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
    background: linear-gradient(
        -45deg,
        oklch(27.9% 0.041 260.031) 0%,
        oklch(27.9% 0.041 260.031) 100%
    );
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
