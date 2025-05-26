<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="bar-chart-square"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold"> สถิติ </span>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div
                class="border-2 border-dashed rounded-xl p-6 flex justify-between"
            >
                <span class="flex items-center">
                    <box-icon
                        name="user"
                        class="mr-2"
                        size="lg"
                        color="#52adf5"
                    ></box-icon>
                    <span class="text-xl text-gray-400">สมาชิกทั้งหมด :</span>
                </span>
                <span class="text-4xl">64</span>
            </div>
            <div
                class="border-2 border-dashed rounded-xl p-6 flex justify-between"
            >
                <span class="flex items-center">
                    <box-icon
                        name="layer-plus"
                        class="mr-2"
                        size="lg"
                        color="#81de63"
                    ></box-icon>
                    <span class="text-xl text-gray-400">เนื้อหาทั้งหมด :</span>
                </span>
                <span class="text-4xl">8</span>
            </div>
            <div
                class="border-2 border-dashed rounded-xl p-6 flex justify-between"
            >
                <span class="flex items-center">
                    <box-icon
                        name="credit-card"
                        class="mr-2"
                        size="lg"
                        color="#f55266"
                    ></box-icon>
                    <span class="text-xl text-gray-400"
                        >ยังไม่ได้ชำระเงิน :</span
                    >
                </span>
                <span class="text-4xl">2</span>
            </div>
            <div
                class="border-2 border-dashed rounded-xl p-6 flex justify-between"
            >
                <span class="flex items-center">
                    <box-icon
                        name="dollar"
                        class="mr-2"
                        size="lg"
                        color="#fcba60"
                    ></box-icon>
                    <span class="text-xl text-gray-400">รายรับทั้งหมด :</span>
                </span>
                <span class="text-xl flex items-center">108,000</span>
            </div>

            <div class="col-span-2 border-2 border-dashed rounded-xl p-6">
                <canvas
                    ref="reportBar"
                    class="rotate-x-180 -rotate-y-180"
                ></canvas>
            </div>
            <div class="border-2 border-dashed rounded-xl p-6">
                <canvas
                    ref="reportDonut"
                    class="rotate-x-180 -rotate-y-180"
                ></canvas>
            </div>
            <div
                class="border-2 border-dashed rounded-xl p-6 flex justify-between"
            >
                <!-- Timeline -->
                <div>
                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700"
                        >
                            <div
                                class="relative z-10 size-7 flex justify-center items-center"
                            >
                                <box-icon name="user-circle" color="#85c1e9" size="lg"></box-icon>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3
                                class="flex gap-x-1.5 font-semibold text-gray-800 dark:text-white"
                            >
                                <svg
                                    class="shrink-0 size-4 mt-1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"
                                    ></path>
                                    <polyline
                                        points="14 2 14 8 20 8"
                                    ></polyline>
                                    <line x1="16" x2="8" y1="13" y2="13"></line>
                                    <line x1="16" x2="8" y1="17" y2="17"></line>
                                    <line x1="10" x2="8" y1="9" y2="9"></line>
                                </svg>
                                Created "Preline in React" task
                            </h3>
                            <p
                                class="mt-1 text-sm text-gray-600 dark:text-neutral-400"
                            >
                                Find more detailed insctructions here.
                            </p>
                            <button
                                type="button"
                                class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hover:scale-105"
                            >
                                <box-icon name="right-arrow-circle" color="#d1d5dc" size="sm"></box-icon>
                                More...
                            </button>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700"
                        >
                            <div
                                class="relative z-10 size-7 flex justify-center items-center"
                            >
                                <box-icon name="user-circle" color="#85c1e9" size="lg"></box-icon>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3
                                class="flex gap-x-1.5 font-semibold text-gray-800 dark:text-white"
                            >
                                Release v5.2.0 quick bug fix
                            </h3>
                             <button
                                type="button"
                                class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hover:scale-105"
                            >
                                <box-icon name="right-arrow-circle" color="#d1d5dc"></box-icon>
                                More...
                            </button>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700"
                        >
                            <div
                                class="relative z-10 size-7 flex justify-center items-center"
                            >
                               <box-icon name="user-circle" color="#85c1e9" size="lg"></box-icon>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3
                                class="flex gap-x-1.5 font-semibold text-gray-800 dark:text-white"
                            >
                                Marked "Install Charts" completed
                            </h3>
                            <p
                                class="mt-1 text-sm text-gray-600 dark:text-neutral-400"
                            >
                                Finally! You can check it out here.
                            </p>
                             <button
                                type="button"
                                class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hover:scale-105"
                            >
                                <box-icon name="right-arrow-circle" color="#d1d5dc" size="sm"></box-icon>
                                More...
                            </button>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->
                </div>
                <!-- End Timeline -->
            </div>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js/auto";
Chart.defaults.font.family = "Anuphan";

export default {
    mounted() {
        this.reportBar();
        this.reportDonut();
    },
    methods: {
        reportBar() {
            const ctx = this.$refs.reportBar;

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: [
                        "01",
                        "02",
                        "03",
                        "04",
                        "05",
                        "06",
                        "07",
                        "08",
                        "09",
                        "10",
                        "11",
                        "12",
                    ],
                    datasets: [
                        {
                            label: "สถิติการเข้าใช้บริการ",
                            data: [
                                650, 280, 442, 128, 69, 0, 0, 0, 0, 0, 0, 0,
                            ],
                            backgroundColor: [
                                "#ff6384",
                                "#36a2eb",
                                "#ffcd56",
                                "#4bc0c0",
                                "#9966ff",
                                "#ff9f40",
                                "#ff6384",
                                "#36a2eb",
                                "#ffcd56",
                                "#4bc0c0",
                                "#9966ff",
                                "#ff9f40",
                            ],
                            borderColor: [
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(54, 162, 235)",
                                "rgb(153, 102, 255)",
                                "rgb(201, 203, 207)",
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                            ],
                            borderWidth: 2,
                            borderColor: "#fff",
                            borderRadius: 10,
                            borderSkipped: false,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 2000,
                        easing: "easeOutBounce",
                    },
                    plugins: {
                        legend: {
                            display: true,
                        },
                        tooltip: {
                            backgroundColor: "#333",
                            titleColor: "#fff",
                            bodyColor: "#fff",
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
        reportDonut() {
            const ctx = this.$refs.reportDonut;
            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Course", "Service", "Support"],
                    datasets: [
                        {
                            label: "",
                            data: [13992, 21682, 2421],
                            backgroundColor: ["#ff6384", "#36a2eb", "#ffcd56"],
                            borderColor: ["#ff6384", "#36a2eb", "#ffcd56"],
                            borderWidth: 3,
                            borderColor: "#fff",
                            borderWidth: 2,
                            hoverOffset: 15,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                        duration: 2000,
                        easing: "easeOutBack",
                    },
                    plugins: {
                        legend: {
                            position: "top",
                        },
                        title: {
                            display: true,
                            text: "ประเภทบริการ",
                            font: { weight: "normal" },
                        },
                        tooltip: {
                            backgroundColor: "#333",
                            titleColor: "#fff",
                            bodyColor: "#fff",
                        },
                    },
                },
            });
        },
    },
};
</script>
