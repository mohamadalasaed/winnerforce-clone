<template>
    <div class="d-flex flex-column min-vh-100 bg-light">
        <Navbar />
        <slot />
        <Footer />
    </div>
</template>
<script>
import Navbar from '../Shared/Navbar.vue';
import Footer from '../Shared/Footer.vue';
export default {
    components: { Navbar, Footer },
    props: {
    },
    data() {
        return {
            // cartitems: {}

        }
    },
    // methods() {
    //     return {
    //         changeC(cart) {
    //             this.cartitems = cart;
    //         }
    //     }
    // }
};
</script>