<template>
    <div class="bg-white p-4 rounded-2xl">
        <div class="mb-6 flex items-center">
            <box-icon
                type="logo"
                name="gmail"
                class="mr-2"
                size="lg"
                color="#85c1e9"
            ></box-icon>
            <span class="text-[#85c1e9] text-2xl font-bold">
                : {{ title }}</span
            >
        </div>

        <div
            v-html="template"
        ></div>
    </div>
</template>

<script>
import boxicons from "boxicons";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";
import Swal from "sweetalert2";

export default {
    mounted() {
        this.getEmail();
    },
    data() {
        return {
            logo: "/img/logo/logo.png",
            title: "",
            template: "",
        };
    },
    methods: {
        getEmail() {
            axios
                .get("/api/email/" + this.$route.params.id + "/edit")
                .then((response) => {
                    this.title = response.data.title;
                    this.template = response.data.template;
                });
        },
    },
};
</script>
