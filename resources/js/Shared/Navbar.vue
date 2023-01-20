<template>

    <header class="container-fluid navbar-light sticky-top border-bottom border-opacity-50 p-2 bg-white">

        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid px-3 px-xl-5">

                <div class="d-xl-flex d-none position-relative">
                    <Link class="navbar-brand d-flex" href="/">
                        <img class="light-mode-item navbar-brand-item"
                            src="//cdn.shopify.com/s/files/1/0351/4928/3461/files/website-size_copy_105x.png?v=1653660178"
                            srcset="//cdn.shopify.com/s/files/1/0351/4928/3461/files/website-size_copy_105x.png?v=1653660178 1x, //cdn.shopify.com/s/files/1/0351/4928/3461/files/website-size_copy_105x@2x.png?v=1653660178 2x"
                            alt="Winnerforce">
                        <span v-if="$page.props.auth"
                            class="position-absolute mt-1 start-100 badge rounded bg-dark d-none d-lg-block">
                            welcome {{ $page.props.auth.user.firstname }}
                        </span>
                    </Link>
                </div>

                <div>
                    <button class="navbar-toggler ms-auto outline-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="d-xl-none mx-auto">
                    <Link class="text-center" href="/">
                        <img class="light-mode-item navbar-brand-item"
                            src="//cdn.shopify.com/s/files/1/0351/4928/3461/files/website-size_copy_105x.png?v=1653660178"
                            srcset="//cdn.shopify.com/s/files/1/0351/4928/3461/files/website-size_copy_105x.png?v=1653660178 1x, //cdn.shopify.com/s/files/1/0351/4928/3461/files/website-size_copy_105x@2x.png?v=1653660178 2x"
                            alt="Winnerforce">
                    </Link>
                </div>

                <div class="offcanvas offcanvas-start h-100 bg-white" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <p v-if="$page.props.auth" class="fs-5 offcanvas-title" id="offcanvasNavbarLabel">
                            Welcome back <strong>{{ $page.props.auth.user.firstname }}</strong>
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 fw-bold ">
                            <li class="my-auto">
                                <div class="dropdown">
                                    <Link class="btn btn-secondary dropdown-toggle bg-white text-dark border-0 fs-6 fw-bold"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        MEN
                                    </Link>

                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <Link href="/collections/men" class="text-dark text-decoration-none">All
                                                Products</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/men?category=Sweatshirt"
                                                class="text-dark text-decoration-none">SweatShirts</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/men?category=Pant"
                                                class="text-dark text-decoration-none">Pants</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/men?category=T-Shirt"
                                                class="text-dark text-decoration-none">T-Shirts</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/men?category=Tank"
                                                class="text-dark text-decoration-none">Tanks</Link>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="my-auto">
                                <div class="dropdown">
                                    <Link class="btn btn-secondary dropdown-toggle bg-white text-dark border-0 fs-6 fw-bold"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        WOMEN
                                    </Link>

                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <Link href="/collections/women" class="text-dark text-decoration-none">All
                                                Products</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/women?category=Legging"
                                                class="text-dark text-decoration-none">Leggings</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/women?category=CropTop"
                                                class="text-dark text-decoration-none">Crop Tops</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/women?category=SportsBras"
                                                class="text-dark text-decoration-none">Sports Bras</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/women?category=Short"
                                                class="text-dark text-decoration-none">shorts</Link>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="my-auto">
                                <div class="dropdown">
                                    <Link class="btn btn-secondary dropdown-toggle bg-white text-dark border-0 fs-6 fw-bold"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ACCESSORIES
                                    </Link>

                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <Link href="/collections/accessories"
                                                class="text-dark text-decoration-none">All Accessories</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/accessories?category=Bags"
                                                class="text-dark text-decoration-none">Bags</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/accessories?category=Socks"
                                                class="text-dark text-decoration-none">Socks</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/accessories?category=FaceMask"
                                                class="text-dark text-decoration-none">Face-Mask</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/collections/accessories?category=Bottles"
                                                class="text-dark text-decoration-none">Bottels</Link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="my-auto">
                                <div>
                                    <Link class="btn btn-secondary bg-white text-dark border-0 fs-6 fw-bold">Sale</Link>
                                </div>
                            </li>

                            <li class="my-auto">
                                <div class="dropdown">
                                    <Link class="btn btn-secondary dropdown-toggle bg-white text-dark border-0 fs-6 fw-bold"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        AMBASSADOR PROGRAM
                                    </Link>

                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <Link href="/ambassador" class="text-dark text-decoration-none">Become an
                                                ambassador</Link>
                                        </li>
                                        <li class="dropdown-item">
                                            <Link href="/login" class="text-dark text-decoration-none">Log in to your
                                                account</Link>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="my-auto" v-if="$page.props.auth">
                                <Link v-if="$page.props.auth.user.email==='admin@gmail.com'" 
                                      href="/admin?type=men" 
                                      class="text-decoration-none text-danger">
                                      Admin Page
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="d-flex list-unstyled gap-2 justify-content-center align-items-center my-auto">
                    <li v-if="$page.props.auth">
                        <Link href="/logout" method="post" @click="this.$store.dispatch('getProducts')">
                            <i class="bi bi-person-fill text-danger fs-4"></i>
                        </Link>
                    </li>
                    <li v-if="$page.props.auth == null">
                        <Link href="/login"  @click="cart">
                            <i class="bi bi-person-fill text-dark fs-4"></i>
                        </Link>
                    </li>
                    <li class="mb-1">
                        <Link href="/cart" class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#cart" aria-controls="cart">
                            <i class="bi bi-bag text-dark fs-4 position-relative"></i>
                            <span v-if="$store.state.total !== 0"
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-dark border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </Link>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="offcanvas offcanvas-end bg-light" aria-expanded="true"
            tabindex="-1" id="cart" aria-labelledby="cartLabel">
            <div class="offcanvas-header border-bottom px-4">
                <p class="offcanvas-title fs-5" id="cartLabel">CART</p>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column gap-3">
                <div v-if="JSON.stringify(this.$store.state.cart) === '[]'" class="text-center my-auto" v-motion-fade>
                    <p>YOUR CART IS EMPTY</p>
                </div>
                <div class="row justify-content-center" v-for="product in cart" :key="product.product_id+product.size">
                    <ShortCartItem :product="product" />
                </div>
            </div>
            <div v-if="JSON.stringify(this.$store.state.cart) !== '[]'" class="p-4 border-top d-flex flex-column" v-motion-fade>
                <span class="text-dark">Add Order Note</span>
                <span class="mt-1">Shispanping & taxes calculated at checkout</span>
                <a href="/checkouts" class="btn btn-dark px-4 py-2 w-100 rounded-0 mt-4">
                    CHECKOUT . ${{ $store.state.total }}.00 USD
                </a>
            </div>
        </div>

    </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import ShortCartItem from '../Shared/ShortCartItem.vue';
export default {
    components: { Link, ShortCartItem },
    beforeMount() {
            this.$store.dispatch('getProducts');
    },
    computed: {
        cart() {
            return this.$store.state.cart
        }
    },
    created: function () {
            this.$store.getters['products']
    },
};
</script>
