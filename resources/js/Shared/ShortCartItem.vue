<template>
    <div class="col-5 row align-items-center">
        <img :src="product.product.img1" class="img-fluid" />
    </div>
    <div class="col-8 row py-2">
        <div class="col d-flex flex-column float-start">
            <h6 class="text-truncate mb-1">{{ product.product.title }}</h6>
            <span>{{ product.size }}</span>
            <span class="mt-1">${{ product.product.price }}</span>
        </div>
        <div class="col row align-items-center mx-auto justify-content-between">
            <div class="col-5 border d-flex justify-content-around py-1">
                <Link preserve-scroll class="border-0 bg-transparent text-dark text-decoration-none" @click="updateDec()">-</Link><span class="px-2">{{
                    product.qty
                }}</span><Link preserve-scroll class="border-0 bg-transparent text-dark text-decoration-none" @click="updateInc()">+</Link>

                <!-- <button class="border-0 bg-transparent"
                                    @click="quantity > 1 ? quantity-- : quantity">-</button><span class="px-2">{{
                                        product.qty
                                    }}</span><button class="border-0 bg-transparent" @click="quantity++">+</button> -->
            </div>
            <div class="col-6">
                <Link preserve-scroll @click.prevent="remove" href="" class="text-dark">REMOVE</LInk>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { InertiaProgress } from '@inertiajs/progress';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { InertiaProgress, Link },
    props: {
        product: Object
    },
    methods: {
        async remove() {
            await axios.post('/cart-delete', { 'product_id': this.product.id });
            this.updateCart();
            // let response = await axios.product('/cart/delete', {'product_id': this.product.id});
            // this.updateCart();

        },
        async updateInc() {
            let response = await axios.post('/cart-update', { 'id': this.product.id, 'product_id': this.product.product_id, 'qty': 1, 'size': this.product.size });
            this.updateCart();

        },
        async updateDec() {
            if (this.product.qty == 1) {
                this.remove();
            } else {
                let response = await axios.post('/cart-update', { 'id': this.product.id, 'product_id': this.product.product_id, 'qty': -1, 'size': this.product.size });
                this.updateCart();
            }
        },
        updateCart() {
            this.$store.dispatch('getProducts')
        }
    }
};
</script>