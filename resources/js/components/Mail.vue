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
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.email")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mb-2"
        >
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50">
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                ยินดีต้อนรับ
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                ยินดีต้อนรับเข้าสู่ระบบ CARS-HUSOC
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">แก้ไขล่าสุด : วงศ์นรินทร์ สุขวิชัย</p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>
                <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50">
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                แจ้งลิ้งค์อบรมออนไลน์
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                แจ้งลิ้งค์อบรมออนไลน์ รายละเอียดดังนี้ :
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">แก้ไขล่าสุด : วงศ์นรินทร์ สุขวิชัย</p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>
                <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50">
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                แจ้งค่าบริการ
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                เรียนคุณ ขอแจ้งชำระค่าบริการ กำหนดภายในวันที่
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">แก้ไขล่าสุด : วงศ์นรินทร์ สุขวิชัย</p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">6h ago</time>
                        </p>
                    </div>
                </li>
                <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50">
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                ได้รับเอกสารแล้ว
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                เรียนคุณ ทางเราได้รับเอกสารเป็นที่เรียบร้อย และจะดำเนินการแจ้งกลับเมื่อแล้วเสร็จ
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">แก้ไขล่าสุด : วงศ์นรินทร์ สุขวิชัย</p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>
                <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50">
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                แจ้งเปลี่ยนแปลงห้องอบรม
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                เรียนคุณ ขอแจ้งเปลี่ยนแปลงห้องอบรม เรื่อง เป็น
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">แก้ไขล่าสุด : วงศ์นรินทร์ สุขวิชัย</p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>
                <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-sky-50">
                    <div class="flex min-w-0 gap-x-4">
                        <box-icon
                            type="logo"
                            name="gmail"
                            class="mr-2"
                            size="lg"
                            color="#85c1e9"
                        ></box-icon>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">
                                ขอขอบพระคุณ
                            </p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">
                                เรียนคุณ ขอขอบพระคุณที่ใช้บริการ ทาง CARS-HUSOC ยินดีเป็นอย่างยิ่งที่ท่านได้ใช้บริการ 
                            </p>
                        </div>
                    </div>
                    <div
                        class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                    >
                        <p class="text-sm/6 text-gray-900">แก้ไขล่าสุด : วงศ์นรินทร์ สุขวิชัย</p>
                        <p class="mt-1 text-xs/5 text-gray-500">
                            Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
