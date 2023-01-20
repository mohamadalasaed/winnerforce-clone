<template>
    <div class="text-center">
      <Component
        :is="link.url ? 'Link' : 'span'"
        v-for="link in links"
        :href="link.url"
        v-html="link.label"
        class="px-1 text-decoration-none text-dark fs-4"
        :class="{ 'text-muted': ! link.url, 'fw-bold' : link.active }"
      />
    </div>
  </template>
  
  <script>
  import {Link} from '@inertiajs/inertia-vue3';
  export default {
    components: {Link},
    props: {
      links: Array
    }
  };
  </script>