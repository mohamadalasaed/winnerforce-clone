<template>
    <Layout :name="name">
        <a href="/collection/women" class=""><img class="img-fluid w-100" src="https://cdn.shopify.com/s/files/1/0351/4928/3461/files/women-e-commerce_2000x.jpg?v=1669983512" /></a>
    </Layout>
</template>
<script>
import Layout from '../Shared/Layout.vue';
export default {
    components: { Layout },
    props: {
        name: String
    }
}
</script>