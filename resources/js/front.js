// AXIOS
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// VUE
window.Vue = require('vue');
import App from './views/App.vue'
import router from '../router/index'
import Vue from 'vue'



const app = new Vue({
    el: '#root',
    render: h=>h(App),
    router
});
