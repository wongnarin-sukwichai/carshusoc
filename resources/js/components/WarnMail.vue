<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                type="logo"
                name="gmail"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">
                : แจ้งเปลี่ยนแปลงห้องสอบ/ห้องอบรม</span
            >
        </div>

        <div class="grid grid-cols-2 gap-4">
            <!--left -->
            <div
                style="
                    background-color: #ffffff;
                    border-radius: 8px;
                    padding: 30px;
                    max-width: auto;
                    margin: 0 auto;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                "
            >
                <!-- โลโก้ตรงกลาง -->
                <div style="text-align: center">
                    <img
                        src="https://carshusoc.com/img/logo/logo.png"
                        alt="Logo"
                        width="30%"
                        style="display: block; margin: 0 auto"
                    />
                </div>

                <!-- ข้อความต้อนรับ -->
                <h2
                    style="
                        text-align: center;
                        color: #333;
                        margin-top: 0%;
                        font-weight: bold;
                    "
                >
                    แจ้งเปลี่ยนแปลงห้องอบรม
                </h2>
                <br />
                <p style="text-align: left; font-size: 15px; color: #555">
                    เรื่อง แจ้งเปลี่ยนแปลงห้องอบรม
                </p>
                <p style="text-indent: 2em; font-size: 15px; color: #555">
                    ทางศูนย์บริการวิชาการและวิจัย (CARS-HUSOC)
                    คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม
                </p>
                <p style="text-indent: 2em; font-size: 15px; color: #555">
                    ขอแจ้งว่า มีการเปลี่ยนแปลงห้องอบรม
                </p>
                <br />
                 <p style="font-size: 15px; color: #555">
                    หัวข้อ :
                    <span style="font-weight: bold">{{ this.data.title }}</span>
                </p>
                <p style="font-size: 15px; color: #555">
                    จากเดิม :
                    <span style="font-weight: bold">{{ this.data.old }}</span>
                </p>
                <p style="font-size: 15px; color: #555">
                    เปลี่ยนแปลงเป็น :
                    <span style="font-weight: bold">{{ this.data.new }}</span>
                </p>
                <p style="font-size: 15px; color: #555">
                    สถานที่ :
                    <span style="font-weight: bold">{{ this.data.meet }}</span>
                </p>
                <p style="font-size: 15px; color: #555">
                    วันที่ :
                    <span style="font-weight: bold">{{
                        this.data.examdate
                    }}</span>
                </p>
                <p style="font-size: 15px; color: #555">
                    เวลา :
                    <span style="font-weight: bold">{{
                        this.data.examtime
                    }}</span>
                </p>
                <br />
                <p style="text-indent: 2em; font-size: 15px; color: #555">
                    จึงเรียนมาเพื่อโปรดทราบ และขออภัยในความไม่สะดวกมา ณ โอกาสนี้
                </p>
                <br />
                <p style="font-size: 15px; color: #555">
                    ศูนย์บริการวิชาการและวิจัย (CARS-HUSOC)
                </p>
                <p style="font-size: 15px; color: #555">
                    คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม
                </p>

                <br />
                <hr style="border: 2px dashed oklch(92.9% 0.013 255.508)" />

                <!-- ข้อความติดต่อ -->
                <div
                    style="
                        text-align: center;
                        margin-top: 20px;
                        font-size: 13px;
                        color: #777;
                    "
                >
                    <p>
                        หากท่านมีคำถามหรือต้องการสอบถามเพิ่มเติม
                        กรุณาติดต่อเราได้ที่
                    </p>
                </div>
                <div
                    style="
                        text-align: center;
                        margin-bottom: 20px;
                        font-size: 13px;
                        color: #777;
                    "
                >
                    <p>If you have any questions, please contact us at</p>
                </div>

                <div
                    style="
                        text-align: left;
                        margin-top: 20px;
                        font-size: 13px;
                        color: #777;
                    "
                >
                    <ul>
                        <li>
                            <span style="font-weight: bold">Email : </span
                            ><a href="mailto:carhusocmsu@gmail.com"
                                >carhusocmsu@gmail.com</a
                            >
                        </li>
                        <li>
                            <span style="font-weight: bold">Facebook : </span
                            ><a
                                href="https://www.facebook.com/profile.php?id=100074729420796"
                            >
                                https://www.facebook.com/profile.php?id=100074729420796</a
                            >
                        </li>
                        <li>
                            <span style="font-weight: bold">Website : </span
                            ><a href="https://human.msu.ac.th/"
                                >https://human.msu.ac.th/</a
                            >
                        </li>
                        <li>
                            <span style="font-weight: bold">Tel : </span
                            >043-754-369 ต่อ 4734, 4703
                        </li>
                    </ul>
                </div>
            </div>

            <!-- right -->
            <div class="border-2 border-dashed rounded-xl p-4 mb-4 space-y-3">
                <!-- รายการอบรม -->
                <div class="flex items-center space-x-3">
                    <label
                        for="section"
                        class="block w-32 text-md text-gray-900 font-semibold whitespace-nowrap text-right"
                    >
                        รายการอบรม :
                    </label>

                    <div class="relative flex-1">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                            id="menu-button"
                            aria-expanded="true"
                            aria-haspopup="true"
                            @click="showSection()"
                        >
                            <span v-if="data.section_id === null">เลือก</span>
                            <span v-else>{{ setSection(data.section_id) }}</span>
                            <svg
                                class="-mr-1 size-5 text-gray-400"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>

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
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(section, index) in sectionList"
                                        :key="index"
                                        @click="setSection(section.id)"
                                    >
                                        {{ section.title }}
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>

                <!-- จากเดิม -->
                <div class="flex items-center space-x-3">
                    <label
                        for="old"
                        class="block w-32 text-md text-gray-900 font-semibold whitespace-nowrap text-right"
                    >
                        จากเดิม :
                    </label>

                    <input
                        type="text"
                        name="old"
                        id="old"
                        class="flex-1 rounded-md border border-gray-300 bg-white py-2 px-3 text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-md"
                        v-model="data.old"
                    />
                </div>

                <!-- เปลี่ยนแปลงเป็น -->
                <div class="flex items-center space-x-3">
                    <label
                        for="new"
                        class="block w-32 text-md text-gray-900 font-semibold whitespace-nowrap text-right"
                    >
                        เปลี่ยนแปลงเป็น :
                    </label>

                    <input
                        type="text"
                        name="new"
                        id="new"
                        class="flex-1 rounded-md border border-gray-300 bg-white py-2 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-md"
                        v-model="data.new"
                    />
                </div>

                <div class="flex items-center space-x-3">
                    <label
                        for="new"
                        class="block w-32 text-md text-gray-900 font-semibold whitespace-nowrap text-right"
                    >
                        สถานที่ :
                    </label>

                    <input
                        type="text"
                        name="new"
                        id="new"
                        class="flex-1 rounded-md border border-gray-300 bg-white py-2 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-md"
                        v-model="data.meet"
                    />
                </div>

                <div class="flex items-center space-x-3">
                    <label
                        for="new"
                        class="block w-32 text-md text-gray-900 font-semibold whitespace-nowrap text-right"
                    >
                        วันที่ :
                    </label>

                    <input
                        type="text"
                        name="new"
                        id="new"
                        class="flex-1 rounded-md border border-gray-300 bg-white py-2 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-md"
                        v-model="data.examdate"
                    />
                </div>

                <div class="flex items-center space-x-3">
                    <label
                        for="new"
                        class="block w-32 text-md text-gray-900 font-semibold whitespace-nowrap text-right"
                    >
                        เวลา :
                    </label>

                    <input
                        type="text"
                        name="new"
                        id="new"
                        class="flex-1 rounded-md border border-gray-300 bg-white py-2 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-md"
                        v-model="data.examtime"
                    />
                </div>
                <div class="col-span-2 mt-6">
                    <button
                        class="w-full flex border-2 border-dashed p-2 rounded-xl bg-lime-200 border-lime-300 hover:bg-lime-300 justify-center"
                        @click="sendData()"
                    >
                        <box-icon name="mail-send" class="mr-2"></box-icon>
                        ส่งอีเมล
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import boxicons from "boxicons";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";
import Swal from "sweetalert2";
import moment from "moment";

export default {
    mounted() {
        this.getSection();
    },
    data() {
        return {
            sectionList: [],
            sectionShow: false,
            data: {
                section_id: null,
                title: "",
                start: "",
                end: "",
                old: "",
                new: "",
                meet: "",
                examdate: "",
                examtime: "",
            },
            errors: {
                section_id: "",
                title: "",
                start: "",
                end: "",
                old: "",
                new: "",
                meet: "",
                examdate: "",
                examtime: "",
            },
        };
    },
    methods: {
        getSection() {
            axios.get("/api/warnMail/").then((response) => {
                this.sectionList = response.data;
            });
        },
        setSection(id) {
            this.sectionShow = false;
            this.data.section_id = id;
            if (id != null) {
                const arr = Array.from(this.sectionList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);

                if (res) {
                    this.data.title = res.title;
                    this.data.start = res.start;
                    this.data.end = res.end;
                    this.data.meet = res.meet; // ✅ ทำงานแน่นอน
                    this.data.examdate = moment(res.examdate).format("L");
                    this.data.examtime = res.examtime;
                    return res.title;
                }
            }
            return null;
        },
        showSection() {
            this.sectionShow = !this.sectionShow;
        },
        async sendData() {
            const confirm = await Swal.fire({
                title: "Are you sure?",
                text: "Do you want to Send Email?",
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
                    if (!this.validateData()) {
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

                    await axios.post("/api/sendWarnMail", this.data);

                    Swal.close();

                    await Swal.fire({
                        title: "Success!!",
                        text: "ส่งอีเมลสำเร็จ",
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
        validateData() {
            let isValid = true;

            const req = [
                "section_id",
                "title",
                "start",
                "end",
                "old",
                "new",
                "meet",
                "examdate",
                "examtime",
            ];

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
    },
};
</script>
