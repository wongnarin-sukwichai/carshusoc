<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Upload Mail</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body style="font-family: Popins, sans-serif; background-color:#f8f9fa; padding:20px;">

    <!-- กล่องข้อความหลัก -->
    <div
        style="background-color:#ffffff; border-radius:8px; padding:30px; max-width:600px; margin:0 auto; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <!-- โลโก้ตรงกลาง -->
        <div style="text-align:center;">
            <img src="https://carshusoc.com/img/logo/logo.png" alt="Logo" width="30%" style="display:block; margin:0 auto;">
        </div>

        <!-- ข้อความต้อนรับ -->
        <h2 style="text-align:center; color:#333; margin-top:0%; font-weight: bold;">ได้รับเอกสาร</h2>
        <p style="text-align:left; font-size:15px; color:#555;">
            เรื่อง แจ้งการรับเอกสาร
        </p>
        <p style="text-left:center; font-size:15px; color:#555;">
            เรียน คุณ <span style="font-weight: bold;">{{ $name }}</span>
        </p>
        <p style="text-indent: 2em; text-left:center; font-size:15px; color:#555;">
            ทางศูนย์บริการวิชาการและวิจัย (CARS-HUSOC) คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม
        </p>
         <p style="text-indent: 2em; text-left:center; font-size:15px; color:#555;">
            ขอเรียนให้ทราบว่า ทางเราได้รับเอกสารจากท่านแล้ว ในการนี้ จะดำเนินการประเมินราคา พร้อมแจ้งผลให้ท่านทราบในลำดับต่อไป 
        </p>
        <p style="text-left:center; font-size:15px; color:#555;">
            ศูนย์บริการวิชาการและวิจัย (CARS-HUSOC)
        </p>
        <p style="text-left:center; font-size:15px; color:#555;">
            คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม
        </p>

        <br>
        <hr style="border:2px dashed oklch(92.9% 0.013 255.508)">

        <!-- ข้อความติดต่อ -->
        <div style="text-align:center; margin-top:20px; font-size:13px; color:#777;">

            <p>หากท่านมีคำถามหรือต้องการสอบถามเพิ่มเติม กรุณาติดต่อเราได้ที่ </p>
        </div>
        <div style="text-align:center; margin-bottom:20px; font-size:13px; color:#777;">

            <p>If you have any questions, please contact us at</p>
        </div>

        <div style="text-align:left; margin-top:20px; font-size:13px; color:#777;">

            <ul>
                <li><span style="font-weight:bold;">Email : </span><a
                        href="mailto:carhusocmsu@gmail.com">carhusocmsu@gmail.com</a></li>
                <li><span style="font-weight:bold;">Facebook : </span><a
                        href="https://www.facebook.com/profile.php?id=100074729420796">
                        https://www.facebook.com/profile.php?id=100074729420796</a></li>
                <li><span style="font-weight:bold;">Website : </span><a
                        href="https://human.msu.ac.th/">https://human.msu.ac.th/</a>
                </li>
                <li><span style="font-weight:bold;">Tel : </span>043-754-369 ต่อ 4734, 4703</li>
            </ul>
        </div>
    </div>


</body>

</html>
