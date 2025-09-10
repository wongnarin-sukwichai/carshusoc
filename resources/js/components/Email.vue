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
            <span class="text-[#85c1e9] text-2xl font-bold">{{
                $t("admin.cont")
            }}</span>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <!--Upload -->
            <div
                class="relative border-2 border-dashed rounded-xl p-48 cursor-pointer hover:border-gray-300 flex flex-col items-center justify-center text-center"
            >
              
            </div>

            <!-- Layout 2 -->
            <div class="col-span-2 border-2 border-dashed rounded-xl p-8">
                
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div class="col-span-2 mt-6 flex justify-end">
                <button
                    class="flex border-2 border-dashed p-2 rounded-xl bg-lime-200 border-lime-300 hover:bg-lime-300"
                 
                >
                    <box-icon name="plus-circle" class="mr-2"></box-icon>
                    {{ $t("addcont.add") }}
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
        
    },
    data() {
        return {
          
        };
    },
    methods: {
    },
    computed: {
  
    },
};
</script>
