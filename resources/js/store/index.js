import { createStore } from "vuex";
import axios from "axios";

export default createStore({
    state: {
        qty: 1,
        type: 'men',
        total: 0,
        toggle: true,
        cart: [],
    },

    mutations: {
        decreaseQty(state) {
            state.qty > 1 ? state.qty-- : state.qty
        },
        increaseQty(state) {
            state.qty++
        },
        setType(state, newType){
            state.type = newType;
        },
        setCart(state, newCart) {
            state.cart = newCart.slice().reverse();
        },
        setTotal(state, newTotal) {
            state.total = newTotal;
        },
        setToggle(state) {
            state.toggle = !state.toggle;
        },
        setCartToEmpty(state) {
            state.cart = [];
            state.total = 0;
        },
        addToCart(state, { product, product_id, qty, size, img, title, newprice }) {
            let productInCart = state.cart.find(item => {
                return (item.product_id === product_id && item.size === size) || (item.product_id === product_id && item.size === null);
            });

            let price = newprice * qty

            if (!productInCart) {
                state.cart.unshift({ product_id, qty, size, title, price,img })
                state.total += price
                axios.post('/cart-add', { 'product_id': product_id, 'qty': qty, 'size': size, 'img': img, 'title': title }).then(response => {
                    state.total = response.data.total;
                });
            } else {
                if (productInCart.size !== size && productInCart.size !== null) {
                    state.total += price
                    state.cart.unshift({ product, product_id, qty, size, title, price, img });
                    axios.post('/cart-add', { 'product_id': product_id, 'qty': qty, 'size': size, 'img': img, 'title': title }).then(response => {
                        state.total = response.data.total;
                    });
                } else {
                    let newCart = state.cart;
                    newCart.forEach(item => {
                        if (item.product_id == product_id && item.size == size) {
                            item.qty += qty
                            item.price += qty*newprice
                        }
                    })
                    state.total += qty*newprice
                    state.cart = newCart;
                    axios.post('/cart-add', { 'product_id': product_id, 'qty': qty, 'size': size, 'img': img, 'title': title}).then(response => {
                        state.total = response.data.total;
                    });
                }
            }
        },
        removeFromCart(state, {product_id, size}) {
            let i = state.cart.findIndex(i => {
                if(i.product_id == product_id && i.size == size){
                    state.total -= i.price;
                    return i;
                }
            });
            state.cart.splice(i, 1);
            axios.post('/cart-remove', {'product_id': product_id, 'size': size }).then(response => {
                state.total = response.data.total;
            });
        },
        update(state, { product_id, qty, size}) {
            let newCart = state.cart;
            newCart.forEach(item => {
                if (item.product_id == product_id && item.size == size) {
                    let itemPrice = item.price/item.qty
                    item.qty += qty
                    item.price += itemPrice*qty
                    state.total += itemPrice*qty
                }
            })
            state.cart = newCart;
            axios.post('/cart-update', { 'product_id': product_id, 'qty': qty, 'size': size }).then(response => {
                state.total = response.data.total;
            });
        }
    },

    actions: {
        async getProducts({ commit }) {
            await axios.get('/getproducts').then(response => {
                commit('setCart', response.data.products);
                commit('setTotal', response.data.total);
            })
        },
        addProductToCart({ commit }, { product, product_id, qty, size, img, title, newprice }) {
            commit('addToCart', { product, product_id, qty, size, img, title, newprice })
        },
        removeProductFromCart({ commit }, {product_id, size }) {
            commit('removeFromCart', {product_id, size })
        },
        updateQuantity({ commit }, { product_id, qty, size}) {
            commit('update', { product_id, qty, size})
        },
        updateType({commit}, newType){
            commit('setType', newType)
        }
    },

    getters: {
        products: state => state.cart,
    },

    modules: {

    },

})