<template>

    <Head title="Account - Winnerforce" />

    <form @submit.prevent="submit" class="container py-5 m-auto">
        <div class="row">
            <div class="col-md-7 col-xl-4 col-10 m-auto">
                <header class="text-center">
                    <h1 class="fs-3">RECOVER PASSWORD</h1>
                    <p>Please enter your e-mail</p>
                </header>
                <div class="mt-2">
                    <input v-model="form.email" type="email" class="form-control bg-transparent py-2 rounded-0" placeholder="Email" />
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-danger mt-1"></div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-dark px-4 py-2 mx-auto w-100" :disabled="form.processing">RECOVER</button>
                </div>
                <div class="text-center mt-2">
                    <p>Remember your password? <Link href="/login" class="text-decoration-none text-dark">Back to login</Link>
                    </p>
                </div>
            </div>
        </div>
    </form>

</template>

<script setup>
import { Head, useForm, Link} from '@inertiajs/inertia-vue3';

let form = useForm({
    email: '',
});

let submit = () => {
    form.post('/reset-password');
}
</script>