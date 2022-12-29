<template>

    <Head title="Explore the innovative world of Winnerforce Gym clothes & Sportswear" />
    <Layout :name="name">
        <a href="/collection/women" class=""><img class="img-fluid w-100" src="images/women-e-commerce.webp" /></a>
        <section class="container-fluid bg-light py-5">
            <div class="text-center fs-5">
                <h2 class="fs-3">WOMEN</h2>
            </div>
            <div class="row align-items-center justify-content-center g-4 py-5">
                <div class="col-lg-4 col-xl-3 col-sm-6 col-6">
                    <div class="card text-center">
                        <a href="/collections/women"><img class="card-img-top"
                                src="https://cdn.shopify.com/s/files/1/0351/4928/3461/products/front_5423a167-3b3a-4ac6-9980-00cd2610081b_600x.png?v=1669709345"
                                alt="Card image cap"></a>
                        <div class="card-body">
                            <h5 class="card-title fs-6">WOMEN-PLUSHY-JACKET-(BLACK)</h5>
                            <p class="card-text">35$</p>
                            <a href="#" class="btn btn-outline-dark">View Product</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-sm-6 col-6">
                    <div class="card text-center">
                        <img class="card-img-top"
                            src="https://cdn.shopify.com/s/files/1/0351/4928/3461/products/front_a0b96545-c224-469d-ae91-4ccaf3e996aa_800x.png?v=1668776072"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title fs-6">WOMEN-THRILL-ZIP HOODIE(BLACK</h5>
                            <p class="card-text">40$</p>
                            <a href="#" class="text-dark text-decoration-none border border-2 rounded p-1 px-2">View
                                Product</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-sm-6 col-6">
                    <div class="card text-center">
                        <img class="card-img-top"
                            src="https://cdn.shopify.com/s/files/1/0351/4928/3461/products/fullfront_600x.png?v=1670832752"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example</p>
                            <a href="#" class="text-dark text-decoration-none border border-2 rounded p-1 px-2">View
                                Product</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-sm-6 col-6">
                    <div class="card text-center">
                        <img class="card-img-top"
                            src="https://cdn.shopify.com/s/files/1/0351/4928/3461/products/front_464cf97f-dad0-4d85-bfe3-967f44799d9b_600x.png?v=1670826748"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example</p>
                            <a href="#" class="text-dark text-decoration-none border border-2 rounded p-1 px-2">View
                                Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="/collections/women" class="btn btn-dark px-4 py-2 fs-6">VIEW ALL PRODUCTS</a>
            </div>
        </section>
        <a href="/collection/men" class=""><img class="img-fluid w-100" src="images/men-e-commerce.webp" /></a>
    </Layout>
</template>
<script>
import Layout from '../Shared/Layout.vue';
import { Head } from '@inertiajs/inertia-vue3';
export default {
    components: { Layout, Head },
    props: {
        name: String
    }
}
</script>