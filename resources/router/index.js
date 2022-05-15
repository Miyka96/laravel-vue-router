import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// import all pages 
import Posts from '../js/pages/Posts.index.vue'
import Contact from '../js/pages/Contact.vue'
import CategoriesArchive from '../js/pages/Categories.archive.vue'

const routes = [
    {
        path: '/posts',
        name: 'post.index',
        component: Posts
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '/categories/:slug',
        name: 'categories.archive',
        component: CategoriesArchive
    },
    // todoo post show route
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

export default router