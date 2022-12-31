<template>
    <section class="container-fluid bg-light">
        <div class="row align-items-center g-2 px-2">
            <div class="col-xl-3 col-md-4 col-sm-6  col-6" v-for="post in posts" :key="post.id">
                <a href="/" class="text-decoration-none text-dark">
                    <div class="text-center h-75">
                        <img :src="showimg1() + post.img_folder + showimg2()" alt="Card image cap" class="card-img-top">
                        <!-- <img :src="isMouseOver ? showimg1() + post.img_folder + showimg2() : showimg1() + post.img_folder + showimg3()"
                            alt="Card image cap" class="card-img-top" @mouseover.native="isMouseOver = !isMouseOver" @mouseleave.native="isMouseOver = !isMouseOver"> -->
                        <div class="text-center mt-3">
                            <h5 class="card-title fs-6 text-truncate">{{ post.title }}</h5>
                            <p class="card-center mt-1">{{ post.price }}$</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
export default {
    components: { Head },
    props: {
        posts: Array
    },
    methods: {
        showimg1() {
            return "/images/thumbnailsMen/";
        },
        showimg2() {
            return "/1.jpg";
        },
        showimg3() {
            return "/2.jpg";
        }
    },
    data() {
        return {
            isMouseOver: true
        }
    }
}
</script>