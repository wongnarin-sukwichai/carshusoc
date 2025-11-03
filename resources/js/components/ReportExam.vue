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
                <div
                    class="flex items-center text-[#85c1e9] text-xl font-bold mb-6"
                >
                    <box-icon
                        name="certification"
                        class="mr-2"
                        color="#85c1e9"
                    ></box-icon>
                    จัดการสิทธิ์การรับใบ Certificate (สอบ)
                </div>

                <div class="grid grid-cols-5 text-sm px-4">
                    <div class="flex flex-col items-start gap-2">
                        <input
                            type="file"
                            ref="fileInput"
                            @change="handleFile"
                            class="block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        />
                    </div>

                    <div
                        class="text-sm mr-4 flex items-center justify-center border-2 border-dashed p-2 w-30 rounded-xl bg-green-200 border-green-400 hover:bg-green-300 cursor-pointer"
                        @click="importScore()"
                    >
                        <box-icon
                            name="import"
                            class="mr-2"
                            color="oklch(72.3% 0.219 149.579)"
                        ></box-icon>
                        นำเข้าข้อมูล
                    </div>

                    <span
                        >สมัครสอบระหว่างวันที่ :
                        <transition name="fade" mode="out-in">
                            <span
                                v-if="errors.examdate"
                                class="text-rose-300 text-sm ml-2"
                                >{{ errors.examdate }}</span
                            ></transition
                        >
                        <div class="font-semibold">
                            {{ moment(data.start).format("LL") }} -
                            {{ moment(data.end).format("LL") }}
                        </div></span
                    >
                    <span
                        >ห้องสอบ :
                        <transition name="fade" mode="out-in">
                            <span
                                v-if="errors.meet"
                                class="text-rose-300 text-sm ml-2"
                                >{{ meet }}</span
                            ></transition
                        >
                        <div class="font-semibold">
                            {{ meet }}
                        </div></span
                    >
                    <span class="text-sm"
                        >สอบวันที่ :
                        <Datepicker class="ml-2" v-model="this.send" />
                        <transition name="fade" mode="out-in">
                            <span
                                v-if="errors.send"
                                class="text-rose-300 text-sm ml-2"
                                >{{ errors.send }}</span
                            ></transition
                        >
                    </span>
                </div>

                <!----------------------------------- Table ------------------------------------------------------->

                <div
                    class="border-2 border-gray-200 text-lg p-4 rounded-xl mt-4"
                >
                    <div class="grid grid-cols-4 grap-4 text-sm">
                        <div
                            v-for="enroll in enrollList"
                            :key="enroll.id"
                            class="flex items-center justify-between px-3 py-2 border-b border-gray-200"
                        >
                            <span>{{ enroll.name }} {{ enroll.surname }}</span>
                            <div class="relative group inline-block">
                                <span
                                    class="text-sm font-semibold text-blue-800 bg-blue-100 px-3 py-1 rounded-full cursor-pointer"
                                >
                                    {{ enroll.listen }}
                                </span>
                                <div
                                    class="absolute bottom-full left-1/2 -translate-x-1/2 mb-3 hidden group-hover:block bg-gray-600 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap shadow-lg z-10"
                                >
                                    Listening
                                </div>
                            </div>
                             <div class="relative group inline-block">
                                <span
                                    class="text-sm font-semibold text-blue-800 bg-blue-100 px-3 py-1 rounded-full cursor-pointer"
                                >
                                    {{ enroll.reading }}
                                </span>
                                <div
                                    class="absolute bottom-full left-1/2 -translate-x-1/2 mb-3 hidden group-hover:block bg-gray-600 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap shadow-lg z-10"
                                >
                                    Reading
                                </div>
                            </div>
                            <div class="relative group inline-block">
                                <span
                                    class="text-sm font-semibold text-blue-800 bg-blue-100 px-3 py-1 rounded-full cursor-pointer"
                                >
                                    {{ enroll.conver }}
                                </span>
                                <div
                                    class="absolute bottom-full left-1/2 -translate-x-1/2 mb-3 hidden group-hover:block bg-gray-600 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap shadow-lg z-10"
                                >
                                    Conversations
                                </div>
                            </div>
                            <div class="relative group inline-block">
                                <span
                                    class="text-sm font-semibold text-blue-800 bg-blue-100 px-3 py-1 rounded-full cursor-pointer"
                                >
                                    {{ enroll.grammar }}
                                </span>
                                <div
                                    class="absolute bottom-full left-1/2 -translate-x-1/2 mb-3 hidden group-hover:block bg-gray-600 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap shadow-lg z-10"
                                >
                                    Grammar
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <div
                        class="text-sm flex items-center justify-center border-2 border-dashed p-2 w-1/12 mt-2 rounded-xl bg-amber-200 border-amber-400 hover:bg-amber-300 cursor-pointer"
                        @click="sendata()"
                    >
                        <box-icon
                            name="save"
                            class="mr-2"
                            color="oklch(82.8% 0.189 84.429)"
                        ></box-icon>
                        บันทึก
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
import * as XLSX from "xlsx";

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
            examdate: "",
            send: "",
            meet: "",
            data: {
                section_id: "",
                start: "",
                end: "",
            },
            errors: {
                section_id: "",
                start: "",
                end: "",
                meet: "",
                send: "",
            },
            fileData: null,
        };
    },
    methods: {
        getSection() {
            axios.get("/api/sectionTest").then((response) => {
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
                this.examdate = res.examdate;
                this.meet = res.meet;
                return res ? res.title : null;
            }

            return null;
        },
        ////////////////////////////////////////////////////////////////
        showEvent() {
            this.sectionShow = !this.sectionShow;
        },
        ////////////////////////////////////////////////////////////////
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
        validateChk() {
            let isValid = true;

            const req = ["examdate", "meet", "send"];

            for (let key of req) {
                const value = this[key];

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
                        .post("/api/reportSearchTest", this.data)
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
            const confirm = await Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm the changes?",
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
            });

            // หากกดปุ่มยืนยัน
            if (confirm.isConfirmed) {
                try {
                    if (!this.validateChk()) {
                        await Swal.fire({
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
                    }

                    // แสดง Loading ระหว่างส่งข้อมูล
                    Swal.fire({
                        title: "Processing...",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => Swal.showLoading(),
                        customClass: {
                            popup: "rounded-xl shadow-lg bg-white font-poppins",
                            title: "text-2xl font-bold text-gray-800",
                        },
                    });

                    await axios.post("/api/reportTest", {
                        section_id: this.data.section_id,
                        examdate: this.examdate,
                        send: this.send,

                        enrolls: this.enrollList,
                    });

                    Swal.close();

                    await Swal.fire({
                        title: "Success!!",
                        text: "บันทึกสำเร็จ",
                        icon: "success",
                        customClass: {
                            popup: "rounded-xl shadow-lg bg-white font-poppins",
                            title: "text-2xl font-bold text-gray-800",
                            htmlContainer: "text-base text-gray-600",
                            confirmButton:
                                "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                        },
                        didOpen: () => {
                            Swal.getPopup().style.fontFamily =
                                "Anuphan, sans-serif";
                        },
                    });
                } catch (err) {
                    Swal.close();
                    Swal.fire({
                        title: "Error!",
                        text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง",
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
            }
        },
        handleFile(event) {
            this.fileData = event.target.files[0];
        },
        importScore() {
            if (!this.fileData) {
                alert("กรุณาเลือกไฟล์ก่อน!");
                return;
            }

            const reader = new FileReader();

            reader.onload = (e) => {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: "array" });
                const sheetName = workbook.SheetNames[0];
                const worksheet = workbook.Sheets[sheetName];

                // แปลงเป็น Array ของแถว
                const excelData = XLSX.utils.sheet_to_json(worksheet, {
                    header: 1,
                });

                // ลูปข้อมูล (ข้ามหัวตาราง)
                let updatedCount = 0;
                for (let i = 1; i < excelData.length; i++) {
                    const row = excelData[i];
                    const id = row[0]; // คอลัมน์ A
                    const listen = row[1]; // คอลัมน์ R
                    const reading = row[2]; // คอลัมน์ R
                    const conver = row[3]; // คอลัมน์ R
                    const grammar = row[4]; // คอลัมน์ R

                    // console.log("Row data:", row);

                    const found = this.enrollList.find((e) => e.id === id);
                    if (found) {
                        found.listen = listen;
                        found.reading = reading;
                        found.conver = conver;
                        found.grammar= grammar;
                        updatedCount++;
                    }
                }

                Swal.fire({
                    title: "Success!!",
                    text: "นำเข้าคะแนนสำเร็จ " + updatedCount + " รายการ",
                    icon: "success",
                    customClass: {
                        popup: "rounded-xl shadow-lg bg-white font-poppins",
                        title: "text-2xl font-bold text-gray-800",
                        htmlContainer: "text-base text-gray-600",
                        confirmButton:
                            "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                    },
                    didOpen: () => {
                        Swal.getPopup().style.fontFamily =
                            "Anuphan, sans-serif";
                    },
                });
            };

            reader.readAsArrayBuffer(this.fileData);
        },
    },
    components: {
        Datepicker,
    },
};
</script>
