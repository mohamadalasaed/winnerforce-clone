<template>
    <div class="col-5 row align-items-center">
        <img :src="product.img" class="img-fluid" />
    </div>
    <div class="col-8 row py-2">
        <div class="col d-flex flex-column float-start">
            <h6 class="text-truncate mb-1">{{ product.title }}</h6>
            <span v-if="product.size!=null">{{ product.size }}</span>
            <span v-if="product.size==null || product.size==''">One Size</span>
            <span class="mt-1">${{ product.price }}</span>
        </div>
        <div class="col row align-items-center mx-auto justify-content-between">
            <div class="col-5 border d-flex justify-content-around py-1">
                <Link preserve-scroll class="border-0 bg-transparent text-dark text-decoration-none" @click.prevent="updateDec()">
                    -
                </Link>
                <span class="px-2">{{this.product.qty}}</span>
                <Link preserve-scroll class="border-0 bg-transparent text-dark text-decoration-none" @click.prevent="updateInc()">
                    +
                </Link>
            </div>
            <div class="col-6">
                <Link preserve-scroll @click.prevent="remove" href="" class="text-dark">REMOVE</LInk>
            </div>
        </div>
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { Link },
    props: {
        product: Object
    },
    data(){
        return{
             qty: this.product.qty
        }
    },
    methods: {
        remove() {
            this.$store.dispatch('removeProductFromCart', {
                product_id: this.product.product_id,
                size: this.product.size
            });
        },
        updateInc() {
            this.$store.dispatch('updateQuantity', {
                product_id: this.product.product_id,
                qty: 1,
                size: this.product.size,
                price: this.product.price
            });
        },
        updateDec() {
            if (this.product.qty == 1) {
                this.remove();
            } else {
                this.$store.dispatch('updateQuantity', {
                    product_id: this.product.product_id,
                    qty: -1,
                    size: this.product.size,
                    price: this.product.price
                });
            }
        },
        updateCart() {
            this.$store.dispatch('getProducts')
        }
    }
};
</script>