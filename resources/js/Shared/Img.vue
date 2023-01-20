<template>
    <img :src="img" 
         class="img-fluid border" 
         role="button" 
         @click="updateActive"
         :class="{'border-dark': this.active == this.nb}" 
         data-bs-target="#carouselExampleDark" 
         :data-bs-slide-to="nb" 
         aria-current="true"
        aria-label="Slide 4"/>
</template>
<script>
export default {
    props: {
        img: String,
        nb: Number,
        active: ''
    },
    methods: {
        updateActive(){
            this.$emit('onActive', this.nb)
        }
    }
}
</script>
