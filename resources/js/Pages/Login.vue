<template>

    <Head title="Account - Winnerforce" />

    <section class="container py-5 m-auto">
        <div class="row">
            <div class="col-md-7 col-xl-4 col-10 m-auto">
                <header class="text-center">
                    <h1 class="fs-3">LOG INTO MY<br>WINNERFORCE LB</h1>
                    <p>Please enter your e-mail and password:</p>
                </header>
                <div class="mt-2">
                    <input type="email" class="form-control bg-transparent py-2 rounded-0" placeholder="Email" />
                </div>
                <div class="input-group mt-3">
                    <input type="password" class="form-control bg-transparent py-2 rounded-0 border border-end-0" placeholder="Password">
                    <span role="button" class="input-group-text bg-transparent text-muted border border-start-0" id="basic-addon2">Forgot Password?</span>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-dark px-4 py-2 mx-auto w-100">LOGIN</button>
                </div>
                <div class="text-center mt-2">
                    <p>Don't have an account? <a href="/register" class="text-decoration-none text-dark">Create one</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
</script>