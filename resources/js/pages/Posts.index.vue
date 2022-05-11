<template>
<div>
    <div class="container">
        <h1>Ultimi post</h1>
    </div>
    <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
    </div>
    <div class="container py-4">
        <ul class="pagination flex justify-center gap-4 items-center">
            <li @click="fetchPosts(n)"
            :class="[current_page == n ? 'bg-teal-700/50 text-white' : 'dot bg-zinc-500/30 text-white', 
            'rounded-full h-10 w-10 flex items-center justify-center text-sm cursor-pointer']" 
            v-for="n in last_page" :key="n">{{n}}</li>
        </ul>
    </div>
</div>

</template>

<script>
import PostCard from '../components/PostCard.vue'

    export default {
        components:{
            PostCard
        },
        data(){
            return{
                posts:[],
                last_page: 0,
                current_page: 1,
            }
        },
        methods:{
            fetchPosts(page = 1){
                axios.get('/api/posts',{
                    params: {
                        page
                    }
                })
                .then(res =>{
                    const {posts} = res.data
                    const {data, last_page, current_page}= posts
                    this.posts = posts.data
                    this.last_page = last_page
                    this.current_page =current_page
                })
                .catch(err =>{
                    console.warn(err)
                })
            }
        },
        mounted(){
                this.fetchPosts();   
        }
    }
</script>

<style lang="scss" scoped>

</style>