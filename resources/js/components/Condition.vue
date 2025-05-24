<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
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
                ผู้สมัครต้องลงทะเบียนสมัครสอบทางอินเทอร์เน็ต
                ในช่วงระยะเวลาที่เปิดให้ลงทะเบียนของแต่ละรอบเท่านั้น
                หลังจากที่ผู้สมัครลงทะเบียนถึงขั้นตอนสุดท้าย:
            </div>
            <ul class="list-disc pl-12">
                <li>
                    <div class="flex">
                        ผู้สมัครสามารถชำระเงินผ่านช่องทางออนไลน์ ผ่านการสแกน QR
                        Code โดยใช้ App ธนาคารพาณิชย์
                        <span class="px-4"
                            ><img :src="logo" class="w-8 h-8 rounded-lg"
                        /></span>
                        หรือกรอกข้อมูลบัตรเครดิตหรือเดบิตของผู้สมัคร
                    </div>
                </li>
                <li>
                    เลือกให้ระบบสร้างใบลงทะเบียนให้ผู้สมัคร
                    เพื่อนำไปจ่ายที่ธนาคารและร้านค้าตามที่กำหนดในใบชำระเงิน
                    ซึ่งเครื่องคอมพิวเตอร์ที่ผู้สมัครใช้ลงทะเบียน
                    ควรต่อเครื่องพรินเตอร์ให้พร้อม
                </li>
                <li>
                    ผู้สมัครต้องทำการพิมพ์ใบลงทะเบียน
                    เพื่อใช้เป็นเอกสารประกอบการชำระค่าธรรมเนียมการสมัครตามช่องทางการชำระเงินที่ปรากฏในใบลงทะเบียน
                    ก่อนหรือภายในวันที่ที่ระบุไว้บนใบลงทะเบียน
                </li>
                <li>
                    การสมัครจะถือว่าเสร็จสิ้นสมบูรณ์เมื่อผู้สมัครลงทะเบียนถูกต้องและชำระเงินเรียบร้อยแล้ว
                </li>
            </ul>
        </div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">ใบลงทะเบียน :</span>
            <div>
                หลังจากที่ผู้สมัครลงทะเบียนถูกต้องแล้วระบบจะสร้างใบลงทะเบียน
                ซึ่งประกอบด้วย 3 ส่วน ดังนี้
            </div>
            <ul class="list-disc pl-12">
                <li>
                    ส่วนที่ 1 แสดงศูนย์สอบที่ผู้สมัครเลือก
                    และค่าธรรมเนียมที่ต้องชำระ
                </li>
                <li>
                    ส่วนที่ 2 เป็นหลักฐานการชำระเงินของผู้สมัคร
                    หลังจากที่ผู้สมัครชำระค่าธรรมเนียมที่ธนาคารเรียบร้อยแล้ว
                    เจ้าหน้าที่ธนาคารจะประทับตราธนาคารเพื่อเป็นหลักฐานการรับเงิน
                    ผู้สมัครสามารถใช้ส่วนที่ 2 นี้เป็นใบเสร็จรับเงินชั่วคราวได้
                    แต่ยังไม่ถือเป็นใบเสร็จรับเงินที่ถูกต้องตามกฎหมาย ภายใน 1
                    สัปดาห์ก่อนวันสอบ ให้ตรวจสอบสถานที่จากระบบออนไลน์
                </li>
                <li>
                    ส่วนที่ 3 เป็นหลักฐานการรับเงินของธนาคาร
                    ซึ่งเจ้าหน้าที่ธนาคารจะฉีกส่วนนี้เก็บไว้
                </li>
            </ul>
        </div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold"
                >ศูนย์ทดสอบฯคิดค่าธรรมเนียมการสมัครดังนี้ :</span
            >
            <div class="grid grid-cols-3 gap-2">
                <ul class="list-disc pl-12 space-y-1 text-gray-800">
                    <li>
                        <div class="flex justify-between">
                            <span>CU-AAT</span> <span>1,300 บาท</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex justify-between">
                            <span>CU-ATS</span> <span>1,000 บาท</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex justify-between">
                            <span>CU-TAD</span> <span>1,200 บาท</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex justify-between">
                            <span>CU-SSEPT</span> <span>500 บาท</span>
                        </div>
                    </li>
                </ul>
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
