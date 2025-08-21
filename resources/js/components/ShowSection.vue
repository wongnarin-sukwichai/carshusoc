<template>
    <div class="bg-white p-4 rounded-2xl">
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

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            <div
                class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center overflow-hidden"
                v-for="(section, index) in sectionList"
                :key="index"
            >
                <div
                    class="absolute inset-0 flex items-center justify-center pointer-events-none select-none text-[58px] font-bold text-red-400 rotate-[-20deg]"
                    v-if="moment(section.end).format('YYYY-MM-DD') < today"
                >
                    EXPIRED
                </div>

                <div
                    class="card-container"
                    :class="{
                        'opacity-5':
                            moment(section.end).format('YYYY-MM-DD') < today,
                    }"
                >
                    <div class="card">
                         <div
                            class="front-content"
                            :class="{
                                'text-md': section.title.length > 20,
                                'text-2xl':
                                    section.title.length > 10 &&
                                    section.title.length <= 20,
                                'text-3xl': section.title.length <= 10,
                            }"
                        >
                            <p>{{ section.title }}</p>
                        </div>
                        <div class="content">
                             <p class="heading border-b-1 border-dashed">
                                รายละเอียด
                            </p>
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

                            <button
                                v-if="
                                    moment(section.end).format('YYYY-MM-DD') >=
                                    today
                                "
                                class="bg-white p-2 rounded-full w-2/4 mt-2 text-gray-900 hover:scale-105 hover:border-2 hover:border-sky-600 hover:text-sky-600"
                                @click="chkCourse(section.id, section.course)"
                            >
                                ลงทะเบียน
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <div class="bg-white p-4 rounded-2xl mt-4">
                            <div
                                class="font-semibold text-xl text-gray-400 mb-2"
                            >** กรุณาเลือกบริการ</div>
                            <div
                                class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-sky-400 hover:border-3 p-4 group mb-2"
                                v-for="(course, index) in courseList"
                                :key="index"
                                @click="sendData(course.price, course.postage)"
                            >
                                <span
                                    class="font-semibold text-lg text-[#85c1e9]"
                                    >{{ course.title }} :
                                </span>
                                <div
                                    class="border-1 border-dashed w-2/3 my-3"
                                ></div>
                                <div class="text-md">
                                    <span class="font-semibold pr-2"
                                        >ค่าบริการ :</span
                                    >
                                    {{ Number(course.price).toLocaleString() }}
                                </div>
                                <div
                                    class="text-md mt-2"
                                    v-if="course.postage !== null"
                                >
                                    <span class="font-semibold pr-2"
                                        >ค่าไปรษณีย์ :</span
                                    >
                                    {{ course.postage }}
                                </div>
                                <div
                                    class="text-md mt-2"
                                    v-if="course.other !== null"
                                >
                                    <span class="font-semibold pr-2"
                                        >หมายเหตุ : </span
                                    >{{ course.other }}
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-2 sm:flex sm:flex-row-reverse sm:px-6"
                        >
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-red-300 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-red-400 sm:ml-3 sm:w-auto"
                                @click="close()"
                            >
                                Close
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
            moment: moment,
            today: moment().format("YYYY-MM-DD"),
            sectionList: [],
            courseList: [],
            modalCourse: false,
            data: {
                content_id: this.$route.params.id,
                section_id: "",
                price: "",
                postage: "",
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
        chkCourse(id, code) {
            this.data.section_id = id;

            if (code == null) {
                const arr = Array.from(this.sectionList);
                const res = arr.find((selection) => selection.id == id);

                this.sendData(res.price, res.postage);
            } else {
                axios.get("/api/course/" + id).then((response) => {
                    this.courseList = response.data;
                });

                this.modalCourse = true;
            }
        },
        close() {
            this.modalCourse = false;
        },
        sendData(id, code) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm to Register",
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
                    if (this.user.status === null) {
                        Swal.fire({
                            title: "Warning",
                            text: "Please complete your personal information.",
                            icon: "warning",
                            customClass: {
                                popup: "rounded-xl shadow-lg bg-white font-poppins",
                                title: "text-2xl font-bold text-gray-800",
                                confirmButton:
                                    "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                            },
                            didOpen: () => {
                                Swal.getPopup().style.fontFamily =
                                    "Poppins, sans-serif";
                            },
                        });
                        this.$router.push("/profile");
                    } else {

                        this.data.price = id;
                        this.data.postage = code;

                        axios
                            .post("/api/enroll", this.data)
                            .then((response) => {
                                Swal.fire({
                                    title: "Success!!",
                                    icon: "success",
                                    draggable: true,
                                    customClass: {
                                        popup: "rounded-xl shadow-lg bg-white font-poppins",
                                        title: "text-2xl font-bold text-gray-800",
                                        htmlContainer:
                                            "text-base text-gray-600",
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
                                this.data.section_id = "";
                                this.$router.push("/showEnroll");
                            });
                    }
                }
            });
        },
    },
    computed: {
        user() {
            return this.$store.getters.user;
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
    padding: 8%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.card .front-content p {
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
