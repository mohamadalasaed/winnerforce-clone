<template>
    <section class="container-fluid bg-light">
        <div class="row align-items-center g-2 pb-3 px-2">
            <div class="col-xl-3 col-md-4 col-sm-6  col-6" v-for="post in posts" :key="post.id">
                <a :href="`/collections/${type}/${post.slug}`" class="text-decoration-none text-dark">
                    <div id="div" class="text-center h-75">
                        <span 
                            v-show="post.size_s==0&&post.size_m==0&&post.size_l==0&&post.size_xl==0&&post.size_xxl==0"
                            id="out"
                            class="text-dark bg-light rounded-0 p-2"
                            >
                            OUT OF STOCK
                        </span>
                        <ImgCard :post="post" />
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
    #out{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 6;
    }
</style>


<script setup>
import ImgCard from './ImgCard.vue';
defineProps({
    posts: Array,
    type: String
})
</script>