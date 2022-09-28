<script setup>
import { onMounted, ref, watch } from "vue";
import { useRoute } from "vue-router";
import IconSorter from "./IconSorter.vue";

const route = useRoute();
const free_ship = ref(false);
const avail = ref(false);
const select = ref(0);
const price = ref(37.51);
const img = ref("");
const listDataFront = ref([]);
const product_data = ref({
    id: 99950,
    name: "WestPoint |  Martex Cabana Collection | 30X66 | 13Lbs\/Dz |  Pack Of 12",
    type: "physical",
    sku: "SPLASH-MARTEX",
    description: "",
    weight: 15.81,
    width: 16,
    depth: 9.5,
    height: 20,
    price: 10.34,
    cost_price: 0,
    retail_price: 0,
    sale_price: 0,
    map_price: 0,
    tax_class_id: 0,
    product_tax_code: "",
    calculated_price: 10.34,
    categories: [5095, 4977, 5278, 5218, 5217, 4914],
    brand_id: 2954,
    option_set_id: 4531,
    option_set_display: "right",
    inventory_level: 0,
    inventory_warning_level: 0,
    inventory_tracking: "none",
    reviews_rating_sum: 0,
    reviews_count: 0,
    total_sold: 20,
    fixed_cost_shipping_price: 0,
    is_free_shipping: false,
    is_visible: true,
    is_featured: false,
    related_products: [-1],
    warranty: "",
    bin_picking_number: "",
    layout_file: "product.html",
    upc: "",
    mpn: "",
    gtin: "",
    search_keywords: "",
    availability: "available",
    availability_description: "SOME Items could take 2-5 weeks to ship",
    gift_wrapping_options_type: "any",
    gift_wrapping_options_list: [],
    sort_order: 0,
    condition: "New",
    is_condition_shown: false,
    order_quantity_minimum: 0,
    order_quantity_maximum: 0,
    page_title:
        "Westpoint | Martex Cabana Collection | Pool Towel | 30X66 | 13Lbs\/Dz | Pack Of 12 (SPLASH-MARTEX)",
    meta_keywords: [
        "best hotel hospitality supplies",
        " hotel bedding supplies",
        " hotel bathroom supplies",
    ],
    meta_description: "",
    date_created: "2016-04-02T22:45:31+00:00",
    date_modified: "2022-05-23T18:14:51+00:00",
    view_count: 6260,
    preorder_release_date: null,
    preorder_message: "",
    is_preorder_only: false,
    is_price_hidden: false,
    price_hidden_label: "",
    custom_url: {
        url: "\/westpoint-martex-cabana-collection-30x66-13lbs-dz-pack-of-12\/",
        is_customized: false,
    },
    base_variant_id: null,
    open_graph_type: "product",
    open_graph_title: "",
    open_graph_description: "",
    open_graph_use_meta_description: true,
    open_graph_use_product_name: true,
    open_graph_use_image: true,
});
const cost_prices = ref(0);
const listDataBack = ref([]);
const listCategory = ref([]);
function random() {
    return parseFloat(Math.floor(Math.random() * 50) * 0.1);
}
function toMax3Decimals(x) {
    return +x.toFixed(3);
}
function getProduct(ez) {
    axios.get("products/" + ez).then((e) => {
        product_data.value = e.data.data;
        console.log(e.data);
    });

    axios.get("products/" + ez + "/variants").then((e) => {
        listDataFront.value = e.data.data;
        listDataBack.value = e.data.data;
        console.log(e.data.data);
    });

    axios.get("products/" + ez + "/images").then((e) => {
        // product_data.value = e.data.data;
        if (e.data.data.length > 0) {
            img.value = e.data.data[0].url_thumbnail;
        }
        console.log(e.data);
    });
}

watch(
    () => route.params.id,
    async (newId) => {
        console.log(newId);
        getProduct(newId);
        if (listCategory.value.length == 0) {
            axios.get("categories?limit=200").then((e) => {
                listCategory.value = e.data.data;
            });
        }
    }
);

onMounted(() => {
    if (route.params.id) {
        getProduct(route.params.id);
        axios.get("categories?limit=200").then((e) => {
            listCategory.value = e.data.data;
            console.log(e.data);
        });
    }
});
</script>
<template>
    <form class="grid grid-cols-2 gap-4" @submit.prevent="">
        <div class="pl-2">
            <div class="item">
                <span> Name</span>
                <input
                    type="text"
                    v-model="product_data.name"
                    class=""
                    placeholder="Name Product....."
                />
            </div>
            <div class="item">
                <span>Image</span>
                <img :src="img" class="w-[300px] rounded-md shadow-md" />
            </div>
            <div class="item">
                <span> Category</span>
                <select
                    class="w-full bg-white py-2 px-3 rounded-md shadow-md border border-gray-200 appearance-none focus:outline-none"
                    v-model="product_data.categories[0]"
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
            <div class="item">
                <span> Parent SKU</span>
                <input
                    type="text"
                    class=""
                    v-model="product_data.sku"
                    placeholder="Parent SKU....."
                />
            </div>
        </div>
        <div class="pl-3">
            <div class="item">
                <span> Price</span>
                <input
                    type="number"
                    class=""
                    placeholder="37,8"
                    v-model="product_data.price"
                />
            </div>
            <div class="item mb-0">
                <span> Price Case</span>
                <div class="grid grid-cols-2 gap-4">
                    <div class="item">
                        <input
                            type="number"
                            class=""
                            placeholder="0"
                            v-model="product_data.cost_price"
                        />
                    </div>
                    <div class="item">
                        <input
                            type="number"
                            class=""
                            placeholder="5"
                            v-model="product_data.map_price"
                        />
                    </div>
                </div>
            </div>
            <div class="item">
                <span> Free Shipping</span>
                <div
                    class="relative w-[200px] mt-1 mb-8 bg-gray-200 h-[31px] rounded-md"
                >
                    <button
                        :class="{
                            'translate-x-0 bg-white text-primary ':
                                !product_data.is_free_shipping,
                            'translate-x-full bg-primary text-white':
                                product_data.is_free_shipping,
                        }"
                        class="w-1/2 h-[30px] absolute top-0 border-primary border rounded-md ease-in-out duration-300"
                        @click="
                            product_data.is_free_shipping =
                                !product_data.is_free_shipping
                        "
                    >
                        {{ product_data.is_free_shipping }}
                    </button>
                </div>
            </div>
            <div class="item" v-if="!free_ship">
                <span> Fixed Shipping</span>
                <input
                    type="number"
                    class=""
                    placeholder="37,8"
                    v-model="product_data.fixed_cost_shipping_price"
                />
            </div>
            <div class="item">
                <span> Shipping Group</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span> Shipping Origin</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span> Dimensional Rules</span>
                <input type="text" class="" />
            </div>
        </div>
        <div class="col-span-2">
            <div class=" ">
                <input
                    type="submit"
                    value="Update"
                    class="bg-primary w-full py-2 rounded-md shadow-md text-white cursor-pointer"
                />
            </div>
        </div>
    </form>
    <div class="mt-8">
        <div
            class="text-center text-primary text-base font-bold tracking-wider uppercase mb-4"
        >
            Frontend Option
        </div>
        <div class="max-h-[200px] overflow-y-auto">
            <table class="table-auto w-full text-sm">
                <thead>
                    <tr class="table-head">
                        <th>SKU</th>
                        <th>Size</th>
                        <th>Colour</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr
                        v-for="index in listDataFront"
                        :key="index"
                        class="table-input"
                    >
                        <td>
                            <input
                                type="text"
                                v-model="index.sku"
                                placeholder="Enter SKU"
                            />
                        </td>
                        <td>
                            <div v-if="index.option_values.length > 0">
                                <input
                                    type="text"
                                    v-model="index.option_values[0].label"
                                    placeholder="Enter Size"
                                />
                            </div>
                        </td>

                        <td>
                            <div v-if="index.option_values.length > 1">
                                <input
                                    type="text"
                                    v-model="index.option_values[1].label"
                                />
                            </div>
                            <div v-else><input type="text" /></div>
                        </td>

                        <td>
                            <input type="text" v-model="index.price" />
                        </td>
                        <td>
                            <div class="item">
                                <span> Category</span>
                                <select
                                    class="w-full bg-white py-2 px-3 rounded-md shadow-md border border-gray-200 appearance-none focus:outline-none"
                                    v-model="product_data.categories[0]"
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
                        </td>
                        <td>
                            <!-- <img
                                class="rounded w-[100px] h-[50px] object-cover"
                                :src=""
                            /> -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div
            class="text-center text-primary text-base font-bold tracking-wider uppercase mt-10 mb-4"
        >
            Backend Option
        </div>

        <div class="max-h-[200px] overflow-y-auto px-2">
            <table class="table-fixed w-full text-sm text-left">
                <thead>
                    <tr class="table-head">
                        <th class="same_tr">SKU</th>
                        <th class="same_tr">Height</th>
                        <th class="same_tr">Width</th>
                        <th class="same_tr">Depth</th>
                        <th class="same_tr">Weight</th>
                        <th class="same_tr">Cost</th>
                        <th class="same_tr">Price/EA</th>
                        <th class="same_tr">Qty (sold)</th>
                        <th class="same_tr">Cost Case Price</th>
                        <th class="same_tr">Price Case</th>
                        <th class="same_tr">Avail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="table-input"
                        v-for="index in listDataBack"
                        :key="index"
                    >
                        <td class="same_post">
                            <span class="sm_span">{{ index.sku }}</span>
                        </td>
                        <td>
                            <input
                                type="text"
                                v-model="index.height"
                                class="same_backend"
                                placeholder="Enter Height"
                                name="height[rows_1]"
                            />
                        </td>
                        <td>
                            <input
                                type="text"
                                v-model="index.width"
                                class="same_backend"
                                placeholder="Enter Width"
                                name="width[rows_1]"
                            />
                        </td>
                        <td>
                            <input
                                type="text"
                                v-model="index.depth"
                                class="same_backend"
                                placeholder="Enter Depth"
                                name="depth[rows_1]"
                            />
                        </td>
                        <td>
                            <input
                                type="text"
                                v-model="index.weight"
                                class="same_backend"
                                placeholder="Enter Weight"
                                name="weight[rows_1]"
                            />
                        </td>
                        <td>
                            <input
                                type="text"
                                v-model="index.cost_price"
                                class="same_backend"
                                placeholder="Enter Cost price"
                                name="cost_price[rows_1]"
                            />
                        </td>
                        <td class="same_post">
                            <span class="sm_span">{{ index.price }}</span>
                        </td>
                        <td>
                            <span class="sm_span">{{
                                product_data.total_sold
                            }}</span>
                        </td>
                        <td>
                            <input
                                type="text"
                                v-model="index.cost_price"
                                class="same_backend"
                                placeholder="Enter Cost prices"
                            />
                        </td>
                        <td>
                            <span class="sm_span">{{
                                index.calculated_price
                            }}</span>
                        </td>
                        <td
                            class="button_check"
                            style="padding-top: 20px; padding-bottom: 0px"
                        >
                            <div
                                class="text-xs relative w-[60px] mt-1 mb-8 bg-gray-200 h-[31px] rounded-md"
                            >
                                <button
                                    :class="{
                                        'translate-x-0 bg-white text-primary ':
                                            index.purchasing_disabled,
                                        'translate-x-full bg-primary text-white':
                                            !index.purchasing_disabled,
                                    }"
                                    class="w-1/2 h-[30px] absolute top-0 border-primary border rounded-md ease-in-out duration-300"
                                    @click="
                                        index.purchasing_disabled =
                                            !index.purchasing_disabled
                                    "
                                >
                                    {{ !index.purchasing_disabled }}
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
