<template>

    <img id="img" :src="`/images/thumbnailsMen/${imgfolder}/${imgnb}.jpg`" class="img-fluid" role="button"
        :class="{'border-dark': nb==0}"
        data-bs-target="#carouselExampleDark" :data-bs-slide-to="nb" aria-current="true" aria-label="Slide 4"/>

</template>

<style>
    #img{
        border: 1px solid rgba(0, 0, 0, 0.149);
    }
    #img:active{
        border:2px solid black;
        transition: border 1s ease;
    }
</style>

<script setup>

let props = defineProps({
    imgfolder: String,
    nb: Number,
    imgnb: Number,
    active: Boolean
});

</script>
