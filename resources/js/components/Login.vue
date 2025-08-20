<template>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4"
    >
        <div class="max-w-md w-full">
            <div class="p-8 rounded-2xl bg-white shadow-2xl">
                <a href="/" class="cursor-pointer">
                    <img
                        :src="logo"
                        alt="logo"
                        class="w-40 mx-auto hover:scale-105"
                    />
                </a>
                <div class="mt-4 space-y-6">
                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t("login.email") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.email"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.email }}</span
                                ></transition
                            ></label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter Email"
                                v-model="auth.email"
                            />
                            <box-icon
                                name="user"
                                size="sd"
                                color="#abb2b9"
                                class="w-6 h-6 absolute right-4"
                            ></box-icon>
                        </div>
                    </div>

                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t("login.pass") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.password"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.password }}</span
                                ></transition
                            ></label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="password"
                                :type="showPassword ? 'text' : 'password'"
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter password"
                                v-model="auth.password"
                            />
                            <box-icon
                                name="low-vision"
                                size="sd"
                                color="#abb2b9"
                                class="w-6 h-6 absolute right-4 cursor-pointer hover:scale-110"
                                @click="togglePassword"
                            ></box-icon>
                        </div>
                    </div>

                    <div
                        class="flex flex-wrap items-center justify-between gap-4"
                    >
                        <div class="flex items-center">
                            <!-- <input
                                id="remember-me"
                                name="remember-me"
                                type="checkbox"
                                class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-slate-300 rounded"
                            />
                            <label
                                for="remember-me"
                                class="ml-3 block text-sm text-slate-800"
                            >
                                {{ $t("login.remem") }}
                            </label> -->
                        </div>
                        <div class="text-sm">
                            <router-link
                                to="/forgot"
                                class="text-blue-600 hover:underline font-semibold"
                            >
                                {{ $t("login.forget") }}
                            </router-link>
                        </div>
                    </div>

                    <div class="!mt-12">
                        <button
                            class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer"
                            @click="login()"
                        >
                            {{ $t("login.signin") }}
                        </button>
                    </div>
                    <p class="text-slate-800 text-sm !mt-6 text-center">
                        {{ $t("login.noacc") }}
                        <router-link
                            to="/register"
                            class="text-blue-600 hover:underline ml-1 whitespace-nowrap font-semibold"
                            >{{ $t("login.regis") }}</router-link
                        >
                    </p>
                </div>
                <div
                    class="flex justify-center text-sm border-t-2 border-dashed mt-2"
                >
                    <div class="mt-2">
                        <span
                            :class="{
                                'font-bold text-blue-600':
                                    $i18n.locale === 'th',
                            }"
                            @click="chgLang('th')"
                            >TH</span
                        >
                        <span class="px-2"> | </span>
                        <span
                            :class="{
                                'font-bold text-blue-600':
                                    $i18n.locale === 'en',
                            }"
                            @click="chgLang('en')"
                            >EN</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    mounted() {},
    data() {
        return {
            logo: "/img/logo/logo.png",
            showPassword: false,
            auth: {
                email: "",
                password: "",
            },
            errors: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        async login() {
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
                    await this.$store.dispatch("login", this.auth); //dispatch ส่งค่าไปยัง store ของ vuex
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Login Success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    this.$router.push({ name: "home" }); //หากสำเร็จให้เปิด router ชื่อ home แบบ SPA
                }
            } catch (err) {
                Swal.fire({
                    title: "Fail!",
                    text: "Email or Password went wrong.",
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
        },
        togglePassword() {
            this.showPassword = !this.showPassword;
        },
        async chgLang(id) {
            this.$i18n.locale = id;
            localStorage.setItem("locale", id);
            window.location.reload();
        },
        validateData() {
            let isValid = true;

            const req = ["email", "password"];

            for (let key of req) {
                const value = this.auth[key];

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

<style>
:deep(.fade-enter-active),
:deep(.fade-leave-active) {
    transition: opacity 0.5s ease;
}
:deep(.fade-enter-from),
:deep(.fade-leave-to) {
    opacity: 0;
}
</style>
