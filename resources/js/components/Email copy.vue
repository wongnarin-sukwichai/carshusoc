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
                : {{ data.title }}</span
            >
        </div>

        <div class="grid grid-cols-2 gap-4">
            <!--left -->
            <div
                class="relative border-2 border-dashed rounded-xl p-8 cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center"
            >
                <!-- โลโก้ตรงกลาง -->
                <div>
                    <img :src="logo" alt="Logo" class="w-48" />
                </div>

                <!-- ข้อความต้อนรับ -->
                <h2 class="text-xl font-semibold mb-2">{{ data.topic }}</h2>
                <h3
                    style="color: oklch(92.9% 0.013 255.508)"
                    class="mb-2 font-semibold"
                >
                    [ Order ID : {{ data.id }} ]
                </h3>
                <p class="mb-2">
                    {{ data.th }}
                </p>
                <p>
                    {{ data.eng }}
                </p>

                <br />
                <hr
                    style="border: 2px dashed oklch(92.9% 0.013 255.508)"
                    class="w-full"
                />
            </div>

            <!-- right -->
            <div>
                <div class="border-2 border-dashed rounded-xl p-4 mb-4">
                    <label
                        for="username"
                        class="block text-md font-semibold text-gray-900"
                        >ข้อความ :</label
                    >
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                        >
                            <input
                                type="text"
                                class="block min-w-0 grow py-1.5 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                v-model="data.topic"
                            />
                        </div>
                    </div>
                </div>
                <div class="border-2 border-dashed rounded-xl p-4 mb-4">
                    <label
                        for="username"
                        class="block text-md font-semibold text-gray-900"
                        >ภาษาไทย :
                    </label>
                    <div class="mt-2">
                        <textarea
                            rows=""
                            class="block w-full rounded-md bg-white py-1.5 pr-3 pl-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                            v-model="data.th"
                        ></textarea>
                    </div>
                </div>
                <div class="border-2 border-dashed rounded-xl p-4 mb-4">
                    <label
                        for="username"
                        class="block text-md font-semibold text-gray-900"
                        >ภาษาอังกฤษ :
                    </label>
                    <div class="mt-2">
                        <textarea
                            rows=""
                            class="block w-full rounded-md bg-white py-1.5 pr-3 pl-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                            v-model="data.eng"
                        ></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-2 rounded-xl bg-lime-200 border-lime-300 hover:bg-lime-300"
                    @click="sendData()"
                >
                    <box-icon name="plus-circle" class="mr-2"></box-icon>
                    {{ $t("addcont.add") }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import boxicons from "boxicons";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";
import Swal from "sweetalert2";

export default {
    mounted() {
        this.getEmail();
    },
    data() {
        return {
            logo: "/img/logo/logo.png",
            data: {
                id: this.$route.params.id,
                title: "",
                topic: "",
                th: "",
                eng: "",
            },
        };
    },
    methods: {
        getEmail() {
            axios
                .get("/api/email/" + this.$route.params.id + "/edit")
                .then((response) => {
                    this.data.title = response.data.title;
                    this.data.topic = response.data.topic;
                    this.data.th = response.data.th;
                    this.data.eng = response.data.eng;

                    console.log(this.data);
                });
        },
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
                        axios
                            .put("/api/email/" + this.data.id, this.data)
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
                            });
                        this.getEmail();
                    } catch (err) {
                        throw err;
                    }
                }
            });
        },
    },
};
</script>
