<template>
    <section class="container-fluid bg-light py-5">
        <div class="text-center fs-5">
            <h2 class="fs-3">{{ title }}</h2>
        </div>
        <div class="row align-items-center justify-content-center g-4 py-5">
            <div class="col-lg-4 col-xl-3 col-sm-6 col-6">
                <div class="card text-center">
                    <a href="/collections/women"><img class="card-img-top"
                            src="images/1.jpg"
                            alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title fs-6">{{ itemTitle }}</h5>
                        <p class="card-text">{{ price }}$</p>
                        <a href="/" class="btn btn-outline-dark">View Product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
</script>