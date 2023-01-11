<template>
    <button v-if="toggle" class="btn bg-transparent border-0 d-flex gap-2">
        <i class="bi bi-cart3"></i>
        Hide order summary
        <i class="bi bi-chevron-compact-down"></i>
    </button>
</template>
<script>
export default {
    props: {
        toggle: Boolean
    }
}
</script>
