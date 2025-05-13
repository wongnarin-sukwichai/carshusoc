<template>
    <div
        class="min-h-screen flex flex-col items-center justify-center py-6 px-4"
    >
        <div class="max-w-md w-full">
            <div class="p-8 rounded-2xl bg-white shadow-2xl">
                <img :src="logo" alt="logo" class="w-40 mx-auto" />
                <div class="mt-4 space-y-6">
                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >Email :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter user name"
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
                            >Password</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="password"
                                type="password"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter password"
                            />
                            <box-icon
                                name="low-vision"
                                size="sd"
                                color="#abb2b9"
                                class="w-6 h-6 absolute right-4"
                            ></box-icon>
                        </div>
                    </div>

                    <div
                        class="flex flex-wrap items-center justify-between gap-4"
                    >
                        <div class="flex items-center">
                            <input
                                id="remember-me"
                                name="remember-me"
                                type="checkbox"
                                class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-slate-300 rounded"
                            />
                            <label
                                for="remember-me"
                                class="ml-3 block text-sm text-slate-800"
                            >
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a
                                href="jajvascript:void(0);"
                                class="text-blue-600 hover:underline font-semibold"
                            >
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="!mt-12">
                        <button
                            type="button"
                            class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer"
                        >
                            Sign in
                        </button>
                    </div>
                    <p class="text-slate-800 text-sm !mt-6 text-center">
                        Don't have an account?
                        <a
                            href="javascript:void(0);"
                            class="text-blue-600 hover:underline ml-1 whitespace-nowrap font-semibold"
                            >Register here</a
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {},
    data() {
        return {
            logo: "/img/logo/logo.png",
        };
    },
};
</script>
