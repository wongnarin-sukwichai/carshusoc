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
                $t("detail.detail")
            }}</span>
        </div>
        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">ชื่อศูนย์ :</span>
            ศูนย์ภาษาและวัฒนธรรมอาเซียน (ASEAN Language and Culture Centre)
        </div>
        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">วัตถุประสงค์ :</span>
            <ul class="list-disc pl-12">
                <li>
                    เพื่อรวบรวมข้อมูลเอกสารงานวิจัย ข้อมูลสื่อสารสนเทศรูปแบบต่าง
                    ๆ และสร้างฐานข้อมูลเกี่ยวกับภาษาและวัฒนธรรมอาเซียน
                </li>
                <li>
                    เพื่อดำเนินการวิจัย งานวิชาการ การประชุมสัมมนา
                    และเผยแพร่องค์ความรู้เกี่ยวกับภาษาและวัฒนธรรมอาเซียน
                </li>
                <li>เพื่อจัดอบรมความรู้ ทักษะภาษาและวัฒนธรรมอาเซียน</li>
                <li>
                    เพื่อเป็นศูนย์สอบวัดระดับภาษาอาเซียน
                    และผลิตสื่อการเรียนการสอนด้านภาษาและวัฒนธรรมอาเซียน
                </li>
                <li>
                    เพื่อสร้างความร่วมมือด้านการแลกเปลี่ยนบุคลากรและนักศึกษาในกลุ่มเครือข่ายประเทศอาเซียน
                </li>
            </ul>
        </div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">พันธกิจ :</span>
            <ul class="list-disc pl-12">
                <li>การวิจัยและงานวิชาการ</li>
                <li>การบริการวิชาการ</li>
                <li>การสร้างเครือข่ายความร่วมมือ</li>
                <li>การสื่อสาร</li>
            </ul>
        </div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">ขอบเขตการดำเนินงาน:</span>
            <ul class="list-disc pl-12">
                <li>ด้านการวิจัยและงานวิชาการ</li>
                <li>ด้านการบริการวิชาการ</li>
                <li>สร้างเครือข่ายความร่วมมือกับหน่วยงานทั้งภายในและภายนอกประเทศ</li>
                <li>สื่อสารภาพลักษณ์องค์กร</li>
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
