
<template>

    <Head title="Admin Section" />

    <section class="container-xl min-vh-100 bg-light mx-auto p-5 position-relative">
        <div class="row justify-content-center">
            <div class="col"><button @click="update" class="btn btn-dark w-100">Update</button></div>
            <div class="col"><button @click="destroy" class="btn btn-danger w-100">Delete</button></div>
        </div>
        <div v-if="$page.props.flash.success" 
             class="toast show position-absolute top-0 start-50 translate-middle-x mt-5" 
             role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Backend</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">{{ $page.props.flash.success }}</div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 col-md-8 d-flex flex-column gap-3">
                <div>
                    <label class="form-label" for="product_id">Product_id:</label>
                    <input class="form-control" id="product_id" type="number" v-model="form.id" disabled />
                </div>
                <div>
                    <label class="form-label" for="category_id">Category_id:</label>
                    <input class="form-control" id="category_id" type="number" v-model="form.category_id" />
                </div>
                <div>
                    <label class="form-label" for="title">Title:</label>
                    <input class="form-control" id="title" type="text" v-model="form.title" />
                </div>
                <div>
                    <label class="form-label" for="slug">Slug:</label>
                    <input class="form-control" id="slug" type="text" v-model="form.slug" />
                </div>
                <div>
                    <label class="form-label" for="price">Price:</label>
                    <input class="form-control" id="price" type="number" v-model="form.price" />
                </div>
                <div>
                    <label class="form-label" for="sku">Sku:</label>
                    <input class="form-control" id="sku" type="text" v-model="form.sku" />
                </div>
                <div>
                    <label class="form-label" for="description">Description:</label>
                    <textarea id="description" class="form-control" placeholder="Leave a comment here"
                        v-model="form.description" style="height: 150px"></textarea>
                </div>
                <div>
                    <label class="form-label" for="size_s">Size_S:</label>
                    <input class="form-control" id="size_s" type="number" v-model="form.size_s" />
                </div>
                <div>
                    <label class="form-label" for="size_m">Size_M:</label>
                    <input class="form-control" id="size_m" type="number" v-model="form.size_m" />
                </div>
                <div>
                    <label class="form-label" for="size_l">Size_L:</label>
                    <input class="form-control" id="size_l" type="number" v-model="form.size_l" />
                </div>
                <div>
                    <label class="form-label" for="size_xl">Size_XL:</label>
                    <input class="form-control" id="size_xl" type="number" v-model="form.size_xl" />
                </div>
                <div>
                    <label class="form-label" for="size_xxl">Size_XXL:</label>
                    <input class="form-control" id="size_xxl" type="number" v-model="form.size_xxl" />
                </div>
                <div>
                    <label class="form-label" for="type">Type:</label>
                    <input class="form-control" id="type" type="text" v-model="form.type" />
                </div>
            </div>
            <div class="col-lg-6 col-md-8 d-flex flex-column gap-3">
                <div>
                    <label class="form-label" for="imgs">Img_Size:</label>
                    <input class="form-control" id="imgs" type="number" v-model="form.imgs" />
                </div>
                <div>
                    <label class="form-label" for="img1">Img1:</label>
                    <div class="row">
                        <div class="col-3"><img class="img-fluid" :src="product.img1" /></div>
                        <div class="col-9 my-auto"><input class="form-control w-100" id="img1" type="text"
                                v-model="form.img1" /></div>
                    </div>
                </div>
                <div>
                    <label class="form-label" for="img2">Img2:</label>
                    <div class="row">
                        <div class="col-3"><img class="img-fluid" :src="product.img2" /></div>
                        <div class="col-9 my-auto"><input class="form-control w-100" id="img2" type="text"
                                v-model="form.img2" /></div>
                    </div>
                </div>
                <div v-if="product.img3 != null">
                    <label class="form-label" for="img3">Img3:</label>
                    <div class="row">
                        <div class="col-3"><img class="img-fluid" :src="product.img3" /></div>
                        <div class="col-9 my-auto"><input class="form-control w-100" id="img3" type="text"
                                v-model="form.img3" /></div>
                    </div>
                </div>
                <div v-if="product.img4 != null">
                    <label class="form-label" for="img4">Img4:</label>
                    <div class="row">
                        <div class="col-3"><img class="img-fluid" :src="product.img4" /></div>
                        <div class="col-9 my-auto"><input class="form-control w-100" id="img4" type="text"
                                v-model="form.img4" /></div>
                    </div>
                </div>
                <div class="mt-3">
                    <Link onclick="window.history.back()" class="btn btn-dark w-100">go back</Link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";
import { useStore } from 'vuex';

let props = defineProps({
    errors: Object,
    product: Object,
});
let product = props.product;

let form = useForm({
    id: product.id,
    category_id: product.category_id,
    title: product.title,
    slug: product.slug,
    price: product.price,
    sku: product.sku,
    description: product.description,
    size_s: product.size_s,
    size_m: product.size_m,
    size_l: product.size_l,
    size_xl: product.size_xl,
    size_xxl: product.size_xxl,
    type: product.type,
    imgs: product.imgs,
    img1: product.img1,
    img2: product.img2,
    img3: product.img3,
    img4: product.img4,
});

let update = () => {
    form.put(`/admin/${product.id}`)
}

let destroy = () => {
    if (confirm('Are you sure you want to delete this product?')) {
        Inertia.delete(`/admin/${product.id}`);
    }
}

</script>
