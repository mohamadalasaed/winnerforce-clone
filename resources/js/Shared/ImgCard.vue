<template>
    <img :src="post.img1" class="card-img-top" />
    <img id="img-hover" :src="post.img2" class="card-img-top img-fluid" />
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
        post: Object
    })
</script>