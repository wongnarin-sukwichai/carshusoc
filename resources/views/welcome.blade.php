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
                    href="{{ url('/about') }}">@lang('messages.about')</a>
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
                <img data-aos="fade-up" data-aos-once="true" class="w-10/12 mx-auto 2xl:-mb-20 scale-110"
                    src="img/girl.png" />
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
            <div class="grid grid-cols-3 lg:grid-cols-3 gap-4 justify-items-center">
                <img class="h-16" src="{{ url('/img/info/logo-msu.png') }}">
                <img class="h-12" src="{{ url('/img/info/logo-husoc.png') }}">
            </div>
        </div>

        <hr class="mx-32 border border-dashed border-gray-200 my-16">

        <!-- All-In-One Cloud Software. -->
        <div data-aos="flip-up" class="max-w-xl mx-auto text-center mt-8">
            <h1 class="font-bold text-darken my-3 text-3xl">
                @lang('messages.serv')
                <span class="text-yellow-500">
                    CARS-HUSOC
                </span>
            </h1>
            <p class="leading-relaxed text-gray-500">
                @lang('messages.join')
            </p>
        </div>

        <!-- card -->
        <div class="grid md:grid-cols-3 gap-14 md:gap-5 mt-8">
            <!-- card item -->
            @foreach ($content as $r)
                <div data-aos="fade-up"
                    class="bg-white shadow-xl text-center rounded-xl relative group overflow-hidden">
                    <img src="{{ url('/img/contents/' . $r->pic) }}" class="rounded-xl" />

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
            @endforeach
        </div>

        <hr class="mx-32 border border-dashed border-gray-200 my-24">

        <!-- lorem -->
        <div>
            <div data-aos="flip-down" class="text-center max-w-screen-md mx-auto">
                <h1 class="text-3xl font-bold mb-4"> @lang('messages.what')<span class="text-yellow-500 pl-4">CARS-HUSOC
                        ?</span></h1>
                <p class="text-gray-500">
                    @lang('messages.servdetail')
                </p>
            </div>
            <div data-aos="fade-up"
                class="flex flex-col md:flex-row justify-center space-y-5 md:space-y-0 md:space-x-6 lg:space-x-10 mt-7">

                <div class="relative md:w-5/12 group shadow-xl rounded-xl">
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

                <div class="relative md:w-5/12 group shadow-xl rounded-xl">
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

        <hr class="mx-32 border border-dashed border-gray-200 my-24">

        <!-- Card -->
        <div class="sm:flex items-center sm:space-x-8">
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

        <hr class="mx-32 border border-dashed border-gray-200 my-24">

        <!-- Card -->
        <div class="md:flex md:space-x-10 items-start">
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
                <h1 class="font-semibold text-darken lg:pr-40">A <span class="text-yellow-500">user
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

        <hr class="mx-32 border border-dashed border-gray-200 my-16">

        <!-- Latest News and Resources -->
        <div data-aos="zoom-in" class="text-center">
            <h1 class="text-darken font-semibold text-3xl">@lang('messages.news') : <span
                    class="text-yellow-500">CARS-HUSOC</span></h1>
            <p class="text-gray-500 my-5">@lang('messages.newsabout')</p>
        </div>
        <div data-aos="zoom-in-up" class="my-14 flex flex-col lg:flex-row lg:space-x-20">
            <div class="lg:w-6/12">
                <img class="w-full mb-6 shadow-xl rounded-xl" src="{{ url('img/info/01.png') }}">
                <span class="bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full">NEWS</span>
                <h1 class="text-gray-800 font-semibold my-3 text-xl">
                    โครงการอบรมทักษะภาษาอังกฤษสำหรับนิสิตระดับบัณฑิตศึกษา
                </h1>
                <p class="text-gray-500 mb-3">
                    ศูนย์บริการวิชาการและวิจัย คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม...
                </p>
                <a href=""
                    class="border-2 border-dashed border-yellow-300 hover:bg-yellow-300 hover:text-white p-2 rounded-lg text-xs">@lang('messages.read')...</a>
            </div>
            <div class="lg:w-7/12 flex flex-col justify-between mt-12 space-y-5 lg:space-y-0 lg:mt-0">
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="{{ url('img/info/02.png') }}">
                            <span
                                class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">
                            เปิดรับสมัครผู้เข้าสอบ TOEIC
                        </h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">
                            จัดโดยศูนย์ทดสอบภาษาอังกฤษ คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยมหาสารคาม ร่วมมือกับ
                            Center for...
                        </p>
                        <a href=""
                            class="border-2 border-dashed border-yellow-300 hover:bg-yellow-300 hover:text-white p-2 rounded-lg text-xs">@lang('messages.read')...</a>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="{{ url('img/info/03.png') }}">
                            <span
                                class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">ประกาศรับสมัครโครงการวิจัย
                            สำหรับอาจารย์ บุคลากร และนิสิตระดับบัณฑิตศึกษา ประจำปีงบประมาณ พ.ศ.2568</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">ประกาศรับสมัครโครงการวิจัย
                            สำหรับอาจารย์และบุคลากร ประจำปีงบประมาณ พ.ศ.2567 ตั้งแต่บัดนี้...</p>
                        <a href=""
                            class="border-2 border-dashed border-yellow-300 hover:bg-yellow-300 hover:text-white p-2 rounded-lg text-xs">@lang('messages.read')...</a>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="{{ url('img/info/04.png') }}">
                            <span
                                class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">เตรียมความพร้อมสอบ TOEIC กับ
                            CARS-HUSOC</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">อบรมเข้มข้น 3 วัน
                            เพื่อเพิ่มความมั่นใจในการสอบ TOEIC กับวิทยากรผู้เชี่ยวชาญ อาจารย์ดุจตะวัน อินศร...</p>
                        <a href=""
                            class="border-2 border-dashed border-yellow-300 hover:bg-yellow-300 hover:text-white p-2 rounded-lg text-xs">@lang('messages.read')...</a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mx-32 border border-dashed border-gray-200 my-16">

        <!-- Calendar -->
        <div data-aos="zoom-in" class="text-center">
            <h1 class="text-darken font-semibold text-3xl">@lang('messages.calendar') : <span
                    class="text-yellow-500">CARS-HUSOC</span></h1>
        </div>
        <div data-aos="zoom-in-up" class="mt-14 flex flex-col lg:flex-row lg:space-x-20">
            <img class="" src="{{ url('img/info/calendar.png') }}">
        </div>

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
