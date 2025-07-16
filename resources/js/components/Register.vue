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
                            >{{ $t('regis.first') }} :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="firstname"
                            />
                        </div>
                    </div>

                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t('regis.last') }} :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="lastname"
                            />
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >{{ $t('login.email') }} :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="*** test@gmail.com ***"
                            />
                        </div>
                    </div>           
                </div>

                <div class="mt-4 text-xs text-rose-300">** งดใช้ Email ของสถาบันการศึกษา (**.ac.th) เพื่อป้องกันการไม่ได้รับ Email ยืนยันตน</div>

              <hr class="my-8 border-1 border-dashed">

                <div class="">
                    <button
                        type="button"
                        class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer"
                    >
                        {{ $t('regis.signup') }}
                    </button>
                </div>
                <p class="text-slate-800 text-sm !mt-6 flex cursor-pointer justify-end">
                    <router-link
                        to="/login"
                        class="text-gray-300 ml-1 whitespace-nowrap font-semibold hover:scale-105"
                        >{{ $t('regis.back') }}</router-link
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            logo: "/img/logo/logo.png",
        };
    },
};
</script>
