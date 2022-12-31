<template>
    <section class="container-fluid bg-light">
        <div class="row align-items-center g-2 pb-3 px-2">
            <div class="col-xl-3 col-md-4 col-sm-6  col-6" v-for="post in posts" :key="post.id">
                <a :href="`/collections/men/${post.slug}`" class="text-decoration-none text-dark">
                    <div class="text-center h-75">
                        <img :src="`/images/thumbnailsMen/${post.img_folder}/1.jpg`" alt="Card image cap" class="card-img-top py-2">
                        <!-- <img :src="isMouseOver ? showimg1() + post.img_folder + showimg2() : showimg1() + post.img_folder + showimg3()"
                            alt="Card image cap" class="card-img-top" @mouseover.native="isMouseOver = !isMouseOver" @mouseleave.native="isMouseOver = !isMouseOver"> -->
                        <div class="text-center mt-1">
                            <h5 class="card-title fs-6 text-truncate">{{ post.title }}</h5>
                            <p class="card-center mt-1">{{ post.price }}$</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    posts: Array,
})
</script>