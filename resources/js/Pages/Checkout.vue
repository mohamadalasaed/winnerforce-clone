<template>

    <Head title="Information - Winnerforce - Checkout" />

    <section class="container-sm">
        <div class="row justify-content-center flex-column-reverse flex-lg-row">
            <div class="col bg-white d-flex flex-column gap-3 mx-auto">
                <div class="text-center">
                    <p class="display-6 mb-2 text-dark">Winnerforce</p>
                    <ul class="list-unstyled d-flex gap-2 text-center justify-content-center">
                        <li>Cart</li>
                        <li>></li>
                        <li>Information</li>
                        <li>></li>
                        <li class="text-muted">Shipping</li>
                        <li>></li>
                        <li class="text-muted">Payment</li>
                    </ul>
                </div>
                <div class="text-center text-muted border p-4 position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle bg-white py-1 px-3 text-dark fw-bold">
                        Express checkout</div>
                    Express checkout isn't available right now. Try refreshing the page or fill out<br>your information
                    to check out.
                </div>
                <div class="border position-relative mt-3 mb-1">
                    <div class="position-absolute top-0 start-50 translate-middle bg-white py-1 px-3 text-dark">OR</div>
                </div>
                <div class="row gap-2">
                    <div class="d-flex justify-content-between align-items-center mt-0">
                        <div class="fs-4">Contact information</div>
                        <div class="text-muted">Already have an account?
                            <Link href="/login" class="text-decoration-none text-dark">Log in</Link>
                        </div>
                    </div>
                    <div>
                        <input class="w-100 mt-2 p-2 rounded border" type="text"
                            placeholder="Email or mobile phone number" />
                    </div>
                    <ul class="d-flex list-unstyled align-items-center gap-2">
                        <li><input type="checkbox" /></li>
                        <li class="mb-1">Email me with news and offers</li>
                    </ul>
                </div>
                <div class="row gap-1">
                    <div class="fs-4">Shipping address</div>
                    <div><input class="w-100 mt-2 p-2 rounded border" type="text" placeholder="Select" /></div>
                    <div class="d-flex justify-content-between gap-2">
                        <div class="w-50"><input class="w-100 mt-2 p-2 rounded border" type="text"
                                placeholder="First name" /></div>
                        <div class="w-50"><input class="w-100 mt-2 p-2 rounded border" type="text"
                                placeholder="Last name" /></div>
                    </div>
                    <div><input class="w-100 mt-2 p-2 rounded border" type="text" placeholder="Compancy (optional)" />
                    </div>
                    <div><input class="w-100 mt-2 p-2 rounded border" type="text" placeholder="Address" /></div>
                    <div><input class="w-100 mt-2 p-2 rounded border" type="text"
                            placeholder="Apartment, suite, etc." /></div>
                    <div class="d-flex justify-content-between gap-2">
                        <div class="w-50"><input class="w-100 mt-2 p-2 rounded border" type="text" placeholder="City" />
                        </div>
                        <div class="w-50"><input class="w-100 mt-2 p-2 rounded border" type="text"
                                placeholder="Postal code (optional)" /></div>
                    </div>
                    <div><input class="w-100 mt-2 p-2 rounded border" type="text" placeholder="Phone" /></div>
                    <ul class="d-flex list-unstyled align-items-center gap-2">
                        <li><input class="w-100 mt-2 p-2 rounded border" type="checkbox" /></li>
                        <li class="mb-1">Save this information for next time</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center mt-0">
                        <div class="fs-4">
                            <Link href="/" class="text-decoration-none text-dark fs-6"><i
                                class="bi bi-chevron-left text-dark"></i>Return to home</Link>
                        </div>
                        <div class="text-muted">
                            <Link href="/cart-checkout" method="post" class="btn btn-dark py-3">Complete order</Link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-5 px-3 d-flex flex-column gap-3 mx-auto">
                <div class="d-flex justify-content-between border-bottom py-3" role="button" data-bs-toggle="collapse"
                    @click="this.$store.commit('setToggle')" data-bs-target="#collapseExample" aria-expanded="false"
                    aria-controls="collapseExample">
                    <Showbtn :toggle="!this.$store.state.toggle" />
                    <Hidebtn :toggle="this.$store.state.toggle" />
                    <div class="my-auto fw-bold">${{ $store.state.total }}.00</div>
                </div>
                <div id="collapseExample" class="collapse show">
                    <div>
                        <table v-for="product in cart" :key="product.id">
                            <tr class="d-flex gap-3">
                                <td class="position-relative">
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary text-white z-3">
                                        {{ product.qty }}
                                    </span>
                                    <img id="img" class="img-fluid border rounded" :src="product.product.img1" />
                                </td>
                                <td class="row align-items-center">
                                    <p class="fw-bold w-100">
                                        {{ product.product.title }}<br>
                                        <span class="text-muted fw-0">{{ product.size }}</span>
                                    </p>
                                </td>
                                <td class="row align-items-center ms-5">
                                    <p class="fw-bold">${{ product.price }}.00</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between gap-2 align-items-center border-bottom border-top py-3 my-3">
                        <div class="w-75"><input class="w-100 p-2 rounded border" type="text"
                                placeholder="Discount code" />
                        </div>
                        <div class="">
                            <Link class="btn btn-dark px-4 py-2 ">Apply</Link>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between">
                            <div class="text-muted">Subtotal</div>
                            <div class="fw-bold">$34.00</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-muted">Shipping</div>
                            <div class="text-muted">Calculated at next step</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-top mt-3 py-2">
                        <div>Total</div>
                        <div class="d-flex align-items-center">USD <h2 class="ms-3">${{ $store.state.total }}.00</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
<style>
#img {
    max-width: 4.5rem;
    height: 5rem;
}
</style>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import Showbtn from '../Shared/Showbtn.vue'
import Hidebtn from '../Shared/Hidebtn.vue'
export default {
    components: { Link, Head, Hidebtn, Showbtn },
    props: {
        // products: Object,
        // total: Number
    },
    beforeMount() {
        if(this.$page.props.auth){
            this.$store.dispatch('getProducts');
        }
    },
    data() {
        return {

        }
    },
    methods: {
    },
    computed: {
        getcart() {
            return this.$store.dispatch('getProducts')
        },
        cart() {
            return this.$store.state.cart
        }
    },
    created: function () {
        if(this.$page.props.auth){
            this.$store.getters['products']
        }
    },
};
</script>