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
                            >Firstname :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="username"
                                type="text"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                            />
                        </div>
                    </div>

                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >Lastname :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                            />
                        </div>
                    </div>

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
                            />
                        </div>
                    </div>

                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >Password :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="password"
                                type="password"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                            />
                            <box-icon
                                name="low-vision"
                                size="sd"
                                color="#abb2b9"
                                class="w-6 h-6 absolute right-4 cursor-pointer hover:scale-110"
                            ></box-icon>
                        </div>
                    </div>  

                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            >Confirm Password :</label
                        >
                        <div class="relative flex items-center">
                            <input
                                name="password"
                                type="password"
                                required
                                class="w-full text-slate-800 text-sm border border-slate-300 px-4 py-3 rounded-md outline-blue-600"
                            />
                            <box-icon
                                name="low-vision"
                                size="sd"
                                color="#abb2b9"
                                class="w-6 h-6 absolute right-4 cursor-pointer hover:scale-110"
                            ></box-icon>
                        </div>
                    </div> 
                    
                    <div>
                        <label
                            class="text-slate-800 text-sm font-medium mb-2 block"
                            ></label
                        >
                        <div class="relative flex items-center">
                           
                        </div>
                    </div>
                </div>

              <hr class="my-8 border-1 border-dashed">

                <div class="">
                    <button
                        type="button"
                        class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer"
                    >
                        Sign up
                    </button>
                </div>
                <p class="text-slate-800 text-sm !mt-6 flex cursor-pointer justify-end">
                    <router-link
                        to="/login"
                        class="text-gray-300 ml-1 whitespace-nowrap font-semibold hover:scale-105"
                        >Back to Login From</router-link
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
