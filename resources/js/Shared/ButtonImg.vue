<template>
    <button 
        @click="updateActive"
        type="button"
        data-bs-target="#carouselExampleDark" 
        :data-bs-slide-to="nb" 
        :class="{'active':this.active == this.nb}"
        aria-current="true" 
        aria-label="Slide 1"
        >
    </button>
</template>
<script>
export default {
    props: {
        nb: Number,
        active: ''
    },
    methods: {
        updateActive() {
            this.$emit('onActive', this.nb)
        }
    }
}
</script>
