<script setup>
import { onMounted, ref, computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import Product from "./Product.vue";
import Grabber from "./Grabber.vue";
import Related from "./Related.vue";
import Importer from "./Importer.vue";
import IconSorter from "./IconSorter.vue";

const status = ref("");
const search = ref("");
const brand = ref(0);
const listBrand = ref([]);
const sub = ref("0");
const category = ref("");
const menu = ref(1);
const page = ref(1);
const limit = ref(10);

const listStatus = ref(["available", "disabled", "preorder"]);
const listCategory = ref([]);
const listData = ref([]);
const meta = ref({
    pagination: { total: 0, links: {}, total_pages: 0, current_page: 1 },
});
const ascending = ref(true);
const sortBy = ref("id");
const filtername = computed(() => {
    return listData.value.filter((post) => {
        const tmp = post.name

            .toLowerCase()
            .includes(search.value.toLowerCase());

        if (status.value != 2) {
            return (
                post.name.toLowerCase().includes(search.value.toLowerCase()) &&
                post.status == status.value
            );
        }
        return tmp;
    });
});

const loading = ref(false);

const route = useRoute();
const router = useRouter();
function sortB(e) {
    if (sortBy.value == e) {
        ascending.value = !ascending.value;
    }
    sortBy.value = e;
    getDataz();
}
function nextPage(e) {
    if (e) {
        page.value = page.value + 1;
    } else {
        page.value = page.value - 1;
    }
    getData();
}

function getDataz() {
    page.value = 1;
    getData();
}

function onChange(e) {
    console.log(e.target.value);
}
function editChange(e) {}

function getBrands(e) {
    let dat = "Nothing";
    for (let x = 0; x < listBrand.value.length; x++) {
        if (listBrand.value[x].id == e) {
            dat = listBrand.value[x].name;
        }
    }
    return dat;
}

function getCategory(e) {
    let dat = "Nothing";
    for (let x = 0; x < listCategory.value.length; x++) {
        if (listCategory.value[x].id == e) {
            dat = listCategory.value[x].name;
        }
    }
    return dat;
}
function getData() {
    loading.value = true;
    let ascz = "asc";
    if (!ascending.value) {
        ascz = "desc";
    }
    axios
        .get(
            "products?limit=" +
                limit.value +
                "&page=" +
                page.value +
                "&keyword=" +
                search.value +
                "&sort=" +
                sortBy.value +
                "&direction=" +
                ascz +
                "&availability=" +
                status.value +
                "&categories=" +
                category.value +
                "&brand_id=" +
                brand.value
        )
        .then((e) => {
            listData.value = e.data.data;
            meta.value = e.data.meta;
            console.log(listData.value);
            loading.value = false;
        });
}

function setMenu(e) {
    menu.value = e;
    if (e == 1) {
        router.push("/laravel-new/");
    }
}

function toProduct(e) {
    router.push("/laravel-new/" + e);
    menu.value = 2;
}

onMounted(() => {
    axios.get("brands?limit=200&page=1").then((e) => {
        listBrand.value = e.data.data;
        console.log(e.data.data);
    });

    axios.get("categories?limit=200").then((e) => {
        listCategory.value = e.data.data;
        console.log(e.data);
    });
    getData();
    if (route.params.id) {
        menu.value = 2;
    } else {
    }
});
</script>
<template>
    <div class="min-h-screen bg-gray-100 text-gray-700 pb-20">
        <div
            class="fixed top-0 left-0 px-5 py-2 bg-primary flex w-full min-h-[50px] shadow-lg justify text-white items-center justify-center tracking-widest font-medium z-40"
        >
            Smart Product Development Database (SPDD)
        </div>
        <div class="lg:w-[1028px] mx-auto px-4 pt-[90px]">
            <!-- <div
                class="bg-white text-sm px-5 py-1.5 border-l-4 border-primary shadow-sm"
            >
                <span class="text-primary font-medium">
                    Spreadsheet or Database or Big commerce
                </span>
                / Data sheet
            </div> -->
            <div
                class="lg:flex text-sm border-gray-200 border-b nav text-gray-400"
            >
                <div :class="{ active: menu == 1 }" @click="setMenu(1)">
                    All Product
                </div>
                <div :class="{ active: menu == 2 }" @click="menu = 2">
                    Product & Variants Creator
                </div>
                <div :class="{ active: menu == 3 }" @click="menu = 3">
                    Product Description Importer
                </div>
                <div :class="{ active: menu == 4 }" @click="menu = 4">
                    Product Grabber
                </div>
                <div :class="{ active: menu == 5 }" @click="menu = 5">
                    Related Product
                </div>
            </div>
            <div
                class="mt-3 bg-white min-h-[300px] rounded-md shadow-lg p-4 pb-8 relative"
            >
                <div
                    class="w-full h-full rounded-md absolute top-0 left-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-10"
                    v-if="loading"
                >
                    <span class="loader"></span>
                </div>
                <div v-if="menu == 1">
                    <div class="lg:flex items-center justify-between text-sm">
                        <form
                            class="px-4 lg:px-0 relative"
                            @submit.prevent="getDataz()"
                        >
                            <input
                                type="text"
                                v-model="search"
                                placeholder="Search Name SKU..."
                                class="lg:w-[300px] px-4 py-1.5 border border-gray-200 shadow-md rounded-lg focus:outline-none"
                            />
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5 absolute right-7 top-1.5 text-gray-500"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                />
                            </svg>
                        </form>
                        <div class="">
                            <select
                                @change="onChange($event)"
                                class="selects"
                                v-model="sub"
                            >
                                <option value="0" hidden selected>
                                    Select API
                                </option>
                                <option value="1">Customer Website</option>
                                <option value="2">Manufacture API</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 text-right text-sm">
                        <select
                            @change="getDataz()"
                            class="selects w-[200px]"
                            v-model="brand"
                        >
                            <option :value="0" selected>All Brand</option>
                            <option
                                v-for="index in listBrand"
                                :key="index"
                                :value="index.id"
                            >
                                {{ index.name }}
                            </option>
                        </select>
                        &nbsp;&nbsp;
                        <select
                            @change="getDataz()"
                            class="selects w-[150px]"
                            v-model="status"
                        >
                            <option value="" selected>All Status</option>

                            <option
                                v-for="index in listStatus"
                                :value="index"
                                :key="index"
                            >
                                {{ index }}
                            </option>
                        </select>
                        &nbsp;&nbsp;
                        <select
                            @change="getDataz()"
                            class="selects w-[300px]"
                            v-model="category"
                        >
                            <option value="">All Category</option>
                            <option
                                v-for="index in listCategory"
                                :key="index"
                                :value="index.id"
                            >
                                {{ index.name }}
                            </option>
                        </select>
                    </div>
                    <div class="pt-10 px-2">
                        <div class="overflow-x-auto">
                            <table class="table-auto min-w-full text-sm">
                                <thead>
                                    <tr class="text-left table-head uppercase">
                                        <th
                                            :class="{
                                                active: sortBy == 'id',
                                            }"
                                            class=""
                                            @click="sortB('id')"
                                        >
                                            ID.
                                            <IconSorter />
                                        </th>
                                        <th
                                            :class="{
                                                active: sortBy == 'name',
                                            }"
                                            @click="sortB('name')"
                                        >
                                            Name
                                            <IconSorter />
                                        </th>
                                        <th class="">Brand</th>
                                        <th class="">Category</th>
                                        <th class="">SubCategory</th>
                                        <th
                                            :class="{
                                                active: sortBy == 'is_visible',
                                            }"
                                            class=""
                                            @click="sortB('is_visible')"
                                        >
                                            status
                                            <IconSorter />
                                        </th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr
                                        class="border-b border-gray-200"
                                        v-for="index in listData"
                                        :key="index"
                                    >
                                        <td class="py-3">{{ index.id }}</td>
                                        <td>{{ index.name }}</td>
                                        <td>{{ getBrands(index.brand_id) }}</td>
                                        <td>
                                            <span v-if="index.categories[0]">{{
                                                getCategory(index.categories[0])
                                            }}</span>
                                        </td>
                                        <td>
                                            <span v-if="index.categories[1]">{{
                                                getCategory(index.categories[1])
                                            }}</span>
                                            <span v-else>No SubCategory</span>
                                        </td>
                                        <td>
                                            <span
                                                class="uppercase"
                                                :class="{
                                                    'text-white bg-primary py-1 px-4 rounded-md text-xs':
                                                        index.availability ==
                                                        'available',
                                                    'text-primary border border-primary py-1 px-4 rounded-md text-xs':
                                                        index.availability !=
                                                        'available',
                                                }"
                                            >
                                                {{ index.availability }}
                                            </span>
                                        </td>
                                        <td class="w-[90px]">
                                            <button
                                                @click="toProduct(index.id)"
                                                class="p-1 bg-primary rounded-md hover:bg-darkprimary ease-in-out duration-300 mr-2"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-4 text-white"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                                    />
                                                </svg>
                                            </button>

                                            <button
                                                class="p-1 bg-red-500 text-white rounded-md hover:bg-darkprimary ease-in-out duration-300"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-4 text-white"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                    />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="paginate pt-4">
                        <div class="flex items-center justify-between">
                            <form @submit.prevent="getData()">
                                <select
                                    @change="getDataz()"
                                    class="selects text-xs"
                                    v-model="limit"
                                >
                                    <option :value="10">10 Perpage</option>
                                    <option :value="20">20 Perpage</option>
                                    <option :value="40">40 Perpage</option>
                                    <option :value="60">60 Perpage</option>
                                </select>
                                <span class="px-2 pr-5 text-xs">
                                    of {{ meta.pagination.total }} total
                                    entries</span
                                >

                                <input
                                    type="text"
                                    v-model="page"
                                    placeholder="Page"
                                    class="lg:w-[40px] px-2 py-1.5 border border-gray-200 shadow-md rounded-md focus:outline-none text-xs"
                                />
                                <span class="px-2 text-xs">
                                    of {{ meta.pagination.total_pages }} total
                                    Page</span
                                >
                            </form>
                            <div class="flex items-center">
                                <div
                                    v-if="meta.pagination.links.previous"
                                    @click="nextPage(false)"
                                    class="mx-1 text-sm cursor-pointer transform hover:scale-110 ease-in-out duration-300"
                                >
                                    Previous
                                </div>
                                <div>
                                    {{ meta.pagination.current_page }}
                                </div>
                                <div
                                    v-if="meta.pagination.links.next"
                                    @click="nextPage(true)"
                                    class="mx-1 text-sm cursor-pointer transform hover:scale-110 ease-in-out duration-300"
                                >
                                    Next
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Product v-if="menu == 2" />
                <Importer v-if="menu == 3" />
                <Grabber v-if="menu == 4" />
                <Related v-if="menu == 5" />
                <div></div>
            </div>
        </div>
    </div>
</template>
<style>
.loader {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    position: relative;
    animation: rotate 1s linear infinite;
}
.loader::before,
.loader::after {
    content: "";
    box-sizing: border-box;
    position: absolute;
    inset: 0px;
    border-radius: 50%;
    border: 5px solid #fff;
    animation: prixClipFix 2s linear infinite;
}
.loader::after {
    border-color: #00d56a;
    animation: prixClipFix 2s linear infinite,
        rotate 0.5s linear infinite reverse;
    inset: 6px;
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes prixClipFix {
    0% {
        clip-path: polygon(50% 50%, 0 0, 0 0, 0 0, 0 0, 0 0);
    }
    25% {
        clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 0, 100% 0, 100% 0);
    }
    50% {
        clip-path: polygon(
            50% 50%,
            0 0,
            100% 0,
            100% 100%,
            100% 100%,
            100% 100%
        );
    }
    75% {
        clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 0 100%);
    }
    100% {
        clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 0 0);
    }
}
</style>
