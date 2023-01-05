<template>
    <Head title="Explore the innovative world of Winnerforce Gym clothes & Sportswear" />
    
    <a href="/collections/women" class="img"><img class="img-fluid w-100" src="images/women-e-commerce.webp" /></a>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <h2 class="fs-3">WOMEN</h2>
        </div>
        <Card :posts="postswomen" :type="'women'" />
        <div class="text-center">
            <a href="/collections/women" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</a>
        </div>
    </section>

    <a href="/collections/men" class="img"><img class="img-fluid w-100" src="images/men-e-commerce.webp" /></a>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <h2 class="fs-3">MEN</h2>
        </div>
        <Card :posts="postsmen" :type="'men'" />
        <div class="text-center">
            <a href="/collections/men" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</a>
        </div>
    </section>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <p>SHOP</p>
            <h2 class="fs-3">OUR LOOKS</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4">
                <img :src="post[0].img1" class="img-fluid" />
            </div>
            <div class="col-xl-4">
                <Card :posts="post" :type="'men'" />
            </div>
        </div>
    </section>

</template>
<style>
    .img{
        animation: scaleDown 1.5s ease-out;
    }
    @keyframes scaleDown {
        0%{
            opacity: 0.6;
            transform: scale(1.2);
        }
        100%{
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Card from '../Shared/Card.vue';
defineProps({
    name: String,
    postsmen: Array,
    postswomen: Array,
    post: Object
})
</script>