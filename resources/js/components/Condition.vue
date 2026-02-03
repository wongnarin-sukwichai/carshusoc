<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="detail"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("home.cond")
            }}</span>
        </div>
        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">วิธีการสมัคร :</span>
            <div>
                กรุณาตรวจสอบให้แน่ใจว่าได้ทำการเพิ่มเติมข้อมูลส่วนตัวแล้ว
                หลังจากที่ได้ดำเนินการแล้ว จะมีขั้นตอนในการลงทะเบียนดังนี้:
            </div>
            <ul class="list-disc pl-12 text-md">
                <li>
                    เลือกบริการที่ต้องการ และกดลงทะเบียน
                    (กรณียังไม่เพิ่มเติมข้อมูลส่วนตัว
                    ระบบจะพาไปยังหน้าแก้ไขข้อมูลส่วนตัวก่อน)
                </li>
                <li>
                    ที่เมนู "รายการลงทะเบียน"
                    สามารถตรวจสอบรายการและรายละเอียดทั้งหมดที่ได้ลงทะเบียนไว้ในเมนูนี้
                </li>
                <li>
                    <div class="flex">
                        สามารถชำระเงินค่าบริการผ่านช่องทางออนไลน์
                        โดยใช้แอปพิเคชัน มาที่ :

                        <span class="px-1"
                            ><img :src="logo" class="w-8 h-8 rounded-lg"
                        /></span>
                        ธนาคารไทยพาณิชย์ เลขบัญชี :
                        <span class="font-semibold px-2 text-purple-800"
                            >406-552932-8</span
                        >
                        ชื่อบัญชี : มหาวิทยาลัยมหาสารคาม (เงินรายได้)
                    </div>
                </li>
                <li>
                    แนบไฟล์หลักฐานการโอน - ระบบแสดงสถานะ Active -
                    รอการตรวจสอบเจ้าหน้าที่
                </li>
                <li>
                    ระบบแสดงสถานะ Complete ถือว่าการลงทะเบียนเป็นอันเสร็จสิ้น
                </li>
                <li>
                    หากพบปัญหาสามารถตรวจสอบช่องทางติดต่อเจ้าหน้าที่ได้ที่เมนู
                    "หน้าแรก" -> "รายการ" -> "รายละเอียด"
                </li>
            </ul>
        </div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">หลักฐานที่ต้องแสดงในวันสอบ :</span>
            <div class="flex overflow-x-auto items-center justify-center">
                <table
                    class="table-auto w-1/2 border border-gray-300 text-sm text-left text-gray-700"
                >
                    <thead class="bg-gray-100 text-center">
                        <tr>
                            <th
                                colspan="2"
                                class="border border-gray-300 px-4 py-2 col-span-2"
                            >
                                สำหรับผู้เข้าสอบสัญชาติไทย
                            </th>
                        </tr>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">
                                ประเภทของผู้เข้าสอบ
                            </th>
                            <th class="border border-gray-300 px-4 py-2">
                                หลักฐานที่ต้องแสดงในวันสอบ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                1. นิสิต/นักศึกษาทุกระดับ
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                บัตรประจำตัวประชาชนไทย หรือ <br />
                                บัตรประจำตัวนิสิต/นักศึกษา หรือ <br />
                                ใบขับขี่สมาร์ตการ์ดไทย (บัตรแข็ง) หรือ <br />
                                หนังสือเดินทางไทย (Passport) หรือ <br />
                                บัตรที่ออกโดยหน่วยงานราชการที่มีรูปถ่าย <br />
                                และหมายเลขประชาชน
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">
                                2. บุคลากร มมส
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                บัตรประจำตัวประชาชนไทย หรือ บัตรประจำตัวพนักงาน
                                <br />
                                หรือ ใบขับขี่สมาร์ตการ์ดไทย (บัตรแข็ง) หรือ
                                <br />
                                หนังสือเดินทางไทย (Passport) หรือ <br />
                                บัตรที่ออกโดยหน่วยงานราชการที่มีรูปถ่าย <br />
                                และหมายเลขประชาชน
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">
                                3. บุคคลทั่วไป
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                บัตรประจำตัวประชาชนไทย หรือ <br />
                                ใบขับขี่สมาร์ตการ์ดไทย (บัตรแข็ง) หรือ <br />
                                หนังสือเดินทางไทย (Passport) หรือ <br />
                                บัตรที่ออกโดยหน่วยงานราชการที่มีรูปถ่าย <br />
                                และหมายเลขประชาชน
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex overflow-x-auto items-center justify-center mt-4">
                <table
                    class="table-auto w-1/2 border border-gray-300 text-sm text-left text-gray-700"
                >
                    <thead class="bg-gray-100 text-center">
                        <tr>
                            <th
                                colspan="2"
                                class="border border-gray-300 px-4 py-2 col-span-2"
                            >
                                สำหรับผู้ที่มิได้ถือสัญชาติไทย
                            </th>
                        </tr>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">
                                ประเภทของผู้เข้าสอบ
                            </th>
                            <th class="border border-gray-300 px-4 py-2">
                                หลักฐานที่ต้องแสดงในวันสอบ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                1. นิสิต/นักศึกษาทุกระดับ <br />
                                2. บุคลากร มมส <br />
                                3. บุคคลทั่วไป
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                หนังสือเดินทางไทย (Passport) หรือ <br />
                                บัตรประจำตัวพนักงานขององค์กรที่ใช้สิทธิ์สอบที่
                                มีรูปถ่าย หรือ <br />
                                บัตรประจำตัวนิสิต/นักศึกษาที่มีรูปถ่าย
                            </td>
                        </tr>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {},
    data() {
        return {
            logo: "/img/logo/scb.png",
        };
    },
};
</script>
