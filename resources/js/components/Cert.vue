<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="file"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("home.cert")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mb-2"
        >
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <!-- Search-->
                        <div
                            class="flex text-gray-500 focus-within:text-gray-900 mb-4 justify-end items-end"
                        >
                            <!-- <input
                                type="text"
                                id="default-search"
                                class="block w-80 h-11 pr-5 pl-12 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none text-right"
                                placeholder="Search..."
                            /> -->
                        </div>
                        <!-- End Search-->

                        <!-- Table-->
                        <div class="flex flex-col">
                            <div class="overflow-x-auto pb-4">
                                <div
                                    class="min-w-full inline-block align-middle"
                                >
                                    <div
                                        class="overflow-hidden border rounded-lg border-gray-300"
                                    >
                                        <table
                                            class="table-auto min-w-full rounded-xl"
                                        >
                                            <thead>
                                                <tr class="bg-violet-50">
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        #
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Services
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize min-w-[150px]"
                                                    >
                                                        Owner
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Type
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Regis. Date
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Complete Date
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Exam. cert
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Train. cert
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        File
                                                    </th>
                                                </tr>
                                            </thead>
                                            <transition-group
                                                tag="tbody"
                                                name="fade"
                                                mode="out-in"
                                                class="divide-y divide-gray-300"
                                            >
                                                <tr
                                                    class="bg-white transition-all duration-500"
                                                    v-for="(
                                                        enroll, index
                                                    ) in enrollList.data"
                                                    :key="index"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{ index + 1 }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <p
                                                            class="font-semibold text-sm text-gray-900 whitespace-normal break-words"
                                                        >
                                                            {{ enroll.title }}
                                                        </p>
                                                        <p
                                                            class="font-normal text-xs leading-5 text-gray-400"
                                                        >
                                                            {{
                                                                enroll.content_title
                                                            }}
                                                            :
                                                            {{
                                                                enroll.short_name
                                                            }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-3">
                                                        <div
                                                            class="w-48 flex items-center gap-3"
                                                        >
                                                            <box-icon
                                                                name="user"
                                                                size="md"
                                                                color="#6a7282"
                                                                v-if="
                                                                    enroll ===
                                                                    null
                                                                "
                                                            ></box-icon>
                                                            <img
                                                                v-else
                                                                :src="
                                                                    pic +
                                                                    enroll.pic
                                                                "
                                                                class="w-10"
                                                            />
                                                            <div class="data">
                                                                <p
                                                                    class="font-normal text-sm text-gray-900"
                                                                >
                                                                    {{
                                                                        enroll.name
                                                                    }}
                                                                    {{
                                                                        enroll.surname
                                                                    }}
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400"
                                                                >
                                                                    {{
                                                                        enroll.email
                                                                    }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-semibold text-gray-900"
                                                    >
                                                        {{
                                                            setEvent(
                                                                enroll.event_id
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setMoment(
                                                                enroll.created_at
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setMoment(
                                                                enroll.update_at
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-xs leading-6 font-medium text-gray-900"
                                                    >
                                                        <box-icon
                                                            name="certification"
                                                            color="#ad65d9"
                                                            class="cursor-pointer hover:scale-120"
                                                            v-if="
                                                                enroll.event_id ===
                                                                    1 &&
                                                                enroll.certTest ===
                                                                    1
                                                            "
                                                            @click="
                                                                showCertTest(
                                                                    enroll.id
                                                                )
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-xs leading-6 font-medium text-gray-900"
                                                    >
                                                        <box-icon
                                                            name="certification"
                                                            color="#ad65d9"
                                                            class="cursor-pointer hover:scale-120"
                                                            v-if="
                                                                enroll.event_id ===
                                                                    2 &&
                                                                enroll.certTrain ===
                                                                    1
                                                            "
                                                            @click="
                                                                showCertTrain(
                                                                    enroll.id,
                                                                    enroll.certTrain
                                                                )
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-xs leading-6 font-medium text-gray-900"
                                                    >
                                                        <box-icon
                                                            name="file"
                                                            color="oklch(76.8% 0.233 130.85)"
                                                            class="cursor-pointer hover:scale-120"
                                                            v-if="
                                                                enroll.event_id ===
                                                                    3 &&
                                                                enroll.complete !==
                                                                    null
                                                            "
                                                            @click="
                                                                showComplete(
                                                                    enroll.id
                                                                )
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                </tr>
                                            </transition-group>
                                        </table>
                                    </div>

                                    <div class="flex justify-end m-5">
                                        <TailwindPagination
                                            :data="enrollList"
                                            @pagination-change-page="getEnroll"
                                        >
                                        </TailwindPagination>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Complete -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalComplete">
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
                            >
                                ** กรุณาเลือกไฟล์
                            </div>
                            <div
                                class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-lime-400 hover:border-3 p-4 group mb-2"
                                v-for="(complete, index) in completeList"
                                :key="index"
                                @click="
                                    linkComplete(
                                        complete.title,
                                        complete.created_at
                                    )
                                "
                            >
                                <span
                                    class="flex items-center jusitfy-center font-semibold text-lg text-[#85c1e9]"
                                >
                                    <box-icon
                                        name="file"
                                        color="oklch(76.8% 0.233 130.85)"
                                        class="cursor-pointer hover:scale-115"
                                    ></box-icon>
                                    : {{ complete.title }}
                                </span>
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
import { TailwindPagination } from "laravel-vue-pagination";
import moment from "moment";
import Swal from "sweetalert2";

export default {
    async mounted() {
        await this.getEvent();
        await this.getEnroll();
    },
    data() {
        return {
            pic: "img/profiles/thumbnails/",
            ////////////////////////////////////////////////////////////////
            enrollList: "",
            ////////////////////////////////////////////////////////////////
            modalComplete: false,
            ////////////////////////////////////////////////////////////////
            completeList: [],
            certList: [],
            ////////////////////////////////////////////////////////////////
            moment: moment,
        };
    },
    methods: {
        getEvent() {
            axios.get("/api/event").then((response) => {
                this.eventList = response.data;
            });
        },
        getEnroll(page = 1) {
            axios.get("/api/showCert?page=" + page).then((response) => {
                this.enrollList = response.data;
            });
        },
        ////////////////////////////////////////////////////////////////
        setEvent(id) {
            if (id != null) {
                const arr = Array.from(this.eventList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }

            return null;
        },
        setMoment(id) {
            return moment(id).format("L");
        },
        ////////////////////////////////////////////////////////////////
        close() {
            this.modalComplete = false;
            this.modalCert = false;
        },
        ////////////////////////////////////////////////////////////////
        showCertTrain(id, code) {
            // SweetAlert Confirm
            Swal.fire({
                title: "Download Certificate?",
                text: "Do you want to download the Certificate?",
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
            }).then((result) => {
                if (result.isConfirmed) {
                    if (code === 1) {
                        axios
                            .get("/api/certTrain/" + id)
                            .then((response) => {
                                Swal.fire({
                                    title: "Download Certificate Complete",
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
                            })
                            .catch(() => {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Can't Download. Contact to Staff Please.",
                                    icon: "error",
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
                            });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Can't Download. Contact to Staff Please.",
                            icon: "error",
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
                    }
                }
            });
        },
        showComplete(id) {
            this.close();

            axios.get("/api/complete/" + id).then((response) => {
                this.completeList = response.data;

                this.modalComplete = true;
            });
        },
        ////////////////////////////////////////////////////////////////
        linkComplete(id, code) {
            const url = moment(code).format("YYYY/MM/DD");
            window.open("files/completes/" + url + "/" + id, "_blank");
        },
        // linkCert(id, code) {
        //     const url = moment(code).format("YYYY/MM/DD");
        //     window.open("files/certs/" + url + "/" + id, "_blank");
        // },
    },
    components: {
        TailwindPagination,
    },
};
</script>
