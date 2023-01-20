<template>

    <Head title="Create Account - Winnerforce" />

    <form @submit.prevent="submit" class="container py-5 m-auto">
        <div class="row">
            <div class="col-md-7 col-xl-4 col-10 m-auto">
                <header class="text-center">
                    <h1 class="fs-3">REGISTER</h1>
                    <p>Please fill in the information below:</p>
                </header>
                <div class="mt-2">
                    <input v-model="form.firstname" 
                           type="text" 
                           name="firstname" 
                           class="form-control bg-transparent py-2 rounded-0" 
                           placeholder="First name" />
                    <div v-if="form.errors.firstname" v-text="form.errors.firstname" class="text-danger mt-1"></div>
                </div>
                <div class="mt-3">
                    <input v-model="form.lastname"
                           type="text" name="lastname" 
                           class="form-control bg-transparent py-2 rounded-0" 
                           placeholder="Last name" />
                    <div v-if="form.errors.lastname" v-text="form.errors.lastname" class="text-danger mt-1"></div>
                </div>
                <div class="mt-3">
                    <input v-model="form.email"
                           type="email" name="email" 
                           class="form-control bg-transparent py-2 rounded-0"
                           placeholder="Email" />
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-danger mt-1"></div>
                </div>
                <div class="mt-3">
                    <input v-model="form.password" 
                           type="password" name="password" 
                           class="form-control bg-transparent py-2 rounded-0" 
                           placeholder="Password">
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-danger mt-1"></div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-dark px-4 py-2 mx-auto w-100">CREATE MY ACCOUNT</button>
                </div>
            </div>
        </div>
    </form>

</template>

<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    errors: Object
});

let form = useForm({
    firstname: '',
    lastname: '',
    email: '',
    password: ''
});

let submit = () => {
    form.post('/register', form);
}
</script>