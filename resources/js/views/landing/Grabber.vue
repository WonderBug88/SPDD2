<template>
    <div class="px-2">
        <form @submit.prevent="" class="flex items-center">
            <input type="text" placeholder="url" class="grow inputan" />
            <button class="flex-none btn">Scrape URL</button>
            <select class="flex-none inputan text-center">
                <option value="0" hidden selected>Task</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </form>
        <div class="mt-10 grid grid-cols-3 gap-6 relative">
            <div>
                <div class="item">
                    <span>Image</span>
                    <img
                        src="https://cdn11.bigcommerce.com/s-99oa2tso/products/99961/images/205585/apipbspvj__33970.1646705182.190.250.jpg?c=2"
                        class="w-full rounded-md shadow-md"
                    />
                </div>
                <div class="item">
                    <span>Title</span>
                    <textarea class="inputan h-[80px] w-full"></textarea>
                </div>
                <div class="item">
                    <span>Category Filter</span>
                    <textarea class="inputan h-[80px] w-full"></textarea>
                </div>

                <div class="item">
                    <span>Description</span>
                    <textarea class="inputan h-[80px] w-full"></textarea>
                </div>
            </div>
            <div class="col-span-2 text-sm">
                <table class="table-fixed w-full mb-4">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Image Variant</th>
                            <th>Finish</th>
                            <th>Size</th>
                            <th>Colour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="index in 6" :key="index" class="table-input">
                            <td>
                                <input type="text" class="" />
                            </td>
                            <td>
                                <input type="number" class="" />
                            </td>
                            <td>
                                <input type="text" class="" />
                            </td>
                            <td>
                                <input type="text" class="" />
                            </td>
                            <td>
                                <input type="text" class="" />
                            </td>
                            <td>
                                <input type="text" class="" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="item">
                    <button class="btn w-full">Next Tab</button>
                </div>
            </div>
        </div>
    </div>
</template>
