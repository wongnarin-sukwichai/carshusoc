<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="spreadsheet"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("home.list")
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
                                                <tr class="bg-gray-50">
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
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Order ID
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
                                                        Price
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Payment
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Status
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Actions
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    ></th>
                                                </tr>
                                            </thead>
                                            <transition-group
                                                tag="tbody"
                                                name="fade"
                                                mode="out-in"
                                                class="divide-y divide-gray-300"
                                            >
                                                <tr
                                                    class="bg-white transition-all duration-500 hover:bg-gray-50"
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
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{ enroll.id }}
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
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setEvent(
                                                                enroll.event_id
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-xs leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setMoment(
                                                                enroll.created_at
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-semibold text-gray-900"
                                                    >
                                                        <span
                                                            v-if="
                                                                enroll.pay !==
                                                                    null ||
                                                                enroll.tag !==
                                                                    null
                                                            "
                                                        >
                                                            {{
                                                                Number(
                                                                    enroll.pay +
                                                                        enroll.tag
                                                                ).toLocaleString()
                                                            }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <box-icon
                                                            type="logo"
                                                            name="paypal"
                                                            color="oklch(50% 0.134 242.749)"
                                                            class="cursor-pointer hover:scale-120"
                                                            v-if="
                                                                enroll.payment !==
                                                                null
                                                            "
                                                            @click="
                                                                showPayment(
                                                                    enroll.id
                                                                )
                                                            "
                                                        ></box-icon>

                                                        <box-icon
                                                            name="cloud-upload"
                                                            color="oklch(82.8% 0.111 230.318)"
                                                            class="cursor-pointer hover:scale-120"
                                                            animation="burst-hover"
                                                            v-else
                                                            @click="
                                                                showEdit(
                                                                    enroll.id
                                                                )
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <div
                                                            class="py-1.5 px-2.5 bg-amber-50 rounded-full flex items-center justify-center w-20 gap-1 hover:scale-105 cursor-pointer"
                                                            v-if="
                                                                enroll.status ===
                                                                null
                                                            "
                                                        >
                                                            <span
                                                                class="font-medium text-xs text-amber-600"
                                                                >Pending</span
                                                            >
                                                        </div>

                                                        <div
                                                            class="py-1.5 px-2.5 bg-sky-50 rounded-full flex justify-center w-20 items-center gap-1 hover:scale-105 cursor-pointer"
                                                            v-else-if="
                                                                enroll.status ===
                                                                1
                                                            "
                                                        >
                                                            <span
                                                                class="font-medium text-xs text-sky-600"
                                                                >Active</span
                                                            >
                                                        </div>

                                                        <div
                                                            class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1 hover:scale-105 cursor-pointer"
                                                            v-else-if="
                                                                enroll.status ===
                                                                2
                                                            "
                                                        >
                                                            <span
                                                                class="font-medium text-xs text-emerald-600"
                                                                >Complete</span
                                                            >
                                                        </div>

                                                        <div
                                                            class="py-1.5 px-2.5 bg-red-50 rounded-full flex w-20 justify-center items-center gap-1 hover:scale-105 cursor-pointer"
                                                            v-else
                                                        >
                                                            <span
                                                                class="font-medium text-xs text-red-600"
                                                                >Cancel</span
                                                            >
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="flex p-4.5 items-center gap-0.5"
                                                    >
                                                        <box-icon
                                                            name="message-square-detail"
                                                            class="cursor-pointer hover:scale-120"
                                                            color="oklch(82.8% 0.189 84.429)"
                                                            @click="
                                                                showDetail(
                                                                    enroll.id
                                                                )
                                                            "
                                                        ></box-icon>

                                                        <box-icon
                                                            name="dots-vertical-rounded"
                                                            color="oklch(86.9% 0.022 252.894)"
                                                        ></box-icon>

                                                        <box-icon
                                                            name="message-square-edit"
                                                            class="cursor-pointer hover:scale-120"
                                                            color="oklch(68.5% 0.169 237.323)"
                                                            @click="
                                                                showEdit(
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

        <div
            class="border-2 border-dashed border-gray-200 text-sm p-4 rounded-xl mb-2"
        >
            สามารถชำระเงินค่าบริการผ่านช่องทางออนไลน์ โดยใช้แอปพิเคชัน มาที่ :

            <div class="flex px-1 items-center">
                <img :src="logo" class="w-8 h-8 rounded-lg mr-2" />
                ธนาคารไทยพาณิชย์ เลขบัญชี :
                <span class="font-semibold px-2 text-purple-800"
                    >408-931-6919</span
                >
                | <span class="font-semibold px-2">ชื่อบัญชี</span> :
                มหาวิทยาลัยมหาสารคาม (เงินรับฝาก)
            </div>
        </div>

        <div class="mt-4">
            <div class="flex">
                <span
                    class="py-1.5 px-2.5 bg-amber-50 rounded-full flex items-center justify-center w-20 text-xs text-amber-600 mb-2"
                    >Pending</span
                >
                <span class="py-1 ml-2 text-sm text-gray-700 font-semibold"
                    >: รอชำระเงิน</span
                >
            </div>

            <div class="flex">
                <span
                    class="py-1.5 px-2.5 bg-sky-50 rounded-full flex items-center justify-center w-20 text-xs text-sky-600 mb-2"
                    >Active</span
                >
                <span class="py-1 ml-2 text-sm text-gray-700 font-semibold"
                    >: รอการตรวจสอบ</span
                >
            </div>

            <div class="flex">
                <span
                    class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex items-center justify-center w-20 text-xs text-emerald-600 mb-2"
                    >Complete</span
                >
                <span class="py-1 ml-2 text-sm text-gray-700 font-semibold"
                    >: ผ่านการตรวจสอบ</span
                >
            </div>

            <div class="flex">
                <span
                    class="py-1.5 px-2.5 bg-red-50 rounded-full flex items-center justify-center w-20 text-xs text-red-600 mb-2"
                    >Cancel</span
                >
                <span class="py-1 ml-2 text-sm text-gray-700 font-semibold"
                    >: ยกเลิก</span
                >
            </div>
        </div>
    </div>

    <!----------------------------------- MODAL ------------------------------------------------------->

    <!-- Modal Detail -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalDetail">
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
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <table
                                class="table-auto w-full border border-gray-300 text-sm text-left text-gray-700"
                            >
                                <thead class="bg-gray-100 text-center">
                                    <tr>
                                        <th
                                            class="border border-gray-300 px-4 p-1"
                                        >
                                            หัวข้อ
                                        </th>
                                        <th class="border border-gray-300 px-4">
                                            รายละเอียด
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ประเภท
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1 font-semibold"
                                        >
                                            {{ detailList.title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ชื่อ - นามสกุล
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            {{ detailList.name }}
                                            {{ detailList.surname }}
                                        </td>
                                    </tr>
                                    <template
                                        v-if="
                                            detailList.event_id === 1 ||
                                            detailList.event_id === 2
                                        "
                                    >
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เริ่ม - สิ้นสุด
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1 text-xs"
                                            >
                                                <span
                                                    v-if="
                                                        detailList.start !==
                                                            null &&
                                                        detailList.end !== null
                                                    "
                                                >
                                                    {{
                                                        setMoment(
                                                            detailList.start
                                                        )
                                                    }}
                                                    <span
                                                        class="px-1 font-semibold"
                                                        >-</span
                                                    >
                                                    {{
                                                        setMoment(
                                                            detailList.end
                                                        )
                                                    }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                วันสอบ/อบรม
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ detailList.examdate }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เวลาสอบ/อบรม
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1 text-xs"
                                            >
                                                {{ detailList.examtime }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                สถานที่สอบ/อบรม
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <span
                                                    v-if="
                                                        detailList.status === 2
                                                    "
                                                >
                                                    {{ detailList.meet }}
                                                </span>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            อื่นๆ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span
                                                v-if="detailList.status === 2"
                                            >
                                                {{ detailList.section_other }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            colspan="2"
                                            class="px-2 py-1 bg-gray-100"
                                        ></td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ค่าลงทะเบียน
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span
                                                v-if="detailList.pay !== null"
                                            >
                                                {{
                                                    Number(
                                                        detailList.pay
                                                    ).toLocaleString()
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ค่าส่งไปรษณีย์
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                            v-if="detailList.tag !== null"
                                        >
                                            {{
                                                Number(
                                                    detailList.tag
                                                ).toLocaleString()
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ค่าบริการที่ต้องชำระ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span
                                                v-if="
                                                    detailList.pay !== null ||
                                                    detailList.tag !== null
                                                "
                                            >
                                                {{
                                                    Number(
                                                        detailList.pay +
                                                            detailList.tag
                                                    ).toLocaleString()
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                    <template v-if="detailList.event_id === 2">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ใบ Certificate
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <span
                                                    class="items-end justify-end"
                                                    ><box-icon
                                                        name="certification"
                                                        color="#ad65d9"
                                                        class="cursor-pointer hover:scale-115"
                                                        v-for="n in +detailList.cert ||
                                                        0"
                                                        :key="`complete-${n}`"
                                                        @click="
                                                            showCert(
                                                                detailList.id
                                                            )
                                                        "
                                                    ></box-icon
                                                ></span>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-if="detailList.event_id === 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เอกสารแล้วเสร็จ
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <span
                                                    class="items-end justify-end"
                                                    ><box-icon
                                                        name="file"
                                                        color="oklch(76.8% 0.233 130.85)"
                                                        class="cursor-pointer hover:scale-115"
                                                        v-for="n in +detailList.complete ||
                                                        0"
                                                        :key="`complete-${n}`"
                                                        @click="
                                                            showComplete(
                                                                detailList.id
                                                            )
                                                        "
                                                    ></box-icon
                                                ></span>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            เจ้าหน้าที่
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            {{ detailList.other }}
                                        </td>
                                    </tr>
                                    <tr v-if="detailList.slip !== null">
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ใบเสร็จ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span
                                                v-if="
                                                    detailList.slip !== null &&
                                                    detailList.slip > 0
                                                "
                                            >
                                                <box-icon
                                                    name="dollar-circle"
                                                    color="oklch(87.9% 0.169 91.605)"
                                                    class="hover:scale-120 cursor-pointer"
                                                    @click="
                                                        showSlip(detailList.id)
                                                    "
                                                ></box-icon>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            colspan="2"
                                            class="px-2 py-1 bg-gray-100"
                                        ></td>
                                    </tr>
                                    <template v-if="detailList.event_id === 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                กำหนดวันรับงาน
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <span
                                                    v-if="
                                                        detailList.submit !==
                                                        null
                                                    "
                                                >
                                                    {{
                                                        moment(
                                                            detailList.submit
                                                        ).format("D/MM/Y")
                                                    }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ไฟล์เอกสาร
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <box-icon
                                                    name="file"
                                                    color="oklch(50% 0.134 242.749)"
                                                    class="cursor-pointer hover:scale-120"
                                                    v-if="
                                                        detailList.payment !==
                                                        null
                                                    "
                                                    @click="
                                                        showWork(detailList.id)
                                                    "
                                                ></box-icon>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            หลักฐานการโอน
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <box-icon
                                                type="logo"
                                                name="paypal"
                                                color="oklch(50% 0.134 242.749)"
                                                class="cursor-pointer hover:scale-120"
                                                v-if="
                                                    detailList.payment !== null
                                                "
                                                @click="
                                                    showPayment(detailList.id)
                                                "
                                            ></box-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ข้อความ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            {{ detailList.comment }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ต้องการใบเสร็จ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <div class="flex items-center">
                                                <input
                                                    type="checkbox"
                                                    id="myCheckbox"
                                                    class="form-checkbox h-4 w-4 text-blue-600"
                                                    disabled
                                                    :checked="
                                                        chkSlip(detailList.slip)
                                                    "
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                        >
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-red-300 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-red-400 sm:ml-3 sm:w-auto"
                                @click="close()"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <!-- Modal Edit -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalEdit">
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
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <table
                                class="table-auto w-full border border-gray-300 text-sm text-left text-gray-700"
                            >
                                <thead class="bg-gray-100 text-center">
                                    <tr>
                                        <th
                                            class="border border-gray-300 px-4 p-1"
                                        >
                                            หัวข้อ
                                        </th>
                                        <th class="border border-gray-300 px-4">
                                            รายละเอียด
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ประเภท
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1 font-semibold"
                                        >
                                            {{ detailList.title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ชื่อ - นามสกุล
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            {{ detailList.name }}
                                            {{ detailList.surname }}
                                        </td>
                                    </tr>
                                    <template
                                        v-if="
                                            detailList.event_id === 1 ||
                                            detailList.event_id === 2
                                        "
                                    >
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เริ่ม - สิ้นสุด
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1 text-xs"
                                            >
                                                <span
                                                    v-if="
                                                        detailList.start !==
                                                            null &&
                                                        detailList.end !== null
                                                    "
                                                >
                                                    {{
                                                        setMoment(
                                                            detailList.start
                                                        )
                                                    }}
                                                    <span
                                                        class="px-1 font-semibold"
                                                        >-</span
                                                    >
                                                    {{
                                                        setMoment(
                                                            detailList.end
                                                        )
                                                    }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                วันสอบ/อบรม
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ detailList.examdate }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เวลาสอบ/อบรม
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ detailList.examtime }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                สถานที่สอบ/อบรม
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <span
                                                    v-if="
                                                        detailList.status === 2
                                                    "
                                                >
                                                    {{ detailList.meet }}
                                                </span>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            อื่นๆ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span
                                                v-if="detailList.status === 2"
                                            >
                                                {{ detailList.section_other }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            colspan="2"
                                            class="px-2 py-1 bg-gray-100"
                                        ></td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ค่าลงทะเบียน
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span v-if="data.pay !== null">
                                                {{
                                                    Number(
                                                        data.pay
                                                    ).toLocaleString()
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ค่าส่งไปรษณีย์
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span v-if="data.tag !== null">
                                                {{ data.tag }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ค่าบริการที่ต้องชำระ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <span
                                                v-if="
                                                    data.pay !== null ||
                                                    data.tag !== null
                                                "
                                            >
                                                {{
                                                    Number(
                                                        data.pay + data.tag
                                                    ).toLocaleString()
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                    <template v-if="detailList.event_id === 2">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ใบ Certificate
                                            </td>
                                            <td class="px-4 py-1">
                                                <box-icon
                                                    name="certification"
                                                    color="#ad65d9"
                                                    class="cursor-pointer hover:scale-120"
                                                    v-if="
                                                        detailList.cert !== null
                                                    "
                                                    @click="
                                                        showCert(detailList.id)
                                                    "
                                                ></box-icon>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-if="detailList.event_id === 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เอกสารแล้วเสร็จ
                                            </td>
                                            <td class="px-4 py-1">
                                                <box-icon
                                                    name="file"
                                                    color="oklch(76.8% 0.233 130.85)"
                                                    class="cursor-pointer hover:scale-120"
                                                    v-if="
                                                        detailList.complete !==
                                                        null
                                                    "
                                                    @click="
                                                        showComplete(
                                                            detailList.id
                                                        )
                                                    "
                                                ></box-icon>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            เจ้าหน้าที่
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            {{ data.other }}
                                        </td>
                                    </tr>
                                    <transition name="fade" mode="out-in">
                                        <tr v-if="chkSlip(data.slip) === true">
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ใบเสร็จ
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ showSlip(data.id) }}
                                            </td>
                                        </tr>
                                    </transition>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            สถานะ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <div
                                                class="py-0.5 px-2.5 bg-amber-50 rounded-full flex items-center justify-center w-20 gap-1 hover:scale-105 cursor-pointer"
                                                v-if="data.status === null"
                                            >
                                                <span
                                                    class="font-medium text-xs text-amber-600"
                                                    >Pending</span
                                                >
                                            </div>

                                            <div
                                                class="py-0.5 px-2.5 bg-sky-50 rounded-full flex justify-center w-20 items-center gap-1 hover:scale-105 cursor-pointer"
                                                v-else-if="data.status === 1"
                                            >
                                                <span
                                                    class="font-medium text-xs text-sky-600"
                                                    >Active</span
                                                >
                                            </div>

                                            <div
                                                class="py-0.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1 hover:scale-105 cursor-pointer"
                                                v-else-if="data.status === 2"
                                            >
                                                <span
                                                    class="font-medium text-xs text-emerald-600"
                                                    >Complete</span
                                                >
                                            </div>

                                            <div
                                                class="py-0.5 px-2.5 bg-red-50 rounded-full flex w-20 justify-center items-center gap-1 hover:scale-105 cursor-pointer"
                                                v-else
                                            >
                                                <span
                                                    class="font-medium text-xs text-red-600"
                                                    >Cancel</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            colspan="2"
                                            class="px-2 py-1 bg-gray-100"
                                        ></td>
                                    </tr>
                                    <template v-if="detailList.event_id === 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                กำหนดวันรับงาน
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <Datepicker
                                                    v-model="data.submit"
                                                    class="w-full text-sm"
                                                />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ไฟล์เอกสาร
                                            </td>
                                            <td class="flex px-4 py-1">
                                                <span
                                                    class="items-center justify-between w-full"
                                                >
                                                    <span
                                                        class="border-r-2 mr-2"
                                                    >
                                                        <input
                                                            class="w-48 cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary mr-2"
                                                            type="file"
                                                            ref="fileInput"
                                                            @change="pickFile"
                                                        />
                                                    </span>
                                                </span>
                                                <span
                                                    class="flex items-end justify-end"
                                                    ><box-icon
                                                        name="file"
                                                        color="oklch(50% 0.134 242.749)"
                                                        class="cursor-pointer hover:scale-115"
                                                        v-for="n in +data.work ||
                                                        0"
                                                        :key="`work-${n}`"
                                                        @click="
                                                            showWork(data.id)
                                                        "
                                                    ></box-icon
                                                ></span>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            หลักฐานการโอน
                                        </td>
                                        <td class="flex px-4 py-1 border-t">
                                            <span
                                                class="items-center justify-between w-full"
                                            >
                                                <span class="border-r-2 mr-2">
                                                    <input
                                                        class="w-48 cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary mr-2"
                                                        ref="paymentInput"
                                                        type="file"
                                                        @change="pickPayment"
                                                    />
                                                </span>
                                            </span>
                                            <span
                                                class="flex items-end justify-end"
                                                ><box-icon
                                                    name="paypal"
                                                    type="logo"
                                                    color="oklch(50% 0.134 242.749)"
                                                    class="cursor-pointer hover:scale-115"
                                                    v-for="n in +data.payment ||
                                                    0"
                                                    :key="`payment-${n}`"
                                                    @click="
                                                        showPayment(data.id)
                                                    "
                                                ></box-icon
                                            ></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ข้อความ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <textarea
                                                class="border w-full rounded-md py-1 px-2"
                                                v-model="data.comment"
                                            >
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-2 py-1 text-center"
                                        >
                                            ต้องการใบเสร็จ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <div class="flex items-center">
                                                <input
                                                    type="checkbox"
                                                    id="myCheckbox"
                                                    class="form-checkbox h-4 w-4 text-blue-600 cursor-pointer"
                                                    :checked="slipChk"
                                                    v-model="data.slip"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                        >
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-green-600 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-green-700 sm:ml-2 sm:w-auto"
                                @click="sendData()"
                            >
                                บันทึก
                            </button>
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-red-300 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-red-400 sm:ml-2 sm:w-auto"
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

    <!-- Modal Payment -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalPayment">
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
                                class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-sky-400 hover:border-3 p-4 group mb-2"
                                v-for="(payment, index) in paymentList"
                                :key="index"
                                @click="
                                    linkPayment(
                                        payment.title,
                                        payment.created_at
                                    )
                                "
                            >
                                <span
                                    class="flex items-center jusitfy-center font-semibold text-lg text-[#85c1e9]"
                                >
                                    <box-icon
                                        name="paypal"
                                        type="logo"
                                        color="oklch(50% 0.134 242.749)"
                                        class="cursor-pointer hover:scale-115"
                                    ></box-icon>
                                    : {{ payment.title }}
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

    <!-- Modal Work -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalWork">
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
                                class="relative border-2 border-dashed rounded-xl cursor-pointer hover:border-sky-400 hover:border-3 p-4 group mb-2"
                                v-for="(work, index) in workList"
                                :key="index"
                                @click="
                                    linkWork(work.title, payment.created_at)
                                "
                            >
                                <span
                                    class="flex items-center jusitfy-center font-semibold text-lg text-[#85c1e9]"
                                >
                                    <box-icon
                                        name="file"
                                        color="oklch(50% 0.134 242.749)"
                                        class="cursor-pointer hover:scale-115"
                                    ></box-icon>
                                    : {{ work.title }}
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

    <!-- Modal Cert -->
    <transition name="fade" mode="out-in">
        <div class="relative z-10" v-show="this.modalCert">
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
                                v-for="(cert, index) in certList"
                                :key="index"
                                @click="linkCert(cert.title, cert.created_at)"
                            >
                                <span
                                    class="flex items-center jusitfy-center font-semibold text-lg text-[#85c1e9]"
                                >
                                    <box-icon
                                        name="certification"
                                        color="#ad65d9"
                                        class="cursor-pointer hover:scale-115"
                                    ></box-icon>
                                    : {{ cert.title }}
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
import Datepicker from "vuejs3-datepicker";

export default {
    async mounted() {
        await this.getEvent();
        await this.getEnroll();
    },
    data() {
        return {
            logo: "/img/logo/scb.png",
            pic: "img/profiles/thumbnails/",
            ////////////////////////////////////////////////////////////////
            modalPayment: false,
            modalDetail: false,
            modalEdit: false,
            modalComplete: false,
            modalPayment: false,
            modalWork: false,
            modalCert: false,
            ////////////////////////////////////////////////////////////////
            eventList: [],
            enrollList: [],
            detailList: [],
            completeList: [],
            paymentList: [],
            workList: [],
            certList: [],
            ////////////////////////////////////////////////////////////////
            moment: moment,
            file: null,
            payment: null,
            ////////////////////////////////////////////////////////////////
            data: {
                id: "",
                pay: "",
                tag: "",
                payment: "",
                complete: "",
                submit: "",
                work: "",
                comment: "",
                other: "",
                status: "",
                alert: "",
                filename: "",
                paymentname: "",
                slip: "",
            },
            slipChk: false
        };
    },
    methods: {
        getEvent() {
            axios.get("/api/event").then((response) => {
                this.eventList = response.data;
            });
        },
        getEnroll(page = 1) {
            axios.get("/api/showEnroll?page=" + page).then((response) => {
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
        async showDetail(id) {
            try {
                this.modalDetail = true;
                axios.get("/api/detailEnroll/" + id).then((response) => {
                    this.detailList = response.data[0];
                });
            } catch (error) {}
        },
        async showEdit(id) {
            try {
                this.modalEdit = true;
                axios.get("/api/editEnroll/" + id).then((response) => {
                    this.detailList = response.data[0];

                    this.data.id = id;
                    this.data.pay = response.data[0].pay;
                    this.data.tag = response.data[0].tag;
                    this.data.complete = response.data[0].complete;
                    this.data.other = response.data[0].other;
                    this.data.status = response.data[0].status;
                    this.data.alert = response.data[0].alert;
                    this.data.submit = response.data[0].submit;
                    this.data.payment = response.data[0].payment;
                    this.data.work = response.data[0].work;
                    this.data.comment = response.data[0].comment;
                    this.data.slip = response.data[0].slip;

                    this.slipChk = this.chkSlip(response.data[0].slip)
                });
            } catch (error) {}
        },
        chkSlip(id) {
            if (id !== null && id >= 0) {
                return true;
            } else {
                return false;
            }
        },
        close() {
            // ล้างค่าก่อน (ขณะ element ยังอยู่)
            if (this.$refs.fileInput) this.$refs.fileInput.value = "";
            if (this.$refs.paymentInput) this.$refs.paymentInput.value = "";

            this.file = null;
            this.payment = null;

            this.modalDetail = false;
            this.modalEdit = false;
            this.modalComplete = false;
            this.modalPayment = false;
            this.modalWork = false;
            this.modalCert = false;
        },
        ////////////////////////////////////////////////////////////
        pickFile(event) {
            this.file = event.target.files; // เก็บไฟล์ลงตัวแปร
        },
        pickPayment(event) {
            this.payment = event.target.files; // เก็บไฟล์ลงตัวแปร
        },
        ////////////////////////////////////////////////////////////
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
                    ////////////////////////// Upload Work //////////////////////////////////
                    if (this.file !== null) {
                        let formData = new FormData(); //สร้าง FromData เพื่อรองรับข้อมูลประเภท File
                        formData.append("file", this.file[0]);

                        try {
                            const config = {
                                headers: {
                                    "content-type": "multipart/form-data",
                                },
                            };

                            await axios
                                .post("/api/uploadWork", formData, config)
                                .then((response) => {
                                    this.data.filename = response.data;
                                    this.data.work = (this.data.work || 0) + 1;
                                });
                        } catch (error) {
                            if (
                                error.response &&
                                error.response.status === 422
                            ) {
                                // SweetAlert Error
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Please upload files of the allowed types: DOC, DOCX, XLS, XLSX, PDF only.",
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
                            return; // ⛔ หยุด
                        }
                    }
                    ////////////////////////// Upload Payment //////////////////////////////////
                    if (this.payment !== null) {
                        let formData = new FormData(); //สร้าง FromData เพื่อรองรับข้อมูลประเภท File
                        formData.append("file", this.payment[0]);

                        try {
                            const config = {
                                headers: {
                                    "content-type": "multipart/form-data",
                                },
                            };

                            await axios
                                .post("/api/uploadPayment", formData, config)
                                .then((response) => {
                                    this.data.paymentname = response.data;
                                    this.data.payment =
                                        (this.data.payment || 0) + 1;
                                });
                        } catch (error) {
                            if (
                                error.response &&
                                error.response.status === 422
                            ) {
                                // SweetAlert Error
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Please upload files of the allowed types: JPG, JPEG, PNG only.",
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
                            return; // ⛔ หยุด
                        }
                    }
                    ////////////////////////// Upload Data //////////////////////////////////
                    try {
                        await axios
                            .put("/api/enroll/" + this.data.id, this.data)
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

                        this.getEnroll();
                        this.close();
                    } catch (error) {
                        // SweetAlert Error
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Fail!!. Please Contact to Staff.",
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
        showPayment(id) {
            this.close();

            axios.get("/api/payment/" + id).then((response) => {
                this.paymentList = response.data;

                this.modalPayment = true;
            });
        },
        showWork(id) {
            this.close();

            axios.get("/api/work/" + id).then((response) => {
                this.workList = response.data;

                this.modalWork = true;
            });
        },
        showComplete(id) {
            this.close();

            axios.get("/api/complete/" + id).then((response) => {
                this.completeList = response.data;

                this.modalComplete = true;
            });
        },
        showCert(id) {
            this.close();

            axios.get("/api/cert/" + id).then((response) => {
                this.certList = response.data;

                this.modalCert = true;
            });
        },
        showSlip() {},
        linkPayment(id, code) {
            const url = moment(code).format("YYYY/MM/DD");
            window.open("files/payments/" + url + "/" + id, "_blank");
        },
        linkWork(id, code) {
            const url = moment(code).format("YYYY/MM/DD");
            window.open("files/works/" + url + "/" + id, "_blank");
        },
        linkComplete(id, code) {
            const url = moment(code).format("YYYY/MM/DD");
            window.open("files/completes/" + url + "/" + id, "_blank");
        },
        linkCert(id, code) {
            const url = moment(code).format("YYYY/MM/DD");
            window.open("files/certs/" + url + "/" + id, "_blank");
        },
    },
    components: {
        TailwindPagination,
        Datepicker,
    },
};
</script>
