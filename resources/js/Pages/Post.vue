<template>

    <Head :title="`Men | ${post.title}`" />
    <section class="row">
        <div class="col">
            <img class="img-fluid" :src="`/images/thumbnailsMen/${post.img_folder}/1.jpg`" />
        </div>
        <div class="col">
            <img class="img-fluid" :src="`/images/thumbnailsMen/${post.img_folder}/2.jpg`" />
        </div>
        <div class="col">
            <img class="img-fluid" :src="`/images/thumbnailsMen/${post.img_folder}/3.jpg`" />
        </div>
    </section>

</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';

let props = defineProps({
    post: Object,
});

</script>