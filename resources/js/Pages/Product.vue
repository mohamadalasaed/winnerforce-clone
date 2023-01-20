<template>

    <Head :title="`${product.title} - Winnerforce`" />

    <div class="overflow-hidden">
    <section class="row justify-content-center bg-light border-bottom pb-5">
        <div class="col-xxl-5 col-lg-5 col-md-6">
            <div class="row mb-3 d-none d-md-flex mt-5 px-5">
                <div class="col">
                    <Img :img="product.img1" :nb="0" :active="active" @onActive="updateActive" />
                </div>
                <div class="col">
                    <Img :img="product.img2" :nb="1" :active="active" @onActive="updateActive" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': product.img3 == null }" :img="product.img3" :active="active" :nb="2"
                        @onActive="updateActive" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': product.img4 == null }" :img="product.img4" :nb="3" :active="active"
                        @onActive="updateActive" />
                </div>
            </div>
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <ButtonImg :nb="0" :active="active" @onActive="updateActive" />
                    <ButtonImg :nb="1" :active="active" @onActive="updateActive" />
                    <ButtonImg v-show="product.img3 != null" :active="active" :nb="2" @onActive="updateActive" />
                    <ButtonImg v-show="product.img4 != null" :active="active" :nb="3" @onActive="updateActive" />
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img :src="product.img1" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img :src="product.img2" class="d-block w-100" alt="...">
                    </div>
                    <div :class="{ 'd-none': product.img3 == null, 'carousel-item': product.img3 != null }">
                        <img :src="product.img3" class="d-block w-100" alt="...">
                    </div>
                    <div :class="{ 'd-none': product.img4 == null, 'carousel-item': product.img4 != null }">
                        <img :src="product.img4" class="d-block w-100" alt="...">
                    </div>
                </div>
                <Buttontest cls="carousel-control-prev" name="Previous" to="prev" :nb="-1" @onActive="updateActive2" />
                <Buttontest cls="carousel-control-next" name="Next" to="next" :nb="1" @onActive="updateActive2" />
            </div>
            <div class="row d-md-none mt-3 px-2">
                <div class="col">
                    <Img :img="product.img1" :nb="0" :active="active" @onActive="updateActive" />
                </div>
                <div class="col">
                    <Img :img="product.img2" :nb="1" :active="active" @onActive="updateActive" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': product.img3 == null }" :img="product.img3" :active="active" :nb="2"
                        @onActive="updateActive" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': product.img4 == null }" :img="product.img4" :nb="3" :active="active"
                        @onActive="updateActive" />
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-5 col-md-6 mt-5 px-5">
            <div class="border-bottom pb-4">
                <h2 class="fs-6 mb-4">WINNERFORCE</h2>
                <h1 class="fs-5">{{ product.title }}</h1>
                <p>{{ product.sku }}</p>
                <div><span>${{ product.price }}.00</span></div>
            </div>
            <div class="text-center mt-3 bg-white py-3"
                v-show="product.size_s == 0 && product.size_m == 0 && product.size_l == 0 && product.size_xl == 0 && product.size_xxl == 0">
                OUT OF STOCK
            </div>
            <div class="py-3" :class="{ 'd-none': this.product.type == 'accessories' }"
                v-show="!(product.size_s == 0 && product.size_m == 0 && product.size_l == 0 && product.size_xl == 0 && product.size_xxl == 0)">
                <span>Size:</span>
                <ul class="list-unstyled d-flex gap-3 mt-2">
                    <li class="" style="position:relative">
                        <input id="s" class="btn-check" type="radio" v-model="size" name="size" :value="'S'"
                            autocomplete="off" :disabled="product.size_s == 0" />
                        <label for="s" class="px-3 py-2 btn bg-transparent rounded-0">S</label>
                        <svg :class="{ 'd-none': product.size_s == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="m" class="btn-check" type="radio" v-model="size" name="size" autocomplete="off"
                            :value="'M'" :disabled="product.size_m == 0" />
                        <label for="m" class="px-3 py-2 btn bg-transparent rounded-0">M</label>
                        <svg :class="{ 'd-none': product.size_m == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="l" class="btn-check" type="radio" v-model="size" name="size" autocomplete="off"
                            :value="'L'" :disabled="product.size_l == 0" />
                        <label for="l" class="px-3 py-2 btn bg-transparent rounded-0">L</label>
                        <svg :class="{ 'd-none': product.size_l == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="xl" class="btn-check" type="radio" v-model="size" name="size" autocomplete="off"
                            :value="'XL'" :disabled="product.size_xl == 0" />
                        <label for="xl" class="px-3 py-2 btn bg-transparent rounded-0">XL</label>
                        <svg class="fs-6" :class="{ 'd-none': product.size_xl == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="xxl" class="btn-check" type="radio" v-model="size" name="size" autocomplete="off"
                            :value="'XXL'" :disabled="product.size_xxl == 0" />
                        <label for="xxl" class="px-3 py-2 btn bg-transparent rounded-0">XXL</label>
                        <svg class="fs-6" :class="{ 'd-none': product.size_xxl == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                </ul>
            </div>
            <div :class="{ 'mt-3': this.product.type == 'accessories' }"
                v-show="!(product.size_s == 0 && product.size_m == 0 && product.size_l == 0 && product.size_xl == 0 && product.size_xxl == 0)">
                <span>Quantity:</span>
                <div class="w-50">
                    <div class="border d-flex justify-content-around w-75 py-2 mt-2 px-1">
                        <button class="border-0 bg-transparent" @click="qty > 1 ? qty-- : qty">-</button><span>{{
                            qty
                        }}</span><button class="border-0 bg-transparent" @click="qty++">+</button>
                    </div>
                </div>
                <div class="mt-3">
                    <Link @click.prevent="addToCart" href="#cart" data-bs-toggle="offcanvas" aria-controls="cart"
                        class="btn bg-transparent border px-4 py-2 w-100">ADD TO
                    CART</Link>
                    <!-- href="#cart" -->
                    <!-- data-bs-toggle="offcanvas" -->
                </div>
                <div class="mt-3">
                    <Link class="btn btn-dark px-4 py-2 w-100">BUY IT NOW</Link>
                </div>
            </div>
            <div class="py-3">
                <p>{{ product.description }}</p>
            </div>
            <div class="d-flex gap-3">
                <span class="text-muted">SHARE</span>
                <ul class="d-flex list-unstyled gap-2">
                    <li class="nav-item">
                        <Link href="https://www.facebook.com/winnerforce.lb/" class="text-muted" target="_blank"
                            rel="noopener" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="https://twitter.com/hashtag/winnerforce?lang=en" class="text-muted" target="_blank"
                            rel="noopener" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="https://www.pinterest.com/winnerforce/" class="text-muted" target="_blank"
                            rel="noopener" aria-label="Pinterest">
                        <i class="bi bi-pinterest"></i>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="container-fluid bg-light p-5">
        <div class="text-center fs-5 mb-5">
            <p class="fs-3">YOU MAY ALSO LIKE</p>
        </div>
        <Card :products="randomProducts" :type="this.product.type" />
    </section>
    </div>

</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import Img from '../Shared/Img.vue';
import ButtonImg from '../Shared/ButtonImg.vue';
import Buttontest from '../Shared/Buttontest.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Card from '../Shared/Card.vue';
export default {
    components: {Img, ButtonImg, Buttontest, Card, Link, Head},
    props: {
        product: Object,
        randomProducts: Array
    },
    data() {
        return {
            qty: 1,
            size: '',
            active: 0
        };
    },
    methods: {
        updateActive(nb) {
            this.active = nb
        },
        updateActive2(nb) {
            if (this.active < this.product.imgs) {
                let x = this.active + nb
                if (x == this.product.imgs) { this.active = 0 } else { this.active += nb }
                if (x < 0) { this.active = this.product.imgs - 1 }
            }
        },
        addToCart() {
                this.$store.dispatch('addProductToCart', {
                    product: this.product,
                    product_id: this.product.id,
                    qty: this.qty,
                    size: this.size,
                    img: this.product.img1,
                    title: this.product.title,
                    newprice: this.product.price
                });
                // this.$store.dispatch('getProducts')
        },
        updateSize() {
            if (this.product.size_s == 1) { return this.size = 'S' }
            if (this.product.size_s == 0 && this.product.size_m == 1) { return this.size = 'M' }
            if (this.product.size_s == 0 && this.product.size_m == 0 && this.product.size_l == 1) { return this.size = 'L' }
            if (this.product.size_s == 0 && this.product.size_m == 0 && this.product.size_l == 0 && this.product.size_xl == 1) { return this.size = 'XL' }
            if (this.product.size_s == 0 && this.product.size_m == 0 && this.product.size_l == 0 && this.product.size_xl == 0 && this.product.size_xxl == 1) { return this.size = 'XXL' }
        }
    },
    created: function () {
        this.updateSize();
    },
};
</script>