<template>
        <div class="row align-items-center g-2 pb-3 px-2">
            <div class="col-xl-3 col-md-4 col-sm-6  col-6" v-for="product in products" :key="product.id">
                <Link :href="`/collections/${type}/${product.slug}`" class="text-decoration-none text-dark">
                    <div id="div" class="text-center h-75">
                        <span 
                            v-if="product.size_s==0&&product.size_m==0&&product.size_l==0&&product.size_xl==0&&product.size_xxl==0"
                            id="outOfStock"
                            class="text-dark bg-light rounded-0 p-2"
                            >
                            OUT OF STOCK
                        </span>
                        <ImgCard :product="product" />
                        <div class="text-center mt-1">
                            <h5 class="card-title fs-6 text-truncate">{{ product.title }}</h5>
                            <p class="card-center mt-1">{{ product.price }}$</p>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
</template>
<style>
    #div{
        position: relative;
    }
    #outOfStock{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 6;
    }
</style>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import ImgCard from './ImgCard.vue';
defineProps({
    products: Array,
    type: String
})
</script>
