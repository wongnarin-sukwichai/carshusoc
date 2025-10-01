<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="spreadsheet"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("home.list")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl"
        >
            <div class="flex flex-col">
                <div class="w-full align-middle">
                    <!-- Search-->
                    <div
                        class="flex gap-4 text-gray-500 focus-within:text-gray-900 pt-4 items-center justify-center"
                    >
                        <div class="flex flex-col relative w-48">
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.start"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.start }}</span
                                ></transition
                            >
                            <Datepicker
                                v-model="data.start"
                                class="w-full text-sm"
                            />
                        </div>
                        <div class="flex flex-col relative w-48">
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.end"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.end }}</span
                                ></transition
                            >
                            <Datepicker
                                v-model="data.end"
                                class="w-full text-sm"
                            />
                        </div>
                        <div class="flex flex-col relative w-48">
                            <div class="relative block w-48 text-left">
                                <transition name="fade" mode="out-in">
                                    <span
                                        v-if="errors.section_id"
                                        class="text-rose-300 text-sm"
                                        >{{ errors.section_id }}</span
                                    ></transition
                                >
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showEvent()"
                                >
                                    <span v-if="data.section_id === ''"
                                        >เลือก</span
                                    >
                                    <span v-else>
                                        {{ setEvent(data.section_id) }}
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
                            <!-- Dropdown List -->
                            <transition name="fade" mode="out-in">
                                <div
                                    class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="menu-button"
                                    tabindex="-1"
                                    v-show="sectionShow"
                                >
                                    <div
                                        class="py-1 max-h-60 overflow-y-auto"
                                        role="none"
                                    >
                                        <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                        <div
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                            v-for="(
                                                section, index
                                            ) in sectionList"
                                            :key="index"
                                            @click="setEvent(section?.id)"
                                        >
                                            {{ section.title }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <!-- End Search-->
                </div>
            </div>

            <hr
                class="mx-auto items-center justify-center my-4 w-2/6 border-2 border-gray-100 border-dashed"
            />

            <div class="flex items-center justify-center">
                <div
                    class="text-sm mr-4 flex items-center justify-center border-2 border-dashed p-2 w-1/8 rounded-xl bg-green-200 border-green-400 hover:bg-green-300 cursor-pointer"
                    @click="report()"
                >
                    <box-icon
                        name="file"
                        class="mr-2"
                        color="oklch(72.3% 0.219 149.579)"
                    ></box-icon>
                    Export to Excel
                </div>
                <div
                    class="text-sm flex items-center justify-center border-2 border-dashed p-2 w-1/8 rounded-xl bg-sky-200 border-sky-400 hover:bg-sky-300 cursor-pointer"
                    @click="search()"
                >
                    <box-icon
                        name="search"
                        class="mr-2"
                        color="oklch(70.7% 0.165 254.624)"
                    ></box-icon>
                    ค้นหา
                </div>
            </div>
        </div>

        <!----------------------------------- Layout 2 ------------------------------------------------------->

        <transition name="fade" mode="out-in">
            <div
                class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mt-2"
                v-show="showEnroll"
            >
                <div class="grid grid-cols-3 text-sm px-4">
                    <div class="flex flex-col gap-2">
                        <!-- เลขบัตรประชาชน -->
                        <label
                            class="inline-flex items-center gap-x-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                name="gender"
                                :value="1"
                                class="text-blue-600 focus:ring-blue-500 border-gray-300 cursor-pointer"
                            />
                            <span class="text-gray-700">เลือกทั้งหมด</span>
                        </label>

                        <!-- เลขหนังสือเดินทาง-->
                        <label
                            class="inline-flex items-center gap-x-2 cursor-pointer"
                        >
                            <input
                                type="radio"
                                name="gender"
                                :value="2"
                                class="text-pink-500 focus:ring-pink-400 border-gray-300 cursor-pointer"
                            />
                            <span class="text-gray-700">ไม่เลือกทั้งหมด</span>
                        </label>
                    </div>

                    <span
                        >วันสอบในวันที่ :
                        <div class="font-semibold">
                            {{ moment(data.examdate).format("LL") }}
                        </div></span
                    >
                    <span class="text-sm"
                        >ให้ไว้ ณ วันที่ :
                        <Datepicker class="ml-2" />
                    </span>

                    <!-- <div
                    class="text-sm flex items-center justify-center border-2 border-dashed p-2 w-1/8 rounded-xl bg-amber-200 border-amber-400 hover:bg-amber-300 cursor-pointer"
                >
                    <box-icon
                        name="plus-circle"
                        class="mr-2"
                        color="oklch(82.8% 0.189 84.429)"
                    ></box-icon>
                    บันทึก
                </div> -->
                </div>

                <!----------------------------------- Table ------------------------------------------------------->

                <div
                    class="border-2 border-gray-200 text-lg p-4 rounded-xl mt-4"
                >
                    <div class="grid grid-cols-6 grap-4 text-sm">
                        <div v-for="(enroll, index) in enrollList" :key="index">
                            {{ enroll.name }} {{ enroll.surname }}
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>

    <!----------------------------------- MODAL ------------------------------------------------------->
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import Datepicker from "vuejs3-datepicker";
import moment from "moment";
import "moment/dist/locale/th";
moment.locale("th");

export default {
    async mounted() {
        this.getSection();
    },
    data() {
        return {
            ////////////////////////////////////////////////////////////////
            sectionList: [],
            enrollList: [],
            ////////////////////////////////////////////////////////////////
            sectionShow: false,
            showEnroll: false,
            moment: moment,
            ////////////////////////////////////////////////////////////////
            data: {
                start: "",
                end: "",
                section_id: "",
                examdate: "",
            },
            errors: {
                start: "",
                end: "",
                section_id: "",
            },
        };
    },
    methods: {
        getSection() {
            axios.get("/api/section").then((response) => {
                this.sectionList = response.data;
            });
        },
        ////////////////////////////////////////////////////////////////
        setEvent(id) {
            this.sectionShow = false;

            this.data.section_id = id;

            if (id != null) {
                const arr = Array.from(this.sectionList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                this.data.start = res.start;
                this.data.end = res.end;
                this.data.examdate = res.examdate;
                return res ? res.title : null;
            }

            return null;
        },
        ////////////////////////////////////////////////////////////////
        showEvent() {
            this.sectionShow = !this.sectionShow;
        },
        validateData() {
            let isValid = true;

            const req = ["start", "end", "section_id"];

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
        async report() {
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
                    const res = await axios.post("/api/export", this.data, {
                        responseType: "blob",
                    });

                    const contentType = res.headers["content-type"];

                    // ถ้า response เป็น JSON (กรณีไม่พบข้อมูล)
                    if (
                        contentType &&
                        contentType.includes("application/json")
                    ) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            const result = JSON.parse(reader.result);
                            Swal.fire({
                                title: "Error!",
                                text: "ไม่พบข้อมูล ในช่วงเวลาดังกล่าว",
                                icon: "warning",
                                customClass: {
                                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                                    title: "text-2xl font-bold text-gray-800",
                                    confirmButton:
                                        "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                                },
                                didOpen: () => {
                                    Swal.getPopup().style.fontFamily =
                                        "Anuphan, sans-serif";
                                },
                            });
                        };
                        reader.readAsText(res.data);
                        return; // ⛔ หยุด ไม่ต้องดาวน์โหลด
                    }

                    // ถ้าเป็น Excel → ดาวน์โหลด
                    const blob = new Blob([res.data], {
                        type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                    });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement("a");
                    a.href = url;
                    a.download = `Report_${new Date()
                        .toISOString()
                        .slice(0, 10)}.xlsx`;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);

                    Swal.fire({
                        title: "Success!!",
                        text: "สำเร็จ! กรุณาตรวจสอบที่ไฟล์ดาวน์โหลดบนเครื่องของท่าน",
                        icon: "success",
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
                            Swal.getPopup().style.fontFamily =
                                "Anuphan, sans-serif";
                        },
                    });
                }
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: "ไม่สามารถดาวน์โหลด กรุณาลองใหม่อีกครั้ง",
                    icon: "error",
                    customClass: {
                        popup: "rounded-xl shadow-lg bg-white font-poppins",
                        title: "text-2xl font-bold text-gray-800",
                        confirmButton:
                            "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                    },
                    didOpen: () => {
                        Swal.getPopup().style.fontFamily =
                            "Anuphan, sans-serif";
                    },
                });
            }
        },
        async search() {
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
                    axios
                        .post("/api/reportSearch", this.data)
                        .then((response) => {
                            if (!response.data || response.data.length === 0) {
                                this.showEnroll = false;
                                Swal.fire({
                                    title: "Error!",
                                    text: "ไม่พบข้อมูล",
                                    icon: "error",
                                    customClass: {
                                        popup: "rounded-xl shadow-lg bg-white font-poppins",
                                        title: "text-2xl font-bold text-gray-800",
                                        confirmButton:
                                            "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                                    },
                                    didOpen: () => {
                                        Swal.getPopup().style.fontFamily =
                                            "Anuphan, sans-serif";
                                    },
                                });
                            } else {
                                this.showEnroll = true;
                                this.enrollList = response.data;
                            }
                        });
                }
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: "ไม่สามารถดึงข้อมูลได้ กรุณาติดต่อเจ้าหน้าที่ดูแลระบบ",
                    icon: "error",
                    customClass: {
                        popup: "rounded-xl shadow-lg bg-white font-poppins",
                        title: "text-2xl font-bold text-gray-800",
                        confirmButton:
                            "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                    },
                    didOpen: () => {
                        Swal.getPopup().style.fontFamily =
                            "Anuphan, sans-serif";
                    },
                });
            }
        },
        async sendata() {
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
                    Swal.fire({
                        title: "Success!!",
                        text: "สำเร็จ! กรุณาตรวจสอบที่ไฟล์ดาวน์โหลดบนเครื่องของท่าน",
                        icon: "success",
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
                            Swal.getPopup().style.fontFamily =
                                "Anuphan, sans-serif";
                        },
                    });
                }
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: "ไม่สามารถดาวน์โหลด กรุณาลองใหม่อีกครั้ง",
                    icon: "error",
                    customClass: {
                        popup: "rounded-xl shadow-lg bg-white font-poppins",
                        title: "text-2xl font-bold text-gray-800",
                        confirmButton:
                            "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                    },
                    didOpen: () => {
                        Swal.getPopup().style.fontFamily =
                            "Anuphan, sans-serif";
                    },
                });
            }
        },
    },
    components: {
        Datepicker,
    },
};
</script>
