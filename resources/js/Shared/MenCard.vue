<template>
    <section class="container-fluid bg-light">
        <div class="row align-items-center g-2 pb-3 px-2">
            <div class="col-xl-3 col-md-4 col-sm-6  col-6" v-for="post in posts" :key="post.id">
                <a :href="`/collections/men/${post.slug}`" class="text-decoration-none text-dark">
                    <div id="div" class="text-center h-75">
                        <ImgCard :imgfolder ="post.img_folder" />
                        <div class="text-center mt-1">
                            <h5 class="card-title fs-6 text-truncate">{{ post.title }}</h5>
                            <p class="card-center mt-1">{{ post.price }}$</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</template>
<style>
    #div{
        position: relative;
    }
</style>


<script setup>
import ImgCard from '../Shared/ImgCard.vue';
defineProps({
    posts: Array,
})
</script>