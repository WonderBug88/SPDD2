<template>
    <div class="px-2">
        <!-- <form @submit.prevent="" class="flex items-center">
            <input type="text" placeholder="url" class="grow inputan" />
            <button class="flex-none btn">Scrape URL</button>
            <select class="flex-none inputan text-center">
                <option value="0" hidden selected>Task</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </form> -->
        <div class="mt-10 grid grid-cols-2 gap-6 relative">
            <div>
                <div class="item">
                    <textarea class="inputan h-[180px] w-full"></textarea>
                </div>
                <div>
                    <button class="btn w-full">Approve</button>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <div class="item">
                        <span>Title</span>
                        <textarea class="inputan h-[140px] w-full"></textarea>
                    </div>
                    <div class="item">
                        <span>Description</span>
                        <textarea class="inputan h-[120px] w-full"></textarea>
                    </div>
                </div>
                <div>
                    <div class="item">
                        <span>Meta Title</span>
                        <textarea class="inputan h-[80px] w-full"></textarea>
                    </div>
                    <div class="item">
                        <span>Meta Description</span>
                        <textarea class="inputan h-[80px] w-full"></textarea>
                    </div>
                    <div class="item">
                        <span>Meta Keyword</span>
                        <textarea class="inputan h-[60px] w-full"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-2">
        <div class="grid grid-cols-4 gap-3">
            <div class="item">
                <span>Title</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span>Average Price</span>
                <input
                    type="number"
                    class=""
                    placeholder="price from Options"
                />
            </div>
            <div class="item">
                <span>Retail</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span>Parent SKU</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span>Thumbnail Image</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span>Description</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span>Category Filter</span>
                <input type="text" class="" />
            </div>
            <div class="item">
                <span>Url</span>
                <input type="text" class="" />
            </div>
            <div class="item col-end-5">
                <button class="btn w-full">Next Tab</button>
            </div>
        </div>
    </div>
</template>
