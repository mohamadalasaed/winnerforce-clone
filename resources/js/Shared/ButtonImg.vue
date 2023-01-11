<template>

    <button type="button" data-bs-target="#carouselExampleDark" :data-bs-slide-to="nb" class="active"
        @click="updateActive" aria-current="true" aria-label="Slide 1"></button>

</template>
<script>
export default {
    props: {
        nb: Number,
    },
    methods: {
        updateActive() {
            this.$emit('onActive', this.nb)
        }
    }
}
</script>
