<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="shield-plus"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.home")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-2 rounded-xl mb-2 text-center text-[#85c1e9] font-semibold"
        >
            {{ $t("admin.welcome") }}
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mb-2"
        >
            <div class="grid grid-cols-6 gap-4">
                <div>
                    <div
                        class="border-2 rounded-lg border-dashed border-gray-200"
                    >
                        <img :src="pic1" class="rounded-lg" />
                    </div>
                    <div class="mt-2 border-2 rounded-lg border-dashed border-gray-200 text-center p-2 text-[#85c1e9] text-sm">
                        <p>รศ.ดร.ธีระ รุ่งธีระ</p>
                        <p>เจ้าหน้าที่ดูแลระบบ</p>
                    </div>
                </div>
                 <div>
                    <div
                        class="border-2 rounded-lg border-dashed border-gray-200"
                    >
                        <img :src="pic2" class="rounded-lg" />
                    </div>
                    <div class="mt-2 border-2 rounded-lg border-dashed border-gray-200 text-center p-2 text-[#85c1e9] text-sm">
                        <p>พักตร์พิไล น้อยวิมล</p>
                        <p>เจ้าหน้าที่ดูแลระบบ</p>
                    </div>
                </div>
                <div class="border-2"></div>
                <div class="border-2"></div>
                <div class="border-2"></div>
                <div class="border-2"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {},
    data() {
        return {
            pic1: "img/profile/01.png",
            pic2: "img/profile/02.jpg"
        };
    },
};
</script>
