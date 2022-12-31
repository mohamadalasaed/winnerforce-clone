<template>
    <Head title="Explore the innovative world of Winnerforce Gym clothes & Sportswear" />
    
    <a href="/collection/women" class=""><img class="img-fluid w-100" src="images/women-e-commerce.webp" /></a>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <h2 class="fs-3">MEN</h2>
        </div>
        <MenCard :posts="posts" />
        <div class="text-center">
            <a href="/collections/women" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</a>
        </div>
    </section>

    <a href="/collections/men" class=""><img class="img-fluid w-100" src="images/men-e-commerce.webp" /></a>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <h2 class="fs-3">MEN</h2>
        </div>
        <MenCard :posts="posts" />
        <div class="text-center">
            <a href="/collections/men" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</a>
        </div>
    </section>

</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import MenCard from '../Shared/MenCard.vue';
defineProps({
    name: String,
    posts: Array
})
</script>