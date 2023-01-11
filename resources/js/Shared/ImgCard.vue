<template>
    <img :src="product.img1" class="card-img-top" />
    <img id="img-hover" :src="product.img2" class="card-img-top img-fluid" />
</template>
<style>
  #img-hover{
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: opacity .5s ease-out;;
  }
  #img-hover:hover{
    opacity: 1;
  }
</style>
<script setup>
    defineProps({
        product: Object
    })
</script>