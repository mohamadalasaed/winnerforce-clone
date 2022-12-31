<template>
    <div class="d-flex flex-column min-vh-100">
        <Navbar />
        <slot />
        <Footer />
    </div>
</template>
<script setup>
import Navbar from '../Shared/Navbar.vue';
import Footer from '../Shared/Footer.vue';
</script>