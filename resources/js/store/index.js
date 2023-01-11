import { createStore } from "vuex";
import axios from "axios";

export default createStore({
    state: {
        qty: 1,
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
        setCart(state, newCart) {
            state.cart = newCart;
        },
        setTotal(state, newTotal) {
            state.total = newTotal;
        },
        setToggle(state) {
            state.toggle = !state.toggle;
        },
        setCartToEmpty(state){
            state.cart = [];
            state.total = 0;
        },
        addToCart(state, {product,id,qty,size}){
            let productInCart = state.cart.find(item => {
                return item.product_id === id;
            });
            if(!productInCart){
                state.cart.unshift({product,id,qty,size})
                axios.post('/cart-store', { 'product_id': id, 'qty': qty, 'size': size });
            }else if(productInCart && productInCart.size!==size){
                state.cart.unshift({product,id,qty,size})
                axios.post('/cart-store', { 'product_id': id, 'qty': qty, 'size': size });
            }else{
                axios.post('/cart-store', { 'product_id': id, 'qty': qty, 'size': size });
            }
        },
    },
    actions: {
        async getProducts({ commit }){
            await axios.get('/getproducts').then(response => {
                commit('setCart', response.data.products);
                commit('setTotal', response.data.total);
            })
        },
        addProductToCart({ commit }, {product,id,qty,size}){
            commit('addToCart', {product,id,qty,size})
        },
    },
    getters: {
        products: state => state.cart,
    },
    modules: {

    }
})