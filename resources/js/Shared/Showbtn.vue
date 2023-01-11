<template>
    <button v-if="toggle" class="btn bg-transparent border-0 d-flex gap-2">
        <i class="bi bi-cart3"></i>
        Show order summary
        <i class="bi bi-chevron-compact-up"></i>
    </button>
</template>
<script>
export default {
    props: {
        toggle: Boolean
    }
}
</script>