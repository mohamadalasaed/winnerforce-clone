<template>

    <Head title="Explore the innovative world of Winnerforce Gym clothes & Sportswear" />

    <div class="overflow-hidden"><Link href="/collections/women"><img id="imgHome" class="img-fluid w-100" src="https://cdn.shopify.com/s/files/1/0351/4928/3461/files/the-style-out--commerce3_2000x.jpg?v=1673357725" /></Link></div>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <h2 class="fs-3">WOMEN</h2>
        </div>
        <div class="px-3">
            <Card :products="productsWomen" :type="'women'" />
        </div>
        <div class="text-center">
            <Link href="/collections/women" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</Link>
        </div>
    </section>

    <div class="overflow-hidden"><Link href="/collections/men" ><img id="imgHome" class="img-fluid w-100" src="https://cdn.shopify.com/s/files/1/0351/4928/3461/files/women-n-men--e-commerce1_2000x.jpg?v=1673357758" /></Link></div>

    <section class="container-fluid bg-light py-5 border-bottom">
        <div class="text-center fs-5 mb-5">
            <h2 class="fs-3">MEN</h2>
        </div>
        <div class="px-3">
            <Card :products="productsMen" :type="'men'" />
        </div>
        <div class="text-center">
            <Link href="/collections/men" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</Link>
        </div>
    </section>

    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5 mb-5">
            <p>SHOP</p>
            <h2 class="fs-3">OUR LOOKS</h2>
        </div>
        <div class="mx-auto">
            <div class="row justify-content-center">
                <div class="col-xl-4">
                    <img :src="product[0].img1" class="img-fluid" />
                </div>
                <div class="col-xl-4 border-end border-bottom">
                    <Link href="/collections/men" class="d-none d-xl-block">
                        <div class=" position-relative">
                            <img :src="product[0].img1" class="img-fluid w-50" role="button" />
                            <img id="img-hover" :src="product[0].img2" class="img-fluid w-50 z-3" role="button" />
                        </div>
                    </Link>
                    <div class="w-50 mt-2 d-none d-xl-block">
                        <Link href="/collections/men" class="btn btn-dark w-100 rounded-0">VIEW ALL PRODUCTS</Link>
                    </div>
                    <div class="mt-2 d-md-none">
                        <Link href="/collections/men" class="btn btn-dark w-100 rounded-0">VIEW ALL PRODUCTS</Link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden">
        <div class="row align-items-center justify-content-center gap-5 px-5 py-5">
            <div class="col-xl-3 col-md-8">
                <Link href="#" class="text-decoration-none text-dark">
                    <div id="f" class="position-relative">
                        <img id="test position-absolute" class="img-fluid" src="https://cdn.shopify.com/s/files/1/0351/4928/3461/files/1120_750x960_crop_right.png?v=1670247602\"/>
                        <div class="position-absolute bottom-0 start-0 mb-5 ms-5">
                            <p class="display-6 fw-bold text-dark">SPORTS BRAS</p>
                            <button class="btn btn-light w-100 rounded-0 fs-4">view product</button>
                        </div>
                    </div>
                </Link>
            </div>
            <div class="col-xl-3 col-md-8">
                <Link href="#" class="text-decoration-none text-dark">
                    <div id="f" class="position-relative">
                        <img id="test position-absolute" class="img-fluid" src="https://cdn.shopify.com/s/files/1/0351/4928/3461/files/1120_750x960_crop_right.png?v=1670247602\"/>
                        <div class="position-absolute bottom-0 start-0 mb-5 ms-5">
                            <p class="display-6 fw-bold text-dark">SPORTS BRAS</p>
                            <button class="btn btn-light w-100 rounded-0 fs-4">view product</button>
                        </div>
                    </div>
                </Link>
            </div>
            <div class="col-xl-3 col-md-8">
                <Link href="#" class="text-decoration-none text-dark">
                    <div id="f" class="position-relative">
                        <img id="test position-absolute" class="img-fluid" src="https://cdn.shopify.com/s/files/1/0351/4928/3461/files/1120_750x960_crop_right.png?v=1670247602\"/>
                        <div class="position-absolute bottom-0 start-0 mb-5 ms-5">
                            <p class="display-6 fw-bold text-dark">SPORTS BRAS</p>
                            <button class="btn btn-light w-100 rounded-0 fs-4">view product</button>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </section>
</template>
<style>
#imgHome {
    animation: scaleDown 1.5s ease-out;
}

#img-hover {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: opacity .5s ease-out;
    ;
}
#img-hover:hover {
    opacity: 1;
}
#test{
    transform: scale(2);
}
@keyframes scaleDown {
    0% {
        opacity: 0.6;
        transform: scale(1.2);
    }

    100% {
        opacity: 1;
        transform: scale(1);
    }
}
</style>
<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    beforeMount() {
        if(this.$page.props.auth){
            this.$store.dispatch('getProducts');
        }
    },
};
</script>
<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Card from '../Shared/Card.vue';
defineProps({
    productsMen: Object,
    productsWomen: Object,
    product: Array
})
</script>
