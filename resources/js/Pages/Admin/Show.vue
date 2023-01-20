<template>

    <Head title="Admin Section" />

    <section class="container-xl min-vh-100 bg-light d-flex flex-column gap-3">
        <header class="m-auto position-relative pt-3">
            <div v-if="$page.props.flash.success"
                class="toast show position-absolute top-0 start-50 translate-middle-x mt-5" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Backend</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">{{ $page.props.flash.success }}</div>
            </div>
            <ul class="list-unstyled d-flex gap-3 justify-content-center align-items-center fs-4 my-auto">
                <li class="d-none d-md-block">
                    <Link href="/" class="btn btn-danger fs-6">Go back home</Link>
                </li>
                <li>
                    <Link @click="$store.dispatch('updateType', 'men')" href="/admin?type=men"
                        :class="{ 'fw-bold': this.$store.state.type == 'men' }"
                        class="text-decoration-none text-body">Men</Link>
                </li>
                <li>
                    <Link @click="$store.dispatch('updateType', 'women')" href="/admin?type=women"
                        :class="{ 'fw-bold': this.$store.state.type == 'women' }"
                        class="text-decoration-none text-body">Women</Link>
                </li>
                <li>
                    <Link @click="$store.dispatch('updateType', 'accessories')" href="/admin?type=accessories"
                        :class="{ 'fw-bold': this.$store.state.type == 'accessories' }"
                        class="text-decoration-none text-body">Accessories</Link>
                </li>
                <li class="d-none d-md-block">
                    <Link class="btn btn-dark">CREATE PRODUCT</Link>
                </li>
            </ul>
        </header>

        <div class="row gap-1 px-3 d-md-none">
            <div class="col p-0"><Link href="/" class="btn btn-danger w-100">Go back home</Link></div>
            <div class="col p-0"><Link class="btn btn-dark w-100">CREATE PRODUCT</Link></div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-10 col-10">
                <input v-model="search" class="w-100 p-2 rounded fs-6 mx-auto" type="search" placeholder="Search" aria-label="Search" />
            </div>
        </div>

        <Card :products="products.data" />

        <Pagination v-if="products.data != 0" :links="products.links" class="pb-5" />

    </section>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import Card from './Card.vue';
import { Link } from '@inertiajs/inertia-vue3';
import throttle from 'lodash/throttle';
import { Inertia } from "@inertiajs/inertia";
import Pagination from '../../Shared/Pagination.vue';
import pickBy from 'lodash/pickBy'
export default {
    layout: null,
    components: { Head, Card, Link, Pagination, Inertia },
    props: {
        products: Object,
        filters: Object,
    },
    data() {
        return {
            search: this.filters.search
        }
    },
    watch: {
        search: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/admin', { type: this.$store.state.type, search: this.search }, { preserveState: true })
            }, 150),
        },
    },
    computed: {
        test() {
            console.log($route.query.type)
        }
    },
    created() {
        this.$store.dispatch('updateType', 'men')
        let url = window.location.href;
        if(url.includes('wo',26)){
            this.$store.dispatch('updateType', 'women')
        }
        if(url.includes('acc',26)){
            this.$store.dispatch('updateType', 'accessories')
        }
    },
};

</script>
