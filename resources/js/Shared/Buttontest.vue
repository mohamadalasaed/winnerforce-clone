<template>
    <button 
        @click="updateActive"
        :class="cls" 
        type="button" 
        data-bs-target="#carouselExampleDark" 
        :data-bs-slide="to" 
        >
        <span :class="`${cls}-icon`" aria-hidden="true"></span>
        <span class="visually-hidden">{{ name }}</span>
    </button>
</template>
<script>
export default {
    props: {
        cls: String,
        name: String,
        to: String,
        nb: Number
    },
    methods: {
        updateActive() {
            this.$emit('onActive', this.nb)
        }
    }
}
</script>
