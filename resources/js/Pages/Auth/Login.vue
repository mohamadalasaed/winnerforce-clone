<template>

    <Head title="Account - Winnerforce" />

    <form @submit.prevent="submit" class="container py-5 m-auto">
        <div class="row">
            <div class="col-md-7 col-xl-4 col-10 m-auto">
                <header class="text-center">
                    <h1 class="fs-3">LOG INTO MY<br>WINNERFORCE LB</h1>
                    <p>Please enter your e-mail and password:</p>
                </header>
                <div class="mt-2">
                    <input v-model="form.email" type="email" class="form-control bg-transparent py-2 rounded-0" placeholder="Email" />
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-danger mt-1"></div>
                </div>
                <div class="mt-3">
                    <input v-model="form.password" type="password" class="form-control bg-transparent py-2 rounded-0" placeholder="Password">
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-danger mt-1"></div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-dark px-4 py-2 mx-auto w-100" :disabled="form.processing">LOGIN</button>
                </div>
                <div class="text-center mt-2">
                    <p>Don't have an account? <a href="/register" class="text-decoration-none text-dark">Create one</a>
                    </p>
                </div>
            </div>
        </div>
    </form>

</template>

<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    email: '',
    password: ''
});

let submit = () => {
    form.post('/login');
}
</script>