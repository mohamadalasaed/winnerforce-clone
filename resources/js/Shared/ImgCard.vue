<template>
    <img :src="`/images/thumbnailsMen/${imgfolder}/1.jpg`" class="card-img-top" />
    <img id="img-hover" :src="`/images/thumbnailsMen/${imgfolder}/2.jpg`" class="card-img-top" />
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
        imgfolder: String
    })
</script>