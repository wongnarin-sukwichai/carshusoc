<template>
    <div class="bg-white p-4 rounded-2xl">
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
            {{ content.title }}
        </div>
        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
        >
            <span class="font-bold">ชื่อย่อ:</span>
            <span class="font-bold text-sky-500 ml-2">{{
                content.short_name
            }}</span>
        </div>
        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
            v-html="content.detail"
        ></div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
            v-html="content.mission"
        ></div>

        <div
            class="border-2 border-dashed border-purple-200 text-lg p-4 rounded-xl mb-2"
            v-html="content.scope"
        ></div>
        <div
            class="border-2 border-dashed border-purple-200 text-md p-4 rounded-xl mb-2"
        >
            <span class="font-bold">ติดต่อเรา:</span>
            <div class="flex items-left justify-left gap-4 mt-2">
                <box-icon
                    type="logo"
                    name="facebook-circle"
                    color="oklch(54.6% 0.245 262.881)"
                ></box-icon>
                <a
                    :href="content.facebook"
                    class="text-md text-sky-600 hover:underline"
                    target="_blank"
                >
                    {{ content.facebook }}
                </a>
            </div>
            <div class="flex items-left justify-left gap-4 mt-2">
                <box-icon
                    type="logo"
                    name="gmail"
                    color="oklch(70.4% 0.191 22.216)"
                ></box-icon>
                {{ content.email }}
            </div>
            <div class="flex items-left justify-left gap-4 mt-2">
                <box-icon
                    name="home"
                    color="oklch(78.9% 0.154 211.53)"
                ></box-icon>
                <a
                    :href="content.website"
                    class="text-md text-sky-600 hover:underline"
                    target="_blank"
                >
                    {{ content.website }}
                </a>
            </div>
            <div class="flex items-left justify-left gap-4 mt-2">
                <box-icon
                    name="phone"
                    color="oklch(70.4% 0.04 256.788)"
                    type="solid"
                ></box-icon>
                {{ content.tel }}
            </div>
            <div class="flex items-left justify-left gap-4 mt-2">
                <box-icon
                    name="user"
                    color="oklch(70.4% 0.04 256.788)"
                    type="solid"
                ></box-icon>
                {{ owner }}
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    mounted() {
        this.getContent();
    },
    data() {
        return {
            content: "",
            owner: ""
        };
    },
    methods: {
        getContent() {
            axios
                .get("/api/detail/" + this.$route.params.id)
                .then((response) => {
                    this.content = response.data;
                    this.getOwner(this.content.owner);
                });
        },
        async getOwner(id) {
            axios.get("/api/user/" + id).then((response) => {
                this.owner = response.data.message
            });
        },
    },
};
</script>
