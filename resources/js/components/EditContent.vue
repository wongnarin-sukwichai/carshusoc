<template>
    <div class="bg-white p-8 rounded-2xl md:ml-8">
        <div class="mb-6 flex items-center">
            <box-icon
                name="cog"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">แก้ไขเนื้อหา</span>
        </div>

        <input
            ref="fileInput"
            type="file"
            accept="image/*"
            class="hidden"
            @change="pickFile()"
        />

        <div class="grid grid-cols-3 gap-4">
            <!--Upload -->
            <div
                class="relative border-2 border-dashed rounded-xl p-48 cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center"
            >
                <div class="flex px-4 justify-center" v-if="previewImage">
                    <transition name="fade" mode="out-in">
                        <div
                            class="imagePreviewWrapper absolute inset-0 bg-center bg-cover bg-no-repeat"
                            :style="{
                                'background-image': `url(${previewImage})`,
                            }"
                            @click="selectImage"
                        ></div>
                    </transition>
                </div>

                <div v-else>
                    <box-icon
                        name="plus"
                        size="lg"
                        class="opacity-10 hover:scale-115 w-24 h-24"
                    ></box-icon>
                    <div class="text-gray-300 text-sm">
                        Upload a File <br />
                        jpg, png to 4MB
                    </div>
                </div>
            </div>

            <!-- Layout 2 -->
            <div class="col-span-2 border-2 border-dashed rounded-xl p-8">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2">
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.title") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.title"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.title }}</span
                                ></transition
                            >
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.title"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.init") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.short_name"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.short_name }}</span
                                ></transition
                            >
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.short_name"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                        >
                            วัตถุประสงค์ :</label
                        >
                        <div class="mt-2">
                            <ckeditor
                                class="max-height-48"
                                v-show="data.detail !== null"
                                :editor="editor"
                                v-model="data.detail"
                                :config="editorConfig"
                            />
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                        >
                            พันธกิจ :</label
                        >
                        <div class="mt-2">
                            <ckeditor
                                class="max-height-48"
                                v-show="data.mission !== null"
                                :editor="editor"
                                v-model="data.mission"
                                :config="editorConfig"
                            />
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                        >
                            ขอบเขตการดำเนินงาน :</label
                        >
                        <div class="mt-2">
                            <ckeditor
                                class="max-height-48"
                                v-show="data.scope !== null"
                                :editor="editor"
                                v-model="data.scope"
                                :config="editorConfig"
                            />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >Facebook :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.facebook"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >Email :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.email"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >Website :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <div
                                    class="shrink-0 text-base text-gray-500 select-none sm:text-md"
                                ></div>
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.website"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >เบอร์โทร :</label
                        >
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"
                            >
                                <input
                                    type="text"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-md"
                                    v-model="data.tel"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >{{ $t("addcont.owner") }} :
                            <transition name="fade" mode="out-in">
                                <span
                                    v-if="errors.owner"
                                    class="text-rose-300 text-sm"
                                    >{{ errors.owner }}</span
                                ></transition
                            ></label
                        >

                        <div class="relative block w-full text-left mt-2">
                            <div>
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-between gap-2 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                    @click="showAdmin()"
                                >
                                    <span v-if="data.owner === ''">เลือก</span>
                                    <span v-else>
                                        {{ setAdmin(data.owner) }}
                                    </span>
                                    <svg
                                        class="-mr-1 size-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        data-slot="icon"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Dropdown List -->
                        <transition name="fade" mode="out-in">
                            <div
                                class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                                v-show="adminShow"
                            >
                                <div
                                    class="py-1 max-h-60 overflow-y-auto"
                                    role="none"
                                >
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                                    <div
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-100 cursor-pointer"
                                        v-for="(admin, index) in adminList"
                                        :key="index"
                                        @click="setAdmin(admin.id)"
                                    >
                                        {{ admin.name }} {{ admin.surname }}
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                    <!-- End Dropdown -->
                    <div>
                        <label
                            for="username"
                            class="block text-md font-medium text-gray-900"
                            >อื่นๆ :</label
                        >
                        <div class="mt-2">
                            <textarea
                                rows=""
                                class="block w-full rounded-md bg-white px-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-md"
                                v-model="data.other"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-2 rounded-xl bg-amber-200 border-amber-300 hover:bg-amber-300"
                    @click="sendData()"
                >
                    <box-icon name="cog" class="mr-2"></box-icon>
                    แก้ไขข้อมูล
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import boxicons from "boxicons";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";
import Swal from "sweetalert2";

export default {
    mounted() {
        this.getContent();
        this.getAdmin();
    },
    data() {
        return {
            pic: "content/pics/",
            ////////////////////////////////////////////////////////////////
            contentList: [],
            eventList: [],
            adminList: [],
            ////////////////////////////////////////////////////////////////
            eventShow: false,
            adminShow: false,
            ////////////////////////////////////////////////////////////////
            file: null,
            previewImage: "",
            ////////////////////////////////////////////////////////////////
            editor: ClassicEditor,
            editorData: "",
            editorConfig: {
                toolbar: [
                    "undo",
                    "redo",
                    "|",
                    "bold",
                    "italic",
                    "link",
                    "|",
                    "insertTable",
                    "blockQuote",
                ],
            },
            ////////////////////////////////////////////////////////////////
            data: {
                pic: "",
                title: "",
                short_name: "",
                detail: "",
                mission: "",
                scope: "",
                facebook: "",
                email: "",
                website: "",
                tel: "",
                owner: "",
                other: "",
            },
            errors: {
                pic: "",
                title: "",
                short_name: "",
                owner: "",
            },
        };
    },
    methods: {
        ////////////////////////////////////////////////////////////////
        getContent() {
            axios
                .get("/api/content/" + this.$route.params.id)
                .then((response) => {
                    this.contentList = response.data;

                    for (let key in this.data) {
                        if (this.contentList.hasOwnProperty(key)) {
                            this.data[key] = this.contentList[key] ?? "";
                        }
                    }

                    this.previewImage = "/img/contents/" + this.contentList.pic;
                });
        },
        getAdmin() {
            axios.get("/api/userAdmin").then((response) => {
                this.adminList = response.data;
            });
        },
        ////////////////////////////////////////////////////////////////
        setAdmin(id) {
            this.adminShow = false;

            this.data.owner = id;

            if (id != null) {
                const arr = Array.from(this.adminList); // หรือ this.nationList.slice()
                const res = arr.find((selection) => selection.id == id);
                return res ? res.name + " " + res.surname : null;
            }

            return null;
        },
        ////////////////////////////////////////////////////////////////
        showAdmin() {
            this.adminShow = !this.adminShow;
        },
        ////////////////////////////////////////////////////////////////
        resetFile() {
            this.$refs.fileInput.value = null; //clear ช่อง choose
            this.previewImage = "";
            this.file = "";
        },
        selectImage() {
            this.$refs.fileInput.click();
        },
        pickFile() {
            this.alertUpload = false;

            let input = this.$refs.fileInput;
            this.file = input.files; //เอาไฟล์รูปเข้าตัวแปร file
            //console.log(this.file[0])
            if (this.file && this.file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage = e.target.result;
                    //this.file = e.target.files[0];
                };
                reader.readAsDataURL(this.file[0]);
                this.$emit("input", this.file[0]);
            }
        },
        async sendData() {
            // SweetAlert Confirm
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to confirm the changes?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                customClass: {
                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                    title: "text-2xl font-bold text-gray-800",
                    htmlContainer: "text-base text-gray-600",
                    confirmButton:
                        "bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2",
                    cancelButton:
                        "bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 ml-2",
                },
                didOpen: () => {
                    Swal.getPopup().style.fontFamily = "Poppins, sans-serif";
                },
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        if (!this.validateData()) {
                            // SweetAlert Error
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Check required fields please.",
                                customClass: {
                                    popup: "rounded-xl shadow-lg bg-white font-poppins",
                                    title: "text-2xl font-bold text-gray-800",
                                    confirmButton:
                                        "bg-rose-300 hover:bg-rose-400 text-white font-medium px-4 py-2",
                                },
                                didOpen: () => {
                                    Swal.getPopup().style.fontFamily =
                                        "Poppins, sans-serif";
                                },
                            });
                            return;
                        } else {
                            if (this.file && this.file.length > 0) {
                                let formData = new FormData(); //สร้าง FromData เพื่อรองรับข้อมูลประเภท File
                                formData.append("file", this.file[0]);

                                const config = {
                                    headers: {
                                        "content-type": "multipart/form-data",
                                    },
                                };
                                await axios
                                    .post(
                                        "/api/uploadContent",
                                        formData,
                                        config
                                    )
                                    .then((response) => {
                                        this.data.pic = response.data;
                                    });
                            }

                            if (
                                this.data.pic !== null ||
                                this.data.pic !== ""
                            ) {
                                await axios
                                    .put(
                                        "/api/content/" + this.$route.params.id,
                                        this.data
                                    )
                                    .then((response) => {
                                        Swal.fire({
                                            title: response.data.message,
                                            icon: "success",
                                            draggable: true,
                                            customClass: {
                                                popup: "rounded-xl shadow-lg bg-white font-poppins",
                                                title: "text-2xl text-gray-800",
                                                htmlContainer:
                                                    "text-base text-gray-600",
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
                                        this.$router.push("/content");
                                    });
                            }
                        }
                    } catch (err) {
                        throw err;
                    }
                }
            });
        },
        validateData() {
            let isValid = true;

            const req = ["title", "short_name", "owner"];

            for (let key of req) {
                const value = this.data[key];

                if (
                    value === null ||
                    value === undefined ||
                    value.toString().trim() === ""
                ) {
                    this.errors[key] = "** Required field.";
                    isValid = false;
                } else {
                    this.errors[key] = ""; // เคลียร์ข้อความถ้ามีค่า
                }
            }

            return isValid;
        },
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>

<style>
.imagePreviewWrapper {
    width: auto;
    height: auto;
    display: block;
    cursor: pointer;
    margin: 0 auto;
    background-size: cover;
    background-position: center center;
}

.ck-editor__editable {
    max-height: 400px;
}
</style>
