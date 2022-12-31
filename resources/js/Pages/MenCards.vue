<template>

    <Head title="Mens Gym Wear | Workout Clothes for Men Winnerforce" />

    <section class="my-4">
        <div class="text-center">
            <h4>MEN</h4>
        </div>
        <div class="text-center px-3">
            <p>Deliver maximum results and reach your full athletic potential in our Men's<br>Collection. </p>
        </div>
    </section>

    <header class="row py-5 justify-content-center bg-light gap-3">
        <div class="col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center gap-2">
            <h4 class="my-auto">Categories <i class="bi bi-filter-square text-dark"></i> :</h4>
            <select class="form-select w-50 text-dark p-2 rounded fs-6 pointer" aria-label="Default select example"
                id="select" v-model="selectedOption">
                <option value="All" selected>All</option>
                <option v-for="category in categories" :key="category.id" :value="category.name">{{ category.name }}
                </option>
            </select>
        </div>
        <div class="col-xl-4 col-md-5 col-sm-12 d-flex justify-content-center">
            <input v-model="search" class="form-control w-75 me-2  p-2 rounded fs-6" type="search" placeholder="Search"
                aria-label="Search" />
        </div>
    </header>


    <MenCard :posts="posts.data" />

    <Pagination v-if="posts.data != 0" :links="posts.links" class="my-5" />
    <div class="text-center my-4 px-3" v-if="posts.data == 0">
        <p>No posts yet for {{ selectedOption }} category, Please check back later ;)</p>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import MenCard from '../Shared/MenCard.vue';
import Pagination from '../Shared/Pagination.vue';
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce"

let props = defineProps({
    posts: Object,
    categories: Array,
    filters: Object,
    all: String
});

if (props.filters.page) { }

let search = ref(null);
watch(search, debounce(function (value) {
    Inertia.get('/collections/men',
        {
            ...(props.filters.category !== null ? { category: props.filters.category, search: value } : { search: value }),
            ...(props.filters.page !== null ? { page: props.filters.page, search: value } : { search: value }),
        },
        {
            preserveState: true,
            replace: true
        });
}, 300));

let selectedOption = (props.filters.category == null ? ref('All') : ref(props.filters.category));
watch(selectedOption, value => {
    if (value == 'All') {
        Inertia.get('/collections/men');
    } else {
        Inertia.get('/collections/men', {
            ...(props.filters.search !== null ? { category: value, search: props.filters.search } : { category: value }),
        }, {
            preserveState: true,
            replace: true
        });
    }
});

// console.log(all);
console.log(props.filters.search);
console.log(props.filters.category);


</script>
<style>
#select {
    cursor: pointer;
}

#select>option {
    cursor: pointer;
}
</style>