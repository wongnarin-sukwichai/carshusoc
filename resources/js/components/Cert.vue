<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="file"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("home.cert")
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
                            <input
                                type="text"
                                id="default-search"
                                class="block w-80 h-11 pr-5 pl-12 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none text-right"
                                placeholder="Search..."
                            />
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
                                                <tr class="bg-violet-50">
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
                                                        Budget
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Meet. Date
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        Certificate
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="divide-y divide-gray-300"
                                            >
                                                <tr
                                                    class="bg-white transition-all duration-500"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        1
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <p
                                                            class="font-normal text-sm text-gray-900"
                                                        >
                                                            ALCC
                                                        </p>
                                                        <p
                                                            class="font-normal text-xs leading-5 text-gray-400"
                                                        >
                                                            ASEAN Language and
                                                            Culture Centre
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-3">
                                                        <div
                                                            class="w-48 flex items-center gap-3"
                                                        >
                                                            <img
                                                                src="https://pagedone.io/asset/uploads/1697536419.png"
                                                                alt="Floyd image"
                                                            />
                                                            <div class="data">
                                                                <p
                                                                    class="font-normal text-sm text-gray-900"
                                                                >
                                                                    Floyd Miles
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400"
                                                                >
                                                                    floydmiles@pagedone.io
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Course
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Jun. 24, 2025
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        $18,500
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Jun. 28, 2025
                                                    </td>                                               
                                                    <td
                                                        class="flex p-4.5 items-center gap-0.5"
                                                    >
                                                        <button
                                                            class="p-2 rounded-full flex item-center cursor-pointer hover:scale-110"
                                                        >
                                                            <box-icon name="certification" color="#ad65d9"></box-icon>
                                                        </button>                                                    
                                                    </td>
                                                </tr>
                                                <tr
                                                    class="bg-white transition-all duration-500"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        2
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <p
                                                            class="font-normal text-sm text-gray-900"
                                                        >
                                                            CTFL
                                                        </p>
                                                        <p
                                                            class="font-normal text-xs leading-5 text-gray-400"
                                                        >
                                                            Centre for Thai as a
                                                            Foreign Language
                                                        </p>
                                                    </td>
                                                    <td class="w-48 px-5 py-3">
                                                        <div
                                                            class="flex items-center gap-3"
                                                        >
                                                            <img
                                                                src="https://pagedone.io/asset/uploads/1697536435.png"
                                                                alt="Savannah image"
                                                            />
                                                            <div class="data">
                                                                <p
                                                                    class="font-normal text-sm text-gray-900"
                                                                >
                                                                    Savannah
                                                                    Nguyen
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400"
                                                                >
                                                                    savannahng@pagedone.io
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Support
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Feb. 23, 2025
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        $50,00
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Mar. 15, 2025
                                                    </td>
                                                    <td
                                                        class="flex p-4.5 items-center gap-0.5"
                                                    >
                                                        <button
                                                            class="p-2 rounded-full flex item-center cursor-pointer hover:scale-110"
                                                        >
                                                            <box-icon name="certification" color="#ad65d9"></box-icon>
                                                        </button>                                                    
                                                    </td>
                                                </tr>
                                                <tr
                                                    class="bg-white transition-all duration-500"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        3
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <p
                                                            class="font-normal text-sm text-gray-900"
                                                        >
                                                            TIC
                                                        </p>
                                                        <p
                                                            class="font-normal text-xs leading-5 text-gray-400"
                                                        >
                                                            Translation and
                                                            Interpretation
                                                            Centre
                                                        </p>
                                                    </td>
                                                    <td
                                                        class="w-48 px-5 py-3 whitespace-nowrap"
                                                    >
                                                        <div
                                                            class="flex items-center gap-3"
                                                        >
                                                            <img
                                                                src="https://pagedone.io/asset/uploads/1697536451.png"
                                                                alt="Cameron image"
                                                            />
                                                            <div
                                                                class="data min-w-[150px]"
                                                            >
                                                                <p
                                                                    class="font-normal text-sm text-gray-900 whitespace-nowrap"
                                                                >
                                                                    Cameron
                                                                    Williamson
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400 whitespace-nowrap"
                                                                >
                                                                    cameron@pagedone.io
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Service
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Oct. 23, 2025
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    ></td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Dec. 4, 2025
                                                    </td>                                                
                                                    <td
                                                        class="flex p-4.5 items-center gap-0.5"
                                                    >
                                                        <button
                                                            class="p-2 rounded-full flex item-center cursor-pointer hover:scale-110"
                                                        >
                                                            <box-icon name="file" color="#659dd9"></box-icon>
                                                        </button>                                                    
                                                    </td>
                                                </tr>
                                                <tr
                                                    class="bg-white transition-all duration-500"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        4
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <p
                                                            class="font-normal text-sm text-gray-900"
                                                        >
                                                            ALCC
                                                        </p>
                                                        <p
                                                            class="font-normal text-xs leading-5 text-gray-400"
                                                        >
                                                            ASEAN Language and
                                                            Culture Centre
                                                        </p>
                                                    </td>
                                                    <td class="w-48 px-5 py-3">
                                                        <div
                                                            class="flex items-center gap-3"
                                                        >
                                                            <img
                                                                src="https://pagedone.io/asset/uploads/1697536419.png"
                                                                alt="Floyd image"
                                                            />
                                                            <div class="data">
                                                                <p
                                                                    class="font-normal text-sm text-gray-900"
                                                                >
                                                                    Floyd Miles
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400"
                                                                >
                                                                    floydmiles@pagedone.io
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Course
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Jul. 12, 2025
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    ></td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Jul. 16, 2025
                                                    </td>                                                  
                                                    <td
                                                        class="flex p-4.5 items-center gap-0.5"
                                                    >
                                                        <button
                                                            class="p-2 rounded-full flex item-center cursor-pointer hover:scale-110"
                                                        >
                                                            <box-icon name="certification" color="#ad65d9"></box-icon>
                                                        </button>                                                    
                                                    </td>
                                                </tr>
                                                <tr
                                                    class="bg-white transition-all duration-500"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        5
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <p
                                                            class="font-normal text-sm text-gray-900"
                                                        >
                                                            ETC
                                                        </p>
                                                        <p
                                                            class="font-normal text-xs leading-5 text-gray-400"
                                                        >
                                                            English Testing
                                                            Centre
                                                        </p>
                                                    </td>
                                                    <td class="w-48 px-5 py-3">
                                                        <div
                                                            class="flex items-center gap-3"
                                                        >
                                                            <img
                                                                src="https://pagedone.io/asset/uploads/1697536479.png"
                                                                alt="Laura image"
                                                            />
                                                            <div class="data">
                                                                <p
                                                                    class="font-normal text-sm text-gray-900"
                                                                >
                                                                    Laura Bran
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400"
                                                                >
                                                                    laurabran@pagedone.io
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Course
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Sep. 29, 2025
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        $1,500
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        Nov. 12, 2025
                                                    </td>                                                   
                                                    <td
                                                        class="flex p-4.5 items-center gap-0.5"
                                                    >
                                                        <button
                                                            class="p-2 rounded-full flex item-center cursor-pointer hover:scale-110"
                                                        >
                                                            <box-icon name="certification" color="#ad65d9"></box-icon>
                                                        </button>                                                    
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul
                                        class="flex space-x-5 justify-center mt-8"
                                    >
                                        <li
                                            class="flex items-center justify-center shrink-0 bg-gray-100 w-9 h-9 rounded-md"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-3 fill-gray-300"
                                                viewBox="0 0 55.753 55.753"
                                            >
                                                <path
                                                    d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                                                    data-original="#000000"
                                                />
                                            </svg>
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md bg-blue-100"
                                        >
                                            1
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md"
                                        >
                                            2
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md"
                                        >
                                            3
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md"
                                        >
                                            4
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md"
                                        >
                                            5
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md"
                                        >
                                            ...
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer text-base font-medium text-slate-900 px-[13px] h-9 rounded-md"
                                        >
                                            30
                                        </li>
                                        <li
                                            class="flex items-center justify-center shrink-0 cursor-pointer bg-gray-200 w-9 h-9 rounded-md"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-3 fill-gray-500 rotate-180"
                                                viewBox="0 0 55.753 55.753"
                                            >
                                                <path
                                                    d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                                                    data-original="#000000"
                                                />
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
