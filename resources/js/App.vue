<script setup>
import { onMounted } from "@vue/runtime-core";
import { RouterView, useRoute } from "vue-router";

const route = useRoute();
onMounted(() => {
    console.log(route.path);
});
</script>

<template>
    <RouterView />
</template>
<style>
/* width */
::-webkit-scrollbar {
    height: 0.2rem;
    width: 0.4rem;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
