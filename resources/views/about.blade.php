@php
    $locale = app()->getLocale(); //เก็บตัวแปรว่าเลือกภาษาอะไร
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CARS-HUSOC | Centre for Academic and Research Services, Faculty of Humanities and Social Sciences</title>

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <!-- Alpine -->
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Custom style -->
    <link rel="stylesheet" href="css/skilline.css" />
    <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- ตรวจสอบ Locale -->
    @if ($locale === 'th')
        <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@400;500;600;700&display=swap"
            rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
            rel="stylesheet">
    @endif

    <style>
        html {
            scroll-behavior: smooth;
        }

        .font-thai {
            font-family: 'Anuphan';
        }

        .font-english {
            font-family: 'Poppins';
        }

        .header {
            background-color: #e8a9d3;
            text-align: center;
            padding: 20px;
            border-radius: 6px;
        }

        h2 {
            font-weight: bold;
        }

        .header h2 {
            margin: 0;
            font-weight: bold;
        }

        .header h3 {
            margin: 5px 0 0;
            font-weight: normal;
        }

        .content {
            margin-top: 20px;
        }

        ol {
            counter-reset: item;
            margin-left: 30px;
            padding-left: 2%;
        }

        ol li {
            display: block;
            margin-bottom: 6px;
        }

        ol li::before {
            content: counters(item, ".") ". ";
            counter-increment: item;
        }

        td {
            padding: 3px 5px;
            vertical-align: top;
        }

        td.number {
            width: 40px;
            text-align: right;
        }

        td.name {
            width: 60%;
            padding-left: 10px;
        }

        td.role {
            width: 35%;
            text-align: left;
        }
    </style>

</head>

<body class="{{ $locale === 'th' ? 'font-thai' : 'font-english' }}"> <!-- ตรวจสอบ Locale เพื่อแสดง Font -->
    <!-- navbar -->
    <div x-data="{ open: false }" class="w-full text-gray-700 bg-cream">
        <div class="flex flex-col max-w-screen-xl px-8 mx-auto md:items-center md:justify-between md:flex-row">
            <div class="flex flex-row items-center justify-between py-6">
                <div class="relative">
                    <a href="/">
                        <img src="{{ url('img/logo/logo-rm.png') }}"
                            class="w-24 h-24 cursor-pointer transform transition hover:scale-110" />
                    </a>
                </div>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'transform md:transform-none': !open, 'h-full': open }"
                class="h-0 md:h-auto flex flex-col flex-grow md:items-center pb-4 md:pb-0 md:flex md:justify-end md:flex-row origin-top duration-300 scale-y-0 mb-12">
                <a class="px-4 py-2 mt-2 text-sm bg-transparent rounded-lg md:mt-8 md:ml-4 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-110"
                    href="{{ url('/') }}">@lang('messages.home')</a>
                <a class="px-4 py-2 mt-2 text-sm bg-transparent rounded-lg md:mt-8 md:ml-4 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-110"
                    href="#">@lang('messages.about')</a>
                {{-- <a class="px-4 py-2 mt-2 text-sm bg-transparent rounded-lg md:mt-8 md:ml-4 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-110"
                    href="#">@lang('messages.info')</a> --}}
                <a class="px-4 py-2 mt-2 text-sm bg-transparent rounded-lg md:mt-8 md:ml-4 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-110"
                    href="#footer">@lang('messages.contact')</a>
                <a class="px-10 py-3 mt-2 text-sm text-center bg-white text-gray-800 rounded-full md:mt-8 md:ml-4 transform transition hover:scale-110"
                    href="{{ url('/login') }}">@lang('messages.login')</a>
                <a class="px-10 py-3 mt-2 text-sm text-center bg-yellow-500 text-white rounded-full md:mt-8 md:ml-4 transform transition hover:scale-110"
                    href="{{ url('/register') }}">@lang('messages.regis')</a>
                <div class="mt-4">
                    <a class="px-2 py-2 mt-2 md:ml-4 text-sm md:border-r md:border-gray-400 hover:text-blue-500"
                        href="{{ url('/lang/th') }}">TH</a>
                    <a class="px-2 py-2 mt-2 text-sm hover:text-blue-500" href="{{ url('/lang/en') }}">EN</a>
                </div>
            </nav>
        </div>
    </div>
    <div class="bg-cream">

        <!--Left Col-->
        <div
            class="flex flex-col w-full lg:w-6/12 justify-center lg:pt-24 items-start text-center lg:text-left mb-5 md:mb-0">
        </div>

        <div class="text-white -mt-14 sm:-mt-24 lg:-mt-36 z-40 relative">
            <svg class="xl:h-40 xl:w-full" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z"
                    fill="currentColor"></path>
            </svg>
            <div class="bg-white w-full h-10 -mt-px"></div>
        </div>
    </div>

    <!-- container -->
    <div class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden">
        <div class="header">
            <h2>ศูนย์บริการวิชาการและวิจัยคณะมนุษยศาสตร์และสังคมศาสตร์</h2>
            <h3>Centre for Academic and Research <u>Services</u>,<br>
                Faculty of Humanities and Social Sciences (CARS-HUSOC)</h3>
        </div>
        <br>
        <div class="content">
            <p><span class="font-semibold">ชื่อศูนย์ : </span>
                ศูนย์บริการวิชาการและวิจัย คณะมนุษยศาสตร์และสังคมศาสตร์
                Centre for Academic and Research Services,
                Faculty of Humanities and Social Sciences (CARS-HUSOC)
            </p>
            <br>
            <p><span class="font-semibold">วัตถุประสงค์ :</span>
            <ol class="s">
                <li>เพื่อให้บริการวิชาการแก่สังคมที่สร้างคุณค่าและมูลค่าเพิ่มต่อคณะ โดยจำแนกเป็น 6 ศูนย์ ดังนี้
                    <ol>
                        <li>ศูนย์ภาษาและวัฒนธรรมอาเซียน</li>
                        <li>ศูนย์ภาษาไทยในฐานะภาษาต่างประเทศ</li>
                        <li>ศูนย์การแปลและการล่าม</li>
                        <li>ศูนย์ทดสอบภาษาอังกฤษ</li>
                        <li>ศูนย์ฝึกอบรมวิชาการและวิชาชีพ</li>
                        <li>ศูนย์อีสานศึกษาและพัฒนาสังคม</li>
                    </ol>
                </li>
                <li>เพื่อสร้างและสนับสนุนบริการวิชาการและวิจัยที่สอดคล้องกับความต้องการของชุมชนที่มีคุณภาพและมีมาตรฐาน
                </li>
                <li>เพื่อถ่ายทอดองค์ความรู้ทางวิชาการสู่ชุมชนระดับท้องถิ่น ภูมิภาคและประเทศอย่างเหมาะสม</li>
            </ol>
        </div>
        <br>

        <!-- คณะกรรมการ -->
        <div class="header">
            <h2>คณะกรรมการศูนย์บริการวิชาการและวิจัย คณะมนุษยศาสตร์และสังคมศาสตร์</h2>
        </div>
        <br>
        <h2>คณะกรรมการอำนวยการ</h2>
        <table>
            <tr>
                <td class="number">1.</td>
                <td class="name">คณบดีคณะมนุษยศาสตร์และสังคมศาสตร์</td>
                <td class="role">ประธานคณะกรรมการ</td>
            </tr>
            <tr>
                <td class="number">2.</td>
                <td class="name">รองคณบดีฝ่ายบริหารและโครงสร้างพื้นฐาน</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">3.</td>
                <td class="name">รองคณบดีฝ่ายวิชาการและประกันคุณภาพการศึกษา</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">4.</td>
                <td class="name">รองคณบดีฝ่ายกิจการต่างประเทศและประชาสัมพันธ์</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">5.</td>
                <td class="name">รองคณบดีฝ่ายพัฒนานิสิตและศิษย์เก่าสัมพันธ์</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">6.</td>
                <td class="name">รองคณบดีฝ่ายวิจัยและบัณฑิตศึกษา</td>
                <td class="role">กรรมการและเลขานุการ</td>
            </tr>
        </table>
        <br>
        <h2>คณะกรรมการดำเนินงาน</h2>
        <table>
            <tr>
                <td class="number">1.</td>
                <td class="name">รองคณบดีฝ่ายวิจัยและบัณฑิตศึกษา</td>
                <td class="role">ประธานคณะกรรมการ</td>
            </tr>
            <tr>
                <td class="number">2.</td>
                <td class="name">รองศาสตราจารย์ ดร.นิศยา วรรณเกิดีร์</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">3.</td>
                <td class="name">รองศาสตราจารย์ ดร.ธีระ รุ่งธีระ</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">4.</td>
                <td class="name">ผู้ช่วยศาสตราจารย์ ดร.ราณีย์ นิวรกรรมาภา</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">5.</td>
                <td class="name">อาจารย์นิรันดร์ คำหนู</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">6.</td>
                <td class="name">อาจารย์อีบอร เลือนประเสริฐกุล</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">7.</td>
                <td class="name">อาจารย์ ดร.อรรถพล ศรีประเสริฐ</td>
                <td class="role">กรรมการ</td>
            </tr>
            <tr>
                <td class="number">8.</td>
                <td class="name">อาจารย์ปภาวินท์ วรหัน</td>
                <td class="role">กรรมการและเลขานุการ</td>
            </tr>
            <tr>
                <td class="number">9.</td>
                <td class="name">นางสาวจุฬารักษ์ ขอนสี</td>
                <td class="role">กรรมการและเลขานุการ</td>
            </tr>
            <tr>
                <td class="number">10.</td>
                <td class="name">นางสาวสุกัลยาณ์ คำดี</td>
                <td class="role">กรรมการและเลขานุการ</td>
            </tr>
        </table>

    </div>
    <!-- .container -->

    <footer id="footer" class="mt-32" style="background-color: rgba(37, 38, 65, 1);">
        <div class=" mx-auto">
            <div class="grid grid-cols-6 gap-4 mx-32 text-left">
                <div class="mt-8">
                    <p class="font-under text-xl text-white">หน่วยงานภายใน</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <ul class="mt-4 text-gray-400 text-sm">
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://plan.msu.ac.th/" target="_blank">กองแผนงาน</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://pd.msu.ac.th/pd7/" target="_blank">กองการเจ้าหน้าที่</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://sa.msu.ac.th/" target="_blank">กองกิจการนิสิต</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://fin.msu.ac.th/" target="_blank">กองคลังและพัสดุ</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://acad.msu.ac.th/th/" target="_blank">กองบริการศึกษา</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://grad.msu.ac.th/th/" target="_blank">บัณฑิตวิทยาลัย</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://library.msu.ac.th/" target="_blank">สำนักงานวิทยบริการ</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://cc.msu.ac.th/" target="_blank">สำนักคอมพิวเตอร์</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://genedu.msu.ac.th/thai/" target="_blank">สำนักศึกษาทั่วไป</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-8">
                    <p class="font-under text-xl text-white">หน่วยงานภายนอก</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <ul class="mt-4 text-gray-400 text-sm">
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://www.nrct.go.th/" target="_blank">สำนักงานการวิจัยแห่งชาติ (วช.)</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="https://www.mhesi.go.th/" target="_blank">กระทรวงการอุดมศึกษา วิทยาศาสตร์
                                วิจัยและนวัตกรรม (อว.)</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-8">
                    <p class="font-under text-xl text-white">เมนูหลัก</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <ul class="mt-4 text-gray-400 text-sm">
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="/">หน้าแรก</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="/about">เกี่ยวกับ</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="/login">เข้าสู่ระบบ</a>
                        </li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            <a href="/register"> สมัครสมาชิก</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 col-span-2">
                    <p class="font-under text-xl text-white">ศูนย์บริการวิชาการและวิจัย (CARS-HUSOC)</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <p class="text-left mt-4 text-gray-400 text-sm">
                        ศูนย์บริการวิชาการและวิจัย (CARS-HUSOC)
                        <br>
                        คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม
                        <br>
                        ตำบลขามเรียง อำเภอกันทรวิชัย จังหวัดมหาสารคาม
                        <br>
                        รหัสไปรษณีย์ 44150
                        <br><br>
                        โทรศัพท์ : 043-754-369
                        <br>
                        เบอร์ภายใน : 4804
                        <br>
                        มือถือ : 089-710-4115
                        <br>
                        E-mail : carhusocmsu@gmail.com
                    </p>
                </div>
                <div class="mt-8">
                    <p class="font-under text-xl text-white">ผู้ดูแล</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <p class="text-left mt-4 text-gray-400 text-sm">
                        ผู้ดูแลเว็บไซต์ : วงศ์นรินทร์ สุขวิชัย<br>
                        E-mail : wongnarin.s.s@msu.ac.th<br>
                        เบอร์โทรศัพท์ :
                        <br><br>
                    <div class="flex space-x-1 text-sm">
                        <span class="bg-black text-white px-1 py-1 rounded">1</span>
                        <span class="bg-black text-white px-1 py-1 rounded">3</span>
                        <span class="bg-black text-white px-1 py-1 rounded">7</span>
                        <span class="bg-black text-white px-1 py-1 rounded">5</span>
                        <span class="bg-black text-white px-1 py-1 rounded">8</span>
                        <span class="bg-black text-white px-1 py-1 rounded">7</span>
                    </div>
                    </p>
                </div>
            </div>
            <hr class="mx-32 border border-dashed border-gray-600 my-4">
            <div class="text-center text-white">
                <p class="my-3 text-gray-400 text-sm">&copy; 2025 CARS-HUSOC : Centre for Academic and Research
                    Services, Faculty of Humanities and Social Sciences. </p>
                <div class="py-1 tracking-wide">
                </div>
            </div>
        </div>
    </footer>

    <button id="backToTopBtn"
        class="fixed bottom-6 right-6 bg-gray-700 text-white p-3 rounded-full shadow-lg hover:bg-gray-900 transition hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <!-- AOS init -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- Scroll Top -->
    <script>
        window.addEventListener("scroll", function() {
            const btn = document.getElementById("backToTopBtn");
            if (window.scrollY > 200) {
                btn.classList.remove("hidden");
            } else {
                btn.classList.add("hidden");
            }
        });
        document.getElementById("backToTopBtn").addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

</html>
