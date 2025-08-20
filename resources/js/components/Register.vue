<template>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4"
    >
        <div class="max-w-4x1 w-full">
            <div class="p-8 rounded-2xl bg-white shadow-2xl">
                <a href="/" class="cursor-pointer">
                    <img
                        :src="logo"
                        alt="logo"
                        class="w-40 mx-auto hover:scale-105"
                    />
                </a>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t("regis.first") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.name"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.name }}</span
                                ></transition
                            >
                        </label>

                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="firstname"
                                v-model="data.name"
                            />
                        </div>
                    </div>

                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t("regis.last") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.surname"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.surname }}</span
                                ></transition
                            >
                        </label>
                        <div class="relative flex items-center">
                            <input
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="lastname"
                                v-model="data.surname"
                            />
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t("login.email") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.email"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.email }}</span
                                ></transition
                            >
                        </label>
                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="*** test@gmail.com ***"
                                v-model="data.email"
                            />
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-xs text-gray-700 font-semibold">
                    ** งดใช้ Email ของสถาบันการศึกษา (**.ac.th)
                    เพื่อป้องกันการไม่ได้รับ Email ยืนยันตน
                </div>

                <hr class="my-8 border-1 border-dashed" />

                <div class="">
                    <button
                        type="button"
                        class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer"
                        @click="sendData()"
                    >
                        {{ $t("regis.signup") }}
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
                name: "",
                surname: "",
                email: "",
            },
            errors: {
                name: "",
                surname: "",
                email: "",
            },
        };
    },
    methods: {
        sendData() {
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
                    .post("/api/register", this.data)
                    .then((response) => {
                        Swal.fire({
                            title: "Registration successful! Please check your email for the password.",
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
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
        validateData() {
            let isValid = true;

            const req = ["name", "surname", "email"];

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
