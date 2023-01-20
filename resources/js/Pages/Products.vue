<template>
    <Head v-if="type=='men'" title="Men's Gym Wear | Workout Clothes for Men - WinnerForce"/>
    <Head v-if="type=='women'" title="Women's Workout Clothes | Shop High Quality Gym Wear - WinnerForce"/>
    <Head v-if="type=='accessories'" title="Total Gym Accessories | Sports Bottles | Unisex Socks - WinnerForce"/>

    <section v-if="this.type == 'men'" class="my-4">
        <div class="text-center">
            <h4>MEN</h4>
        </div>
        <div class="text-center px-3">
            <p>Deliver maximum results and reach your full athletic potential in our Men's<br>Collection. </p>
        </div>
    </section>
    <section v-if="this.type == 'women'" class="my-4">
        <div class="text-center">
            <h4>WOMEN</h4>
        </div>
        <div class="text-center px-3">
            <p>Deliver maximum results and reach your full athletic potential in our WOMEN's<br>Collection. </p>
        </div>
    </section>
    <section v-if="this.type == 'accessories'" class="my-4">
        <div class="text-center">
            <h4>ACCESSORIES</h4>
        </div>
        <div class="text-center px-3">
            <p>The fitness world needs Winnerforce gym accessories like bags, caps, and socks<br>designed to help you
                join the athletic club.</p>
        </div>
    </section>

    <div class="overflow-hidden">
    <header class="row py-5 justify-content-center bg-light gap-3">
        <div class="col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center gap-2">
            <h4 class="my-auto">Categories <i class="bi bi-filter-square text-dark"></i> :</h4>
            <select class="form-select w-50 text-dark p-2 rounded fs-6 pointer" role="button"
                aria-label="Default select example" id="select" v-model="selectedOption">
                <option value="All" role="button" selected>All</option>
                <option role="button" v-for="category in categories" :key="category.id" :value="category.name">{{
                    category.name
                }}
                </option>
            </select>
        </div>
        <div class="col-xl-4 col-md-5 col-sm-12 d-flex justify-content-center">
            <input v-model="search" class="form-control w-75 me-2  p-2 rounded fs-6" type="search" placeholder="Search"
                aria-label="Search" />
        </div>
    </header>

    <Card :products="products.data" :type="this.type" />
    </div>

    <Pagination v-if="products.data != 0" :links="products.links" class="my-5" />

    <div class="text-center my-4 px-3" v-if="products.data == 0">
        <p>No products found, Please check back later ;)</p>
    </div>

</template>


<script setup>
import Card from '../Shared/Card.vue';
import Pagination from '../Shared/Pagination.vue';
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce"
import { Head } from '@inertiajs/inertia-vue3';

let props = defineProps({
    products: Object,
    categories: Array,
    filters: Object,
    type: String,
});

let search = ref(props.filters.search);
watch(search, debounce(function (value) {
    Inertia.get('/collections/' + props.type,
        {
            ...(props.filters.category !== null ? { category: props.filters.category, search: value } : { search: value })
        },
        {
            preserveState: true,
            replace: true
        });
}, 300));

let selectedOption = (props.filters.category == null ? ref('All') : ref(props.filters.category));
watch(selectedOption, value => {
    if(value == 'All'){
        Inertia.get('/collections/' + props.type);
    }else{
        Inertia.get('/collections/' + props.type,
        {
            ...(props.filters.search !== null ? { search: props.filters.search, category: value } : { category: value })
        },
        {
            preserveState: true,
            replace: true
        });
    }
});
</script>
