<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                name="user-plus"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.member")
            }}</span>
        </div>

        <div
            class="border-2 border-dashed border-gray-200 text-lg p-4 rounded-xl mb-2"
        >
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div
                            class="flex justify-between items-center flex-wrap gap-4"
                        >
                            <!-- checkbox -->
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input
                                        type="checkbox"
                                        class="form-checkbox text-blue-600 cursor-pointer"
                                        v-model="chkAdmin"
                                        @change="chkSearch()"
                                    />
                                    <span class="ml-2 text-sm"
                                        >เจ้าหน้าที่ดูแลระบบ</span
                                    >
                                </label>

                                <label class="inline-flex items-center">
                                    <input
                                        type="checkbox"
                                        class="form-checkbox text-blue-600 cursor-pointer"
                                        v-model="chkMember"
                                        @change="chkSearch()"
                                    />
                                    <span class="ml-2 text-sm"
                                        >สมาชิกทั่วไป</span
                                    >
                                </label>
                            </div>

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
                                    v-model="data.search"
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
                        </div>

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
                                                        ID
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize min-w-[150px]"
                                                    >
                                                        Name & Email
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
                                                        Degree
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="p-4.5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"
                                                    >
                                                        National
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
                                                        Tel
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
                                                    v-for="member in memberList.data"
                                                    :key="member.id"
                                                >
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{ member.id }}
                                                    </td>
                                                    <td class="px-5 py-3">
                                                        <div
                                                            class="w-48 flex items-center gap-3"
                                                        >
                                                            <div
                                                                v-if="
                                                                    member.pic !==
                                                                    null
                                                                "
                                                            >
                                                                <img
                                                                    :src="
                                                                        path +
                                                                        member.pic
                                                                    "
                                                                    class="w-12 rounded-full"
                                                                />
                                                            </div>
                                                            <div v-else>
                                                                <box-icon
                                                                    name="user"
                                                                    size="md"
                                                                    color="#6a7282"
                                                                    class="rounded-full"
                                                                ></box-icon>
                                                            </div>
                                                            <div class="data">
                                                                <p
                                                                    class="font-normal text-sm text-gray-900"
                                                                >
                                                                    {{
                                                                        member.name
                                                                    }}
                                                                    {{
                                                                        member.surname
                                                                    }}
                                                                </p>
                                                                <p
                                                                    class="font-normal text-xs leading-5 text-gray-400"
                                                                >
                                                                    {{
                                                                        member.email
                                                                    }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setType(member.type)
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setDegree(
                                                                member.degree
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setNation(
                                                                member.nation
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{
                                                            setMoment(
                                                                member.created_at
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        {{ member.tel }}
                                                    </td>
                                                    <td
                                                        class="p-4.5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"
                                                    >
                                                        <div
                                                            class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1 hover:scale-105 cursor-pointer"
                                                            v-if="
                                                                member.level ===
                                                                'admin'
                                                            "
                                                        >
                                                            <span
                                                                class="font-medium text-xs text-emerald-600"
                                                                >Admin</span
                                                            >
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="flex p-4.5 items-center gap-1.5"
                                                    >
                                                        <box-icon
                                                            name="message-square-edit"
                                                            class="cursor-pointer hover:scale-120"
                                                            color="oklch(68.5% 0.169 237.323)"
                                                        ></box-icon>

                                                        <box-icon
                                                            name="caret-up-circle"
                                                            class="cursor-pointer hover:scale-120"
                                                            color="oklch(76.8% 0.233 130.85)"
                                                            animation="flashing-hover"
                                                            @click="
                                                                level(member.id)
                                                            "
                                                        ></box-icon>
                                                        
                                                        <box-icon 
                                                        name='dots-vertical-rounded'
                                                        color="oklch(86.9% 0.022 252.894)"
                                                        ></box-icon>

                                                        <box-icon
                                                            name="trash"
                                                            class="cursor-pointer hover:scale-120"
                                                            color="oklch(70.4% 0.191 22.216)"
                                                            @click="
                                                                del(member.id)
                                                            "
                                                        ></box-icon>
                                                    </td>
                                                </tr>
                                            </transition-group>
                                        </table>
                                    </div>

                                    <div class="flex justify-end m-5">
                                        <TailwindPagination
                                            :data="memberList"
                                            @pagination-change-page="getMember"
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
    </div>
</template>

<script>
import axios from "axios";
import { TailwindPagination } from "laravel-vue-pagination";
import moment from "moment";
import "moment/dist/locale/th";
moment.locale("th");
import Swal from "sweetalert2";

export default {
    async mounted() {
        await this.getMember();
        await this.getType();
        await this.getDegree();
        await this.getNation();
    },
    data() {
        return {
            path: "img/profiles/thumbnails/",
            ////////////////////////////////////////////////////////////////
            memberList: [],
            typeList: [],
            degreeList: [],
            nationList: [],
            ////////////////////////////////////////////////////////////////
            chkAdmin: true,
            chkMember: true,
            data: {
                search: "",
            },
            showAlert: false,
        };
    },
    methods: {
        ////////////////////////////////////////////////////////////////
        getMember(page = 1) {
            axios.get("/api/member?page=" + page).then((response) => {
                this.memberList = response.data;
            });
        },
        async getType() {
            await axios.get("/api/type").then((response) => {
                this.typeList = response.data;
            });
        },
        async getDegree() {
            await axios.get("/api/degree").then((response) => {
                this.degreeList = response.data;
            });
        },
        async getNation() {
            await axios.get("/api/nation").then((response) => {
                this.nationList = response.data;
            });
        },
        ////////////////////////////////////////////////////////////////
        setType(id) {
            this.typeShow = false;
            if (id != null) {
                const arr = Array.from(this.typeList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
        },
        setDegree(id) {
            this.degreeShow = false;
            if (id != null) {
                const arr = Array.from(this.degreeList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
        },
        setNation(id) {
            this.nationShow = false;
            if (id != null) {
                const arr = Array.from(this.nationList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.title : null;
            }
            return null;
        },
        setMoment(id) {
            return moment(id).add(543, "years").format("LL");
        },
        chkSearch() {
            axios
                .post("/api/chkSearch", {
                    chkAdmin: this.chkAdmin,
                    chkMember: this.chkMember,
                })
                .then((response) => {
                    this.memberList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        search(page = 1) {
            this.showAlert = false;

            if (this.data.search === "") {
                this.showAlert = true;
            } else {
                axios.post("/api/search?page=" + page, this.data).then((response) => {
                    this.memberList = response.data;
                });
            }
        },
        del(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm the Delete?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                customClass: {
                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                    title: "text-2xl font-bold text-rose-400",
                    htmlContainer: "text-base text-gray-600",
                    confirmButton:
                        "bg-rose-400 hover:bg-rose-500 text-white font-medium px-4 py-2",
                    cancelButton:
                        "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                },
                didOpen: () => {
                    Swal.getPopup().style.fontFamily = "Poppins, sans-serif";
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete("/api/member/" + id).then((response) => {
                        Swal.fire({
                            title: response.data.message,
                            icon: "success",
                            draggable: true,
                            customClass: {
                                popup: "rounded-xl shadow-lg bg-white font-poppins",
                                title: "text-2xl text-gray-800",
                                htmlContainer: "text-base text-gray-600",
                                confirmButton:
                                    "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                                cancelButton:
                                    "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                            },
                            didOpen: () => {
                                Swal.getPopup().style.fontFamily =
                                    "Poppins, sans-serif";
                            },
                        });
                    });

                    this.getMember();
                }
            });
        },
        level(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to change level this user?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                customClass: {
                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                    title: "text-2xl font-bold text-gray-400",
                    htmlContainer: "text-base text-gray-600",
                    confirmButton:
                        "bg-emerald-400 hover:bg-emerald-500 text-white font-medium px-4 py-2",
                    cancelButton:
                        "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                },
                didOpen: () => {
                    Swal.getPopup().style.fontFamily = "Poppins, sans-serif";
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .get("/api/member/" + id + "/edit")
                        .then((response) => {
                            Swal.fire({
                                title: response.data.message,
                                icon: "success",
                                draggable: true,
                                customClass: {
                                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                                    title: "text-2xl text-gray-800",
                                    htmlContainer: "text-base text-gray-600",
                                    confirmButton:
                                        "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                                    cancelButton:
                                        "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                                },
                                didOpen: () => {
                                    Swal.getPopup().style.fontFamily =
                                        "Poppins, sans-serif";
                                },
                            });
                        });

                    this.getMember();
                }
            });
        },
    },
    components: {
        TailwindPagination,
    },
};
</script>
