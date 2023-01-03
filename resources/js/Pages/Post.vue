<template>

    <Head :title="`${post.title} - Winnerforce`" />

    <section class="row justify-content-center bg-light">
        <div class="col-xxl-5 col-lg-5 col-md-6">
            <div class="row mb-3 d-none d-md-flex mt-5 px-5">
                <div class="col">
                    <Img :imgfolder="post.img_folder" :active="false" :nb="0" :imgnb="1" />
                </div>
                <div class="col">
                    <Img :imgfolder="post.img_folder" :active="false" :nb="1" :imgnb="2" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': 3 > size }" :imgfolder="post.img_folder" :active="false" :nb="2"
                        :imgnb="3" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': 4 > size }" :imgfolder="post.img_folder" :active="false" :nb="3"
                        :imgnb="4" />
                </div>
            </div>
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button :class="{ 'd-none': 3 > size }" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button :class="{ 'd-none': 4 > size }" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img :src="`/images/thumbnailsMen/${post.img_folder}/1.jpg`" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img :src="`/images/thumbnailsMen/${post.img_folder}/2.jpg`" class="d-block w-100" alt="...">
                    </div>
                    <div :class="{ 'd-none': 3 > size, 'carousel-item': 3 < size }">
                        <img :src="`/images/thumbnailsMen/${post.img_folder}/3.jpg`" class="d-block w-100" alt="...">
                    </div>
                    <div :class="{ 'd-none': 4 > size, 'carousel-item': 4 == size }">
                        <img :src="`/images/thumbnailsMen/${post.img_folder}/4.jpg`" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row d-md-none mt-3 px-2">
                <div class="col">
                    <Img :imgfolder="post.img_folder" :active="false" :nb="0" :imgnb="1" />
                </div>
                <div class="col">
                    <Img :imgfolder="post.img_folder" :active="false" :nb="1" :imgnb="2" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': 3 > size }" :imgfolder="post.img_folder" :active="false" :nb="2"
                        :imgnb="3" />
                </div>
                <div class="col">
                    <Img :class="{ 'd-none': 4 > size }" :imgfolder="post.img_folder" :active="false" :nb="3"
                        :imgnb="4" />
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-5 col-md-6 mt-5 px-5">
            <div class="border-bottom pb-4">
                <h2 class="fs-6 mb-4">WINNERFORCE</h2>
                <h1 class="fs-5">{{ post.title }}</h1>
                <p>{{ post.sku }}</p>
                <div><span>${{ post.price }}.00</span></div>
            </div>
            <div class="py-3">
                <span>Size:</span>
                <ul class="list-unstyled d-flex gap-3 mt-2">
                    <li class="" style="position:relative">
                        <input id="s" class="btn-check" type="radio" name="option-0" value="S" autocomplete="off"
                            :disabled="post.size_s == 0" :checked="post.size_s == 1" />
                        <label for="s" class="px-3 py-2 btn bg-transparent rounded-0">S</label>
                        <svg :class="{ 'd-none': post.size_s == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="m" class="btn-check" type="radio" name="option-0" autocomplete="off" value="M"
                            :disabled="post.size_m == 0" :checked="post.size_s == 0 && post.size_m == 1" />
                        <label for="m" class="px-3 py-2 btn bg-transparent rounded-0">M</label>
                        <svg :class="{ 'd-none': post.size_m == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="l" class="btn-check" type="radio" name="option-0" autocomplete="off" value="L"
                            :disabled="post.size_l == 0"
                            :checked="post.size_s == 0 && post.size_m == 0 && post.size_l == 1" />
                        <label for="l" class="px-3 py-2 btn bg-transparent rounded-0">L</label>
                        <svg :class="{ 'd-none': post.size_l == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="xl" class="btn-check" type="radio" name="option-0" autocomplete="off" value="XL"
                            :disabled="post.size_xl == 0"
                            :checked="post.size_s == 0 && post.size_m == 0 && post.size_l == 0 && post.size_xl == 1" />
                        <label for="xl" class="px-3 py-2 btn bg-transparent rounded-0">XL</label>
                        <svg class="fs-6" :class="{ 'd-none': post.size_xl == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                    <li class="" style="position:relative">
                        <input id="xxl" class="btn-check" type="radio" name="option-0" autocomplete="off" value="XXL"
                            :disabled="post.size_xxl == 0"
                            :checked="post.size_s == 0 && post.size_m == 0 && post.size_l == 0 && post.size_xl == 0 && post.size_xxl == 1" />
                        <label for="xxl" class="px-3 py-2 btn bg-transparent rounded-0">XXL</label>
                        <svg class="fs-6" :class="{ 'd-none': post.size_xxl == 1 }"
                            style="width: 100%; height: 100%; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                            <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#999999; stroke-width:1"></line>
                        </svg>
                    </li>
                </ul>
            </div>
            <div>
                <span>Quantity:</span>
                <div class="w-50">
                <div class="border d-flex justify-content-around w-75 py-2 mt-2 px-1">
                    <button class="border-0 bg-transparent"
                        @click="quantity > 1 ? quantity-- : quantity">-</button><span>{{ quantity}}</span><button class="border-0 bg-transparent" @click="quantity++">+</button>
                </div>
                </div>
                <div class="mt-3">
                    <a data-bs-toggle="offcanvas" href="#cart" role="button" aria-controls="cart"
                        class="btn bg-transparent border px-4 py-2 w-100">ADD TO CART</a>
                </div>
                <div class="mt-3">
                    <a href="#" class="btn btn-dark px-4 py-2 w-100">BUY IT NOW</a>
                </div>
            </div>
            <div class="py-3">
                <p>
                    Give blood, sweat, and tears, then earn the respect of your fellow gym mates in the Extreme
                    Stringer. This slim-fit, stringer cut design is functional and empowering with its lightweight
                    material and high mobility features, as it instantly inspires you with the passion and fire
                    needed to lift those weights. With a scooped neckline, a racerback design, and a dipped hem,
                    this tank is the definition of athleisure. A contrasting printed Winnerforce logo backside is
                    included to reflect your inner bodybuilder beast.
                    Barcodes of raw materials being used: 10149-02
                </p>
            </div>
            <div class="d-flex gap-3">
                <span class="text-muted">SHARE</span>
                <ul class="d-flex list-unstyled gap-2">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/winnerforce.lb/" class="text-muted" target="_blank"
                            rel="noopener" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/hashtag/winnerforce?lang=en" class="text-muted" target="_blank"
                            rel="noopener" aria-label="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.pinterest.com/winnerforce/" class="text-muted" target="_blank"
                            rel="noopener" aria-label="Pinterest">
                            <i class="bi bi-pinterest"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</template>


<!-- <script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Img from '../Shared/Img.vue';




    post: Object,
});




console.log(size)
</script>

 -->




<!-- 
const size = require.context('/images/thumbnailsMen/95511-03-18')
console.log(size.keys()) -->


<script>
import Img from '../Shared/Img.vue';
import { Head } from '@inertiajs/inertia-vue3';
export default {
    components: { Img },
    props: {
        post: Object,
        size: Number
    },
    data() {
        return { quantity: 1 };
    },
};
</script>