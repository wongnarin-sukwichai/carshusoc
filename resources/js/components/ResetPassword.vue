<template>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4"
    >
        <div class="max-w-4x1 w-full">
            <div class="p-8 rounded-2xl bg-white shadow-2xl">
                <router-link to="/login" class="cursor-pointer">
                    <img
                        :src="logo"
                        alt="logo"
                        class="w-40 mx-auto hover:scale-105"
                    />
                </router-link>

                <div class="col-span-2">
                    <label class="text-slate-800 text-sm font-medium mb-2 block"
                        >{{ $t("login.pass") }} :
                        <transition name="fade" mode="out-in">
                            <span
                                v-if="errors.password"
                                class="text-rose-300 text-sm"
                                >{{ errors.password }}</span
                            ></transition
                        >
                    </label>
                    <div class="relative flex items-center">
                        <input
                            name="username"
                            :type="showPass ? 'text' : 'password'"
                            required
                            class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                            placeholder="******"
                            v-model="data.password"
                        />
                        <box-icon
                            name="low-vision"
                            size="sd"
                            color="#abb2b9"
                            class="w-6 h-6 absolute right-3 cursor-pointer hover:scale-110"
                            @click="togglePass()"
                        ></box-icon>
                    </div>
                </div>

                <div class="col-span-2 mt-4">
                    <label class="text-slate-800 text-sm font-medium mb-2 block"
                        >{{ $t("login.confirm") }} :
                        <transition name="fade" mode="out-in">
                            <span
                                v-if="errors.confirm"
                                class="text-rose-300 text-sm"
                                >{{ errors.confirm }}</span
                            ></transition
                        >
                    </label>
                    <div class="relative flex items-center">
                        <input
                            name="username"
                            :type="showConfirm ? 'text' : 'password'"
                            required
                            class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                            placeholder="******"
                            v-model="data.confirm"
                        />
                        <box-icon
                            name="low-vision"
                            size="sd"
                            color="#abb2b9"
                            class="w-6 h-6 absolute right-3 cursor-pointer hover:scale-110"
                            @click="toggleConfirm()"
                        ></box-icon>
                    </div>
                </div>

                <hr class="my-8 border-1 border-dashed" />

                <div class="w-100">
                    <button
                        type="button"
                        class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer"
                        @click="sendData()"
                    >
                        Reset
                    </button>
                </div>
                <p
                    class="text-slate-800 text-sm !mt-6 flex cursor-pointer justify-end"
                >
                    <router-link
                        to="/login"
                        class="text-gray-300 ml-1 whitespace-nowrap font-semibold hover:scale-105"
                        >{{ $t("regis.back") }}</router-link
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    mounted() {},
    data() {
        return {
            logo: "/img/logo/logo.png",
            data: {
                token: this.$route.query.token,
                email: decodeURIComponent(this.$route.query.email),
                password: "",
                confirm: "",
            },
            errors: {
                password: "",
                confirm: "",
            },
            showPass: false,
            showConfirm: false,
        };
    },
    methods: {
        sendData() {
            // SweetAlert Confirm
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm the Reset Password?",
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
                    } else if (this.data.password !== this.data.confirm) {
                        // SweetAlert Error
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Not Match!",
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
                        axios.post("/api/reset-password", this.data).then((response) => {
                            Swal.fire({
                                title: "Success!!.",
                                icon: "success",
                                draggable: true,
                                customClass: {
                                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                                    title: "text-xl font-bold text-gray-800",
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
                            this.$router.push("/login");
                        });
                    }
                }
            });
        },
        validateData() {
            let isValid = true;

            const req = ["password", "confirm"];

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
        togglePass() {
            this.showPass = !this.showPass;
        },
        toggleConfirm() {
            this.showConfirm = !this.showConfirm;
        },
    },
};
</script>
