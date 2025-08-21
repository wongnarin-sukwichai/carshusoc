<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="cog"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">
                แก้ไขเนื้อหา
            </span>
        </div>

        <div class="grid grid-cols-3 gap-2">
            <!-- MNain 1 -->
            <div
                class="border-2 border-dashed rounded-xl p-8 h-64 flex items-center justify-center"
            >
                <span class="text-3xl font-semibold">{{ data.title }}</span>
            </div>

            <!-- Main 2 -->
            <div class="col-span-2">
                <div
                    class="grid grid-cols-4 gap-4 border-2 border-dashed rounded-xl p-5"
                >
                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.title") }} :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.title"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.type") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.event_id"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.event_id }}</span
                                ></transition
                            ></label
                        >

                        <div class="relative block w-full text-left mt-2">
                            <div>
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showEvent()"
                                >
                                    <span v-if="data.event_id === ''"
                                        >เลือก</span
                                    >
                                    <span v-else>
                                        {{ setEvent(data.event_id) }}
                                    </span>
                                    <svg
                                        class="-mr-1 size-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        data-slot="icon"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Dropdown List -->
                        <transition name="fade" mode="out-in">
                            <div
                                class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                                v-show="eventShow"
                            >
                                <div
                                    class="py-1 max-h-60 overflow-y-auto"
                                    role="none"
                                >
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(event, index) in eventList"
                                        :key="index"
                                        @click="setEvent(event?.id)"
                                    >
                                        {{ event.title }}
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                    <!-- End Dropdown -->
                </div>

                <!-- Layout 2 -->
                <div class="my-2">
                    <span class="text-[#85c1e9] text-lg font-bold">
                        : กิจกรรม
                    </span>
                </div>
                <transition name="fade" mode="out-in">
                    <div
                        class="grid grid-cols-2 gap-2 border-2 border-dashed rounded-xl p-5"
                        v-if="
                            data.event_id &&
                            (data.event_id === 1 || data.event_id === 2)
                        "
                    >
                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >วันเริ่มกิจกรรม :
                            </label>
                            <div class="mt-2">
                                <Datepicker
                                    v-model="data.start"
                                    class="w-full text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >วันสิ้นสุด :
                            </label>
                            <div class="mt-2">
                                <Datepicker
                                    v-model="data.end"
                                    class="w-full text-sm"
                                />
                            </div>
                        </div>
                    </div>
                </transition>

                <!-- Layout 3 -->
                <div class="my-2">
                    <span class="text-[#85c1e9] text-lg font-bold">
                        : นัดหมาย
                    </span>
                </div>
                <transition name="fade" mode="out-in">
                    <div
                        class="grid grid-cols-4 gap-2 border-2 border-dashed rounded-xl p-5"
                        v-if="
                            data.event_id &&
                            (data.event_id === 1 || data.event_id === 2)
                        "
                    >
                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >วันที่สอบ/อบรม :
                            </label>
                            <div class="mt-2">
                                <Datepicker
                                    v-model="data.examdate"
                                    class="w-full text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >เวลาสอบ/อบรม :
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                >
                                    <input
                                        type="text"
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                        v-model="data.examtime"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label
                                for="username"
                                class="block text-md font-medium text-gray-900"
                                >สถานที่สอบ/อบรม :
                            </label>
                            <div class="mt-2">
                                <textarea
                                    rows=""
                                    class="block w-full rounded-md bg-white px-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                                    v-model="data.meet"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </transition>

                <!-- Layout 4 -->
                <div class="grid grid-cols-2 gap-2 my-2">
                    <div >
                        <span class="text-[#85c1e9] text-lg font-bold">
                            : ค่าบริการ
                        </span>
                        <box-icon
                            name="info-circle"
                            color="oklch(80.8% 0.114 19.571)"
                            class="items-center justify-center ml-1 cursor-pointer hover:scale-115"
                            @click="showInfo()"
                        ></box-icon>
                        <div
                            class="grid grid-cols-2 gap-2 border-2 border-dashed rounded-xl p-5"
                        >
                            <div>
                                <label
                                    for="username"
                                    class="block text-md font-medium text-gray-900"
                                    >ค่าบริการ :
                                </label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                    >
                                        <input
                                            type="number"
                                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                            v-model="data.price"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label
                                    for="username"
                                    class="block text-md font-medium text-gray-900"
                                    >ค่าไปรษณีย์ :
                                </label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                                    >
                                        <input
                                            type="number"
                                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                            v-model="data.postage"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="text-[#85c1e9] text-lg font-bold">
                            : อื่นๆ
                        </span>
                        <div
                            class="col-span-2 border-2 border-dashed rounded-xl p-3.5"
                        >
                            <div>อื่นๆ :</div>
                            <div class="mt-2">
                                <textarea
                                    rows=""
                                    class="block w-full rounded-md bg-white px-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                                    v-model="other"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-2 rounded-xl bg-amber-300 border-amber-400 hover:bg-amber-400"
                    @click="sendData()"
                >
                    <box-icon name="cog" class="mr-2"></box-icon>
                    แก้ไขข้อมูล
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Info -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalInfo">
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
                                class="border-2 border-dashed rounded-xl p-3.5"
                            >
                                <span class="text-[#85c1e9] text-lg font-bold">
                                    : เงื่อนไข
                                </span>
                                <ul class="list-disc ml-4 mt-2">
                                    <li>
                                        ตั้งราคาที่ตรงนี้เมื่อไม่มีหมวดหมู่ย่อย
                                    </li>
                                    <li>
                                        หากมีหมวดหมู่ย่อย
                                        เพราะระบบจะอ้างอิงราคาจากหมวดหมู่ย่อยก่อนเสมอ
                                    </li>
                                    <li>
                                        ไม่ต้องใส่ราคา
                                        หากเป็นราคาที่เจ้าหน้าที่ต้องดำเนินการประเมินก่อน
                                        (ให้ไปแก้ไขที่รายการลงทะเบียนแต่ละรายการแทน)
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                        >
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-red-300 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-red-400 sm:ml-3 sm:w-auto"
                                @click="showInfo()"
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
import Datepicker from "vuejs3-datepicker";
import Swal from "sweetalert2";

export default {
    mounted() {
        this.getEvent();
        this.getSection();
    },
    data() {
        return {
            ////////////////////////////////////////////////////////////////
            eventList: [],
            ////////////////////////////////////////////////////////////////
            eventShow: false,
            ////////////////////////////////////////////////////////////////
            data: {
                content_id: "",
                event_id: "",
                title: "",
                start: "",
                end: "",
                examdate: "",
                examtime: "",
                meet: "",
                price: "",
                postage: "",
                other: "",
            },
            ////////////////////////////////////////////////////////////////
            errors: {
                title: "",
                event_id: "",
            },
            modalInfo: false,
        };
    },
    methods: {
        getEvent() {
            axios.get("/api/event").then((response) => {
                this.eventList = response.data;
            });
        },
        getSection() {
            axios
                .get("/api/section/" + this.$route.params.id + "/edit")
                .then((response) => {
                    console.log(response.data);
                    this.sectionList = response.data;

                    for (let key in this.data) {
                        if (this.sectionList.hasOwnProperty(key)) {
                            this.data[key] = this.sectionList[key] ?? "";
                        }
                    }
                });
        },
        ////////////////////////////////////////////////////////////////
        setEvent(id) {
            this.eventShow = false;

            this.data.event_id = id;

            if (id != null) {
                const arr = Array.from(this.eventList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }

            return null;
        },
        ////////////////////////////////////////////////////////////////
        showEvent() {
            this.eventShow = !this.eventShow;
        },
        ////////////////////////////////////////////////////////////////
        async sendData() {
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
                    try {
                        if (!this.validateData()) {
                            // SweetAlert Error
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Check required fields please.",
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
                            return;
                        } else {
                            await axios
                                .put(
                                    "/api/section/" + this.$route.params.id,
                                    this.data
                                )
                                .then((response) => {
                                    Swal.fire({
                                        title: response.data.message,
                                        icon: "success",
                                        draggable: true,
                                        customClass: {
                                            popup: "rounded-xl shadow-lg bg-white font-poppins",
                                            title: "text-2xl text-gray-800",
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
                                    this.$router.push("/content");
                                });
                        }
                    } catch (err) {
                        throw err;
                    }
                }
            });
        },
        validateData() {
            let isValid = true;

            const req = ["event_id"];

            for (let key of req) {
                const value = this.data[key];

                if (
                    value === null ||
                    value === undefined ||
                    value.toString().trim() === ""
                ) {
                    this.errors[key] = "** Required field.";
                    isValid = false;
                } else {
                    this.errors[key] = ""; // เคลียร์ข้อความถ้ามีค่า
                }
            }

            return isValid;
        },
        showInfo() {
            this.modalInfo = !this.modalInfo;
        },
    },
    components: {
        Datepicker,
    },
};
</script>
