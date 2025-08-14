<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
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
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="showAlert"
                                    class="text-rose-300 text-sm py-3 mr-2"
                                    >** Required --></span
                                ></transition
                            >
                            <input
                                type="text"
                                id="default-search"
                                class="block w-80 h-11 pr-5 pl-12 py-2.5 text-sm font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none text-right"
                                placeholder="ชื่อ หรือ นามสกุล"
                                v-model="this.searchData.search"
                            />
                            <button
                                class="flex items-center justify-center rounded-full p-2 ml-2 bg-sky-300 hover:bg-sky-400"
                                @click="search()"
                            >
                                <box-icon
                                    name="search-alt"
                                    size="sm"
                                    color="white"
                                ></box-icon>
                            </button>
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
                                                        User
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
                                                        Budget
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Postage
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
                                                        File
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
                                                            class="font-semibold text-sm text-gray-900"
                                                        >
                                                            {{
                                                                enroll.section_title
                                                            }}
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
                                                        {{
                                                            Number(
                                                                enroll.pay +
                                                                    enroll.tag
                                                            ).toLocaleString()
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <box-icon
                                                            name="check"
                                                            color="white"
                                                            class="rounded-full bg-lime-400"
                                                            v-if="
                                                                enroll.tag !==
                                                                null
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                    <td
                                                        class="p-4.5 text-xs leading-6 font-medium text-gray-900 break-words whitespace-normal"
                                                    >
                                                        <box-icon
                                                            type="logo"
                                                            name="paypal"
                                                            color="oklch(50% 0.134 242.749)"
                                                            class="cursor-pointer hover:scale-120"
                                                            v-if="
                                                                enroll.total !==
                                                                null
                                                            "
                                                            @click="
                                                                showPayment(
                                                                    enroll.id
                                                                )
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                    <td
                                                        class="p-4.5 text-xs leading-6 font-medium text-gray-900 break-words whitespace-normal"
                                                    >
                                                        <box-icon
                                                            name="file"
                                                            color="oklch(50% 0.134 242.749)"
                                                            class="cursor-pointer hover:scale-120"
                                                            v-if="
                                                                enroll.total !==
                                                                null
                                                            "
                                                            @click="
                                                                showFile(
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
                    class="py-1.5 px-2.5 bg-gray-50 rounded-full flex items-center justify-center w-20 text-xs text-gray-600 mb-2"
                    >Finished</span
                >
                <span class="py-1 ml-2 text-sm text-gray-700 font-semibold"
                    >: เสร็จสิ้นการสอบ/อบรม/ส่งงาน</span
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
                                                {{
                                                    setMoment(detailList.start)
                                                }}
                                                <span class="px-1 font-semibold"
                                                    >-</span
                                                >
                                                {{ setMoment(detailList.end) }}
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
                                                {{ detailList.meet }}
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
                                            {{ detailList.section_other }}
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
                                            {{
                                                Number(
                                                    detailList.pay +
                                                        detailList.tag
                                                ).toLocaleString()
                                            }}
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
                                            {{
                                                Number(
                                                    detailList.pay +
                                                        detailList.tag
                                                ).toLocaleString()
                                            }}
                                        </td>
                                    </tr>
                                    <template v-if="detailList.event_id !== 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เอกสารแล้วเสร็จ
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ detailList.complete }}
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
                                    <tr>
                                        <td
                                            colspan="2"
                                            class="px-2 py-1 bg-gray-100"
                                        ></td>
                                    </tr>
                                    <template v-if="detailList.event_id !== 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                กำหนดวันรับงาน
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ detailList.submit }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ไฟล์ส่งเอกสาร
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <box-icon
                                                    name="file"
                                                    color="oklch(50% 0.134 242.749)"
                                                    class="cursor-pointer hover:scale-120"
                                                    v-if="
                                                        detailList.total !==
                                                        null
                                                    "
                                                    @click="
                                                        showFile(detailList.id)
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
                                                v-if="detailList.total !== null"
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
                                                {{
                                                    setMoment(detailList.start)
                                                }}
                                                <span class="px-1 font-semibold"
                                                    >-</span
                                                >
                                                {{ setMoment(detailList.end) }}
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
                                                {{ detailList.meet }}
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
                                            {{ detailList.section_other }}
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
                                            ค่าบริการที่ต้องชำระ
                                        </td>
                                        <td
                                            class="border border-gray-300 px-4 py-1"
                                        >
                                            <input
                                                type="number"
                                                class="border rounded-sm pl-2 py-0.5"
                                                v-model="data.pay"
                                            />
                                        </td>
                                    </tr>
                                    <template v-if="detailList.event_id !== 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                เอกสารแล้วเสร็จ
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <label
                                                >
                                                    <box-icon
                                                        name="cloud-upload"
                                                        color="oklch(78.9% 0.154 211.53)"
                                                        class="cursor-pointer hover:scale-115"
                                                    ></box-icon>
                                                    <input
                                                        type="file"
                                                        @click="uploadFile()"
                                                        hidden
                                                    />
                                                </label>
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
                                            <textarea
                                                class="border w-full"
                                                v-model="data.other"
                                            >
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            colspan="2"
                                            class="px-2 py-1 bg-gray-100"
                                        ></td>
                                    </tr>
                                    <template v-if="detailList.event_id !== 3">
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                กำหนดวันรับงาน
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                {{ detailList.submit }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="border border-gray-300 px-2 py-1 text-center"
                                            >
                                                ไฟล์ส่งเอกสาร
                                            </td>
                                            <td
                                                class="border border-gray-300 px-4 py-1"
                                            >
                                                <box-icon
                                                    name="file"
                                                    color="oklch(50% 0.134 242.749)"
                                                    class="cursor-pointer hover:scale-120"
                                                    v-if="
                                                        detailList.total !==
                                                        null
                                                    "
                                                    @click="
                                                        showFile(detailList.id)
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
                                                v-if="detailList.total !== null"
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
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                        >
                            <button
                                type="button"
                                class="inline-flex w-full justify-center rounded-lg bg-green-600 px-3 py-1.5 text-sm text-white shadow-xs hover:bg-green-700 sm:ml-2 sm:w-auto"
                                @click="close()"
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
</template>

<script>
import axios from "axios";
import { TailwindPagination } from "laravel-vue-pagination";
import moment from "moment";

export default {
    async mounted() {
        await this.getEvent();
        await this.getEnroll();
    },
    data() {
        return {
            pic: "img/profiles/thumbnails/",
            showAlert: false,
            modalPayment: false,
            modalDetail: false,
            modalEdit: false,
            ////////////////////////////////////////////////////////////////
            enrollList: [],
            detailList: [],
            ////////////////////////////////////////////////////////////////
            searchData: {
                search: "",
            },
            data: {
                submit: "",
                pay: "",
                tag: "",
                complete: "",
                other: "",
                status: "",
                alert: "",
            },
            ////////////////////////////////////////////////////////////////
        };
    },
    methods: {
        ////////////////////////////////////////////////////////////////
        getEvent() {
            axios.get("/api/event").then((response) => {
                this.eventList = response.data;
            });
        },
        getEnroll(page = 1) {
            axios.get("/api/enroll?page=" + page).then((response) => {
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
        search(page = 1) {
            this.showAlert = false;

            if (this.searchData.search === "") {
                this.showAlert = true;
                this.getEnroll();
            } else {
                axios
                    .post("/api/searchEnroll?page=" + page, this.searchData)
                    .then((response) => {
                        this.enrollList = response.data;
                    });
            }
        },
        showPayment(id) {},
        showDetail(id) {
            this.modalDetail = true;
            axios.get("/api/enroll/" + id).then((response) => {
                this.detailList = response.data[0];
            });
        },
        showEdit(id) {
            this.modalEdit = true;
            axios.get("/api/enroll/" + id + "/edit").then((response) => {
                this.detailList = response.data[0];

                this.data.pay = response.data[0].pay;
                this.data.postage = response.data[0].postage;
                this.data.complete = response.data[0].complete;
                this.data.other = response.data[0].other;
                this.data.status = response.data[0].status;
                this.data.alert = response.data[0].alert;
            });
        },
        close() {
            this.modalDetail = false;
            this.modalEdit = false;
        },
    },
    components: {
        TailwindPagination,
    },
};
</script>
