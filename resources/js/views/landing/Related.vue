<script setup>
import { ref } from "vue";

const listData = ref([
    {
        image: "image",
        sku: "sku",
        varient: "varient",
        url: "Image Url",
    },
    {
        image: "image",
        sku: "sku",
        varient: "varient",
        url: "Image Url",
    },
    {
        image: "image",
        sku: "sku",
        varient: "varient",
        url: "Image Url",
    },
    {
        image: "image",
        sku: "sku",
        varient: "varient",
        url: "Image Url",
    },
]);
</script>
<template>
    <div class="px-2">
        <div class="mb-10">
            <label
                class="ml-2 w-44 flex flex-col items-center px-4 py-6 bg-primary text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-white hover:text-primary ease-in-out duration-300"
            >
                <svg
                    class="w-8 h-8"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                    />
                </svg>
                <span class="mt-2 text-xs leading-normal">Select a file</span>
                <input type="file" class="hidden" />
            </label>
            <div><button class="btn mt-2 w-44 text-center">Upload</button></div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto min-w-full text-sm">
                <thead class="text-primary border-b border-primary">
                    <tr class="text-left table-head uppercase">
                        <th class="py-3">Image</th>
                        <th class="">SKU</th>
                        <th class="">Varient</th>
                        <th class="">Image URL</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr
                        class="border-b border-gray-200"
                        v-for="index in listData"
                        :key="index"
                    >
                        <td class="py-3">{{ index.image }}</td>
                        <td>{{ index.sku }}</td>
                        <td>{{ index.varient }}</td>
                        <td>{{ index.url }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
