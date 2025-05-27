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
        .font-thai {
            font-family: 'Anuphan';
        }

        .font-english {
            font-family: 'Poppins';
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
                <a class="px-4 py-2 mt-2 text-sm bg-transparent rounded-lg md:mt-8 md:ml-4 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-110"
                    href="#">@lang('messages.info')</a>
                <a class="px-4 py-2 mt-2 text-sm bg-transparent rounded-lg md:mt-8 md:ml-4 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-110"
                    href="#">@lang('messages.contact')</a>
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
        <div class="max-w-screen-xl px-8 mx-auto flex flex-col lg:flex-row items-start">
            <!--Left Col-->
            <div
                class="flex flex-col w-full lg:w-6/12 justify-center lg:pt-24 items-start text-center lg:text-left mb-5 md:mb-0">
                <h1 data-aos="fade-right" data-aos-once="true"
                    class="my-4 text-5xl font-bold leading-tight text-darken">
                    <span class="text-yellow-500">CARS-HUSOC</span> @lang('messages.cars')
                </h1>
                <p data-aos="fade-down" data-aos-once="true" data-aos-delay="300" class="leading-normal mb-8">
                    @lang('messages.husoc')
                </p>
                <div data-aos="fade-up" data-aos-once="true" data-aos-delay="700"
                    class="w-full md:flex items-center justify-center lg:justify-start md:space-x-5">
                    <button
                        class="lg:mx-0 bg-yellow-500 text-white text-xl font-bold rounded-full py-4 px-9 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
                        Join for free
                    </button>
                    <div
                        class="flex items-center justify-center space-x-3 mt-5 md:mt-0 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
                        <button class="bg-white w-14 h-14 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 ml-2" viewBox="0 0 24 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z"
                                    fill="#23BDEE" />
                            </svg>
                        </button>
                        <span class="cursor-pointer">Watch how it works</span>
                    </div>
                </div>
            </div>
            <!--Right Col-->
            <div class="w-full lg:w-6/12 lg:-mt-10 relative" id="girl">
                <img data-aos="fade-up" data-aos-once="true" class="w-10/12 mx-auto 2xl:-mb-20" src="img/girl.png" />
                <!-- calendar -->
                <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true"
                    class="absolute top-20 -left-6 sm:top-32 sm:left-10 md:top-40 md:left-16 lg:-left-0 lg:top-52 floating-4">
                    <img class="bg-white bg-opacity-80 rounded-lg h-12 sm:h-16" src="img/calendar.svg">
                </div>
                <!-- red -->
                <div data-aos="fade-up" data-aos-delay="400" data-aos-once="true"
                    class="absolute top-20 right-10 sm:right-24 sm:top-28 md:top-36 md:right-32 lg:top-32 lg:right-16 floating">
                    <svg class="h-16 sm:h-24" viewBox="0 0 149 149" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                            <rect x="40" y="32" width="69" height="69" rx="14" fill="#F3627C" />
                        </g>
                        <rect x="51.35" y="44.075" width="47.3" height="44.85" rx="8" fill="white" />
                        <path d="M74.5 54.425V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round" />
                        <path d="M65.875 58.7375L65.875 78.575" stroke="#F25471" stroke-width="4"
                            stroke-linecap="round" />
                        <path d="M83.125 63.9125V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round" />
                        <defs>
                            <filter id="filter0_d" x="0" y="0" width="149" height="149"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                <feOffset dy="8" />
                                <feGaussianBlur stdDeviation="20" />
                                <feColorMatrix type="matrix"
                                    values="0 0 0 0 0.825 0 0 0 0 0.300438 0 0 0 0 0.396718 0 0 0 0.26 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
                <!-- ux class -->
                <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true"
                    class="absolute bottom-14 -left-4 sm:left-2 sm:bottom-20 lg:bottom-24 lg:-left-4 floating">
                    <img class="bg-white bg-opacity-80 rounded-lg h-20 sm:h-28" src="img/ux-class.svg"
                        alt="">
                </div>
                <!-- congrats -->
                <div data-aos="fade-up" data-aos-delay="600" data-aos-once="true"
                    class="absolute bottom-20 md:bottom-48 lg:bottom-52 -right-6 lg:right-8 floating-4">
                    <img class="bg-white bg-opacity-80 rounded-lg h-12 sm:h-16" src="img/congrat.svg" alt="">
                </div>
            </div>
        </div>
        <div class="text-white -mt-14 sm:-mt-24 lg:-mt-36 z-40 relative">
            <svg class="xl:h-40 xl:w-full" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z"
                    fill="currentColor"></path>
            </svg>
            <div class="bg-white w-full h-20 -mt-px"></div>
        </div>
    </div>

    <!-- container -->
    <div class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden">

        <!-- trusted by -->
        <div class="max-w-4xl mx-auto">
            <h1 class="text-center mb-3 text-gray-400 font-medium">Communication</h1>
            <div class="grid grid-cols-3 lg:grid-cols-3 gap-4 justify-items-center">
                <img class="h-16" src="{{ url('/img/info/logo-msu.png') }}">
                <img class="h-12" src="{{ url('/img/info/logo-husoc.png') }}">
                <img class="h-16" src="{{ url('/img/info/logo-library.png') }}">
            </div>
        </div>

        <!-- All-In-One Cloud Software. -->
        <div data-aos="flip-up" class="max-w-xl mx-auto text-center mt-24">
            <h1 class="font-bold text-darken my-3 text-3xl">
                @lang('messages.serv')
                <span class="text-yellow-500">
                    CARS-HUSOC.
                </span>
            </h1>
            <p class="leading-relaxed text-gray-500">
                @lang('messages.join')
            </p>
        </div>
        <!-- card -->
        <div class="grid md:grid-cols-3 gap-14 md:gap-5 mt-20">
            <!-- card item -->
            <div data-aos="fade-up" class="bg-white shadow-xl text-center rounded-xl relative group overflow-hidden">
                <img src="{{ url('/img/project/01.png') }}" class="rounded-xl" />

                <!-- overlay -->
                <div
                    class="absolute bg-black bg-opacity-50 bottom-0 left-0 right-0 top-0 w-full h-full flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                    <a href="{{ url('/login') }}"
                        class="rounded-full text-white text-xs lg:text-md px-6 py-3 font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out"
                        style="background: rgba(35, 189, 238, 0.9)">
                        Join Now...
                    </a>
                </div>
            </div>

            <!-- card item -->
            <div data-aos="fade-up" class="bg-white shadow-xl text-center rounded-xl relative group overflow-hidden">
                <img src="{{ url('/img/project/02.png') }}" class="rounded-xl" />

                <!-- overlay -->
                <div
                    class="absolute bg-black bg-opacity-50 bottom-0 left-0 right-0 top-0 w-full h-full flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                    <a href="{{ url('/login') }}"
                        class="rounded-full text-white text-xs lg:text-md px-6 py-3 font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out"
                        style="background: rgba(35, 189, 238, 0.9)">
                        Join Now...
                    </a>
                </div>
            </div>

            <!-- card item -->
            <div data-aos="fade-up" class="bg-white shadow-xl text-center rounded-xl relative group overflow-hidden">
                <img src="{{ url('/img/project/03.png') }}" class="rounded-xl" />

                <!-- overlay -->
                <div
                    class="absolute bg-black bg-opacity-50 bottom-0 left-0 right-0 top-0 w-full h-full flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                    <a href="{{ url('/login') }}"
                        class="rounded-full text-white text-xs lg:text-md px-6 py-3 font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out"
                        style="background: rgba(35, 189, 238, 0.9)">
                        Join Now...
                    </a>
                </div>
            </div>
        </div>

        <!-- lorem -->
        <div class="mt-28">
            <div data-aos="flip-down" class="text-center max-w-screen-md mx-auto">
                <h1 class="text-3xl font-bold mb-4"> @lang('messages.what')<span class="text-yellow-500 pl-4">CARS-HUSOC
                        ?</span></h1>
                <p class="text-gray-500">
                    @lang('messages.servdetail')
                </p>
            </div>
            <div data-aos="fade-up"
                class="flex flex-col md:flex-row justify-center space-y-5 md:space-y-0 md:space-x-6 lg:space-x-10 mt-7">

                <div class="relative md:w-5/12 group">
                    <img class="rounded-2xl" src="{{ url('/img/info/01.png') }}">
                    <!-- overlay -->
                    <div
                        class="absolute bg-black bg-opacity-50 bottom-0 left-0 right-0 top-0 w-full h-full flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                        <a href="{{ url('/login') }}"
                            class="rounded-full text-white text-xs lg:text-md px-6 py-3 font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out"
                            style="background: rgba(35, 189, 238, 0.9)">
                            Detail
                        </a>
                    </div>
                </div>

                <div class="relative md:w-5/12 group">
                    <img class="rounded-2xl" src="{{ url('/img/info/02.png') }}">
                    <!-- overlay -->
                    <div
                        class="absolute bg-black bg-opacity-50 bottom-0 left-0 right-0 top-0 w-full h-full flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                        <a href="{{ url('/login') }}"
                            class="rounded-full text-white text-xs lg:text-md px-6 py-3 font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out"
                            style="background: rgba(35, 189, 238, 0.9)">
                            Detail
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <div class="sm:flex items-center sm:space-x-8 mt-36">
            <div data-aos="fade-right" class="sm:w-1/2 relative">
                <div class="bg-yellow-500 rounded-full absolute w-12 h-12 z-0 -left-4 -top-3 animate-pulse"></div>
                <h1 class="font-semibold relative z-50 text-darken lg:pr-10">Everything you can do in a
                    physical classroom, <span class="text-yellow-500">you can do with Skilline</span></h1>
                <p class="py-5 lg:pr-32">Skilline’s school management software helps traditional and online schools
                    manage scheduling, attendance, payments and virtual classrooms all in one secure cloud-based system.
                </p>
                <a href="" class="underline">Learn More</a>
            </div>
            <div data-aos="fade-left" class="sm:w-1/2 relative mt-10 sm:mt-0">
                <div style="background: #23BDEE;" class="floating w-24 h-24 absolute rounded-lg z-0 -top-3 -left-3">
                </div>
                <img class="rounded-xl z-40 relative" src="img/teacher-explaining.png" alt="">
                <button
                    class="bg-white w-14 h-14 rounded-full flex items-center justify-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out z-50">
                    <svg class="w-5 h-5 ml-1" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z"
                            fill="#23BDEE" />
                    </svg>
                </button>
                <div class="bg-yellow-500 w-40 h-40 floating absolute rounded-lg z-10 -bottom-3 -right-3"></div>
            </div>
        </div>

        <div class="md:flex mt-40 md:space-x-10 items-start">
            <div data-aos="fade-down" class="md:w-7/12 relative">
                <div style="background: #33EFA0"
                    class="w-32 h-32 rounded-full absolute z-0 left-4 -top-12 animate-pulse">
                </div>
                <div style="background: #33D9EF;"
                    class="w-5 h-5 rounded-full absolute z-0 left-36 -top-12 animate-ping">
                </div>
                <img class="relative z-50 floating" src="img/vcall.png" alt="">
                <div style="background: #5B61EB;"
                    class="w-36 h-36 rounded-full absolute z-0 right-16 -bottom-1 animate-pulse"></div>
                <div style="background: #F56666;"
                    class="w-5 h-5 rounded-full absolute z-0 right-52 bottom-1 animate-ping"></div>
            </div>
            <div data-aos="fade-down" class="md:w-5/12 mt-20 md:mt-0 text-gray-500">
                <h1 class= font-semibold text-darken lg:pr-40">A <span class="text-yellow-500">user
                        interface</span> designed for the classroom</h1>
                <div class="flex items-center space-x-5 my-5">
                    <div class="flex-shrink bg-white shadow-lg rounded-full p-3 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="11.8182" height="11.8182" rx="2" fill="#2F327D" />
                            <rect y="14.1816" width="11.8182" height="11.8182" rx="2" fill="#2F327D" />
                            <rect x="14.7727" width="11.8182" height="11.8182" rx="2" fill="#2F327D" />
                            <rect x="14.7727" y="14.1816" width="11.8182" height="11.8182" rx="2"
                                fill="#F48C06" />
                        </svg>
                    </div>
                    <p>Teachers don’t get lost in the grid view and have a dedicated Podium space.</p>
                </div>
                <div class="flex items-center space-x-5 my-5">
                    <div class="flex-shrink bg-white shadow-lg rounded-full p-3 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="6" width="20" height="20" rx="2" fill="#2F327D" />
                            <rect width="21.2245" height="21.2245" rx="2" fill="#F48C06" />
                        </svg>
                    </div>
                    <p>TA’s and presenters can be moved to the front of the class.</p>
                </div>
                <div class="flex items-center space-x-5 my-5">
                    <div class="flex-shrink bg-white shadow-lg rounded-full p-3 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.5 11.375C6.15469 11.375 7.5 9.91758 7.5 8.125C7.5 6.33242 6.15469 4.875 4.5 4.875C2.84531 4.875 1.5 6.33242 1.5 8.125C1.5 9.91758 2.84531 11.375 4.5 11.375ZM25.5 11.375C27.1547 11.375 28.5 9.91758 28.5 8.125C28.5 6.33242 27.1547 4.875 25.5 4.875C23.8453 4.875 22.5 6.33242 22.5 8.125C22.5 9.91758 23.8453 11.375 25.5 11.375ZM27 13H24C23.175 13 22.4297 13.3605 21.8859 13.9445C23.775 15.0668 25.1156 17.093 25.4062 19.5H28.5C29.3297 19.5 30 18.7738 30 17.875V16.25C30 14.4574 28.6547 13 27 13ZM15 13C17.9016 13 20.25 10.4559 20.25 7.3125C20.25 4.16914 17.9016 1.625 15 1.625C12.0984 1.625 9.75 4.16914 9.75 7.3125C9.75 10.4559 12.0984 13 15 13ZM18.6 14.625H18.2109C17.2359 15.1328 16.1531 15.4375 15 15.4375C13.8469 15.4375 12.7688 15.1328 11.7891 14.625H11.4C8.41875 14.625 6 17.2453 6 20.475V21.9375C6 23.2832 7.00781 24.375 8.25 24.375H21.75C22.9922 24.375 24 23.2832 24 21.9375V20.475C24 17.2453 21.5812 14.625 18.6 14.625ZM8.11406 13.9445C7.57031 13.3605 6.825 13 6 13H3C1.34531 13 0 14.4574 0 16.25V17.875C0 18.7738 0.670312 19.5 1.5 19.5H4.58906C4.88438 17.093 6.225 15.0668 8.11406 13.9445Z"
                                fill="#2F327D" />
                        </svg>
                    </div>
                    <p>Teachers can easily see all students and class data at one time.</p>
                </div>
            </div>
        </div>

        <!-- Latest News and Resources -->
        <div data-aos="zoom-in" class="mt-16 text-center">
            <h1 class="text-darken font-semibold">Latest News and Resources</h1>
            <p class="text-gray-500 my-5">See the developments that have occurred to Skillines in the world</p>
        </div>
        <div data-aos="zoom-in-up" class="my-14 flex flex-col lg:flex-row lg:space-x-20">
            <div class="lg:w-6/12">
                <img class="w-full mb-6" src="img/laptop-news.png">
                <span class="bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full">NEWS</span>
                <h1 class="text-gray-800 font-semibold my-3 text-xl">Class adds $30 million to its balance sheet for a
                    Zoom-friendly edtech solution</h1>
                <p class="text-gray-500 mb-3">Class, launched less than a year ago by Blackboard co-founder Michael
                    Chasen, integrates exclusively...</p>
                <a href="" class="underline">Read more</a>
            </div>
            <div class="lg:w-7/12 flex flex-col justify-between mt-12 space-y-5 lg:space-y-0 lg:mt-0">
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="img/children-laptop.png">
                            <span
                                class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">PRESS
                                RELEASE</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">Class Technologies Inc. Closes $30
                            Million Series A Financing to Meet High Demand</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">Class Technologies Inc., the company
                            that created Class,...</p>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="img/girl-laptop.png">
                            <span
                                class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">Zoom’s earliest investors are
                            betting millions on a better Zoom for schools</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">Zoom was never created to be a
                            consumer product. Nonetheless, the...</p>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="img/cat-laptop.png">
                            <span
                                class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">Former Blackboard CEO Raises $16M to
                            Bring LMS Features to Zoom Classrooms</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">This year, investors have reaped big
                            financial returns from betting on Zoom...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tools For Teachers And Learners -->
        <div class="flex flex-col md:flex-row items-center md:space-x-10 mt-16">
            <div data-aos="fade-right" class="md:w-1/2 lg:pl-14">
                <h1 class="text-darken font-semibold text-3xl lg:pr-56"><span class="text-yellow-500">Tools</span> For
                    Teachers And Learners</h1>
                <p class="text-gray-500 my-4 lg:pr-32">Class has a dynamic set of teaching tools built to be deployed
                    and used during class. Teachers can handout assignments in real-time for students to complete and
                    submit.</p>
            </div>
            <img data-aos="fade-left" class="md:w-1/2" src="img/girl-with-books.png">
        </div>

        <!-- Assessments, Quizzes, Tests -->
        <div class="mt-20 flex flex-col-reverse md:flex-row items-center md:space-x-10">
            <div data-aos="fade-right" class="md:w-6/12">
                <img class="md:w-11/12" src="img/true-false.png">
            </div>
            <div data-aos="fade-left" class="md:w-6/12 md:transform md:-translate-y-20">
                <h1 class="font-semibold text-darken text-3xl lg:pr-64">Assessments, <span
                        class="text-yellow-500">Quizzes</span>, Tests</h1>
                <p class="text-gray-500 my-5 lg:pr-52">Easily launch live assignments, quizzes, and tests. Student
                    results are automatically entered in the online gradebook.</p>
            </div>
        </div>

        <!-- Class Management Tools for Educators -->
        <div class="flex flex-col md:flex-row items-center mt-12">
            <div data-aos="fade-right" class="md:w-5/12">
                <h1 class="text-darken font-semibold text-3xl leading-tight lg:pr-32"><span
                        class="text-yellow-500">Class
                        Management</span> Tools for Educators</h1>
                <p class="my-5 lg:pr-14">Class provides tools to help run and manage the class such as Class Roster,
                    Attendance, and more. With the Gradebook, teachers can review and grade tests and quizzes in
                    real-time.</p>
            </div>
            <img data-aos="fade-left" class="md:w-7/12" src="img/gradebook.png">
        </div>

        <!-- One-on-One Discussions -->
        <div class="mt-24 flex flex-col-reverse md:flex-row items-center md:space-x-10">
            <div data-aos="fade-right" class="md:w-7/12">
                <img class="md:w-11/12" src="img/discussion.png">
            </div>
            <div data-aos="fade-left" class="md:w-5/12 md:transform md:-translate-y-6">
                <h1 class="font-semibold text-darken text-3xl lg:pr-64">One-on-One <span
                        class="text-yellow-500">Discussions</span></h1>
                <p class="text-gray-500 my-5 lg:pr-24">Teachers and teacher assistants can talk with students privately
                    without leaving the Zoom environment.</p>
            </div>
        </div>

        <button data-aos="flip-up"
            class="px-5 py-3 border border-yellow-500 text-yellow-500 font-medium my-14 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out rounded-full mx-auto block">See
            more features</button>

        <!-- INTEGRATIONS -->
        <div class="mt-24 flex flex-col md:flex-row items-start md:space-x-10">
            <div data-aos="zoom-in-right" class="md:w-6/12">
                <img class="md:w-8/12 mx-auto" src="img/integrations.png">
            </div>
            <div data-aos="zoom-in-left" class="md:w-6/12">
                <div class="flex items-center space-x-20 mb-5">
                    <span class="border border-gray-300 w-14 absolute"></span>
                    <h1 class="text-gray-400 tracking-widest text-sm">INTEGRATIONS</h1>
                </div>
                <h1 class="font-semibold text-darken lg:pr-40">200+ educational tools and platform <span
                        class="text-yellow-500">integrations</span></h1>
                <p class="text-gray-500 my-5 lg:pr-20">Schoology has every tool your classroom needs and comes
                    pre-integrated with more than 200+ tools, student information systems (SIS), and education
                    platforms.</p>
                <button
                    class="px-5 py-3 border border-yellow-500 text-yellow-500 font-medium my-4 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out rounded-full">See
                    All Integrations</button>
            </div>
        </div>

        <!-- TESTIMONIAL -->
        <div class="mt-24 flex flex-col-reverse md:flex-row items-start md:space-x-10">
            <div data-aos="zoom-in-right" class="md:w-5/12">
                <div class="flex items-center space-x-20 mb-5">
                    <span class="border border-gray-300 w-14 absolute"></span>
                    <h1 class="text-gray-400 tracking-widest text-sm">TESTIMONIAL</h1>
                </div>
                <h1 class="font-semibold text-darken lg:pr-40">What They Say?</h1>
                <p class="text-gray-500 my-5 lg:pr-36">Skilline has got more than 100k positive ratings from our users
                    around the world.</p>
                <p class="text-gray-500 my-5 lg:pr-36">Some of the students and teachers were greatly helped by the
                    Skilline.</p>
                <p class="text-gray-500 my-5 lg:pr-36">Are you too? Please give your assessment</p>
                <button
                    class="flex items-center space-x-3 pl-3 border-b border-l border-t border-yellow-500 text-yellow-500 font-medium my-4 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out rounded-full">
                    <span>Write your assessment</span>
                    <div class="border border-yellow-500 h-14 w-14 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.7071 8.70711C26.0976 8.31658 26.0976 7.68342 25.7071 7.2929L19.3431 0.928934C18.9526 0.538409 18.3195 0.538409 17.9289 0.928934C17.5384 1.31946 17.5384 1.95262 17.9289 2.34315L23.5858 8L17.9289 13.6569C17.5384 14.0474 17.5384 14.6805 17.9289 15.0711C18.3195 15.4616 18.9526 15.4616 19.3431 15.0711L25.7071 8.70711ZM-8.74228e-08 9L25 9L25 7L8.74228e-08 7L-8.74228e-08 9Z"
                                fill="#F48C06" />
                        </svg>
                    </div>
                </button>
            </div>
            <div data-aos="zoom-in-left" class="md:w-7/12">
                <img class="md:w-10/12 mx-auto" src="img/testimonials.png">
            </div>
        </div>

    </div>
    <!-- .container -->

    <footer class="mt-32" style="background-color: rgba(37, 38, 65, 1);">
        <div class=" mx-auto">
            <div class="grid grid-cols-6 gap-4 mx-32 text-left">
                <div class="mt-8">
                    <p class="font-under text-xl text-white">หน่วยงานภายใน</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <ul class="mt-4 text-gray-400 text-sm">
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            กองแผนงาน</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            กองการเจ้าหน้าที่</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            กองกิจการนิสิต</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            กองคลังและพัสดุ</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            กองบริการศึกษา</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            บัณฑิตวิทยาลัย</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            สำนักงานวิทยบริการ</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            สำนักคอมพิวเตอร์</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            สำนักศึกษาทั่วไป</li>
                    </ul>
                </div>
                <div class="mt-8">
                    <p class="font-under text-xl text-white">หน่วยงานภายนอก</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <ul class="mt-4 text-gray-400 text-sm">
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            สำนักงานการวิจัยแห่งชาติ (วช.)</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม (อว.)</li>
                    </ul>
                </div>
                <div class="mt-8">
                    <p class="font-under text-xl text-white">เมนูหลัก</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <ul class="mt-4 text-gray-400 text-sm">
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            หน้าหลัก</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            เกี่ยวกับคณะ</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            บุคลากร</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            หลักสูตรปริญญาตรี</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            หลักสูตรปริญญาโท</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            หลักสูตรปริญญาเอก</li>
                        <li
                            class="pb-1 cursor-pointer hover:text-white transform hover:scale-110 transition duration-300 ease-in-out">
                            งานวิจัย</li>
                    </ul>
                </div>
                <div class="mt-8 col-span-2">
                    <p class="font-under text-xl text-white">คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <p class="text-left mt-4 text-gray-400 text-sm">
                        คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม
                        <br>
                        ตำบลขามเรียง อำเภอกันทรวิชัย จังหวัดมหาสารคาม
                        <br>
                        รหัสไปรษณีย์ 44150
                        <br><br>
                        โทรศัพท์ : 043-754-369
                        <br>
                        เบอร์ภายใน : 4734 , 4703
                        <br>
                        มือถือ : 089-710-4115
                        <br>
                        E-mail : husoc.msu@msu.ac.th
                    </p>
                </div>
                <div class="mt-8">
                    <p class="font-under text-xl text-white">ผู้ดูแล</p>
                    <hr class=" border border-dashed border-gray-50 my-2 mr-16">
                    <p class="text-left mt-4 text-gray-400 text-sm">
                        ผู้ดูแลเว็บไซต์ : นายอรรถสิทธิ์ ศรีรักษ์<br>
                        E-mail : attasit.s@msu.ac.th<br>
                        เบอร์โทรศัพท์ : 091-132-7411 , 4717 (ภายใน)
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

    <!-- AOS init -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</html>
