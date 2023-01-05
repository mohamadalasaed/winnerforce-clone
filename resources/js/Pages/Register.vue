<template>

    <Head title="Create Account - Winnerforce" />

    <section class="container py-5 m-auto">
        <div class="row">
            <div class="col-md-7 col-xl-4 col-10 m-auto">
                <header class="text-center">
                    <h1 class="fs-3">REGISTER</h1>
                    <p>Please fill in the information below:</p>
                </header>
                <div class="mt-2">
                    <input type="text" class="form-control bg-transparent py-2 rounded-0" placeholder="First name" />
                </div>
                <div class="mt-3">
                    <input type="text" class="form-control bg-transparent py-2 rounded-0" placeholder="Last name" />
                </div>
                <div class="mt-3">
                    <input type="email" class="form-control bg-transparent py-2 rounded-0" placeholder="Email" />
                </div>
                <div class="mt-3">
                    <input type="password" class="form-control bg-transparent py-2 rounded-0" placeholder="Password">
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-dark px-4 py-2 mx-auto w-100">CREATE MY ACCOUNT</button>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
</script>