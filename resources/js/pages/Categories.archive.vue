<template>
    <div class="container">
        <h1 class="text-3xl mb-5" v-if="category">{{category.name}}</h1>
                <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <router-link v-for="post in posts" :key="post.id" :to="{name: 'posts.show', params:{slug: post.slug} }">
                        <div class="post card rounded-lg bg-gray-100 shadow-md overflow-hidden">
                            <img src="https://picsum.photos/450/250" class="w-full object-cover">
                            <div class="card__body p-6">
                                <h4 class="post__title mb-4 text-xl">{{post.title}}</h4>
                                <p class="text-teal-600 mb-4 font-bold" v-if="post.category">{{post.category.name}}</p>
                                <ul class="tags flex gap-4 items-center flex-wrap">
                                    <li class="tag bg-teal-800/30 rounded-full block px-4 text-xs" v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
                                </ul>
                            </div>
                        </div>
                    </router-link>
               </div>     
    </div>
</template>

<script>
    import PostCard from "../components/PostCard.vue";
    export default {
        components: {
            PostCard
        },
        data(){
            return{ 
                category: null,
                posts: []
            }
        },

        methods:{
            fetchPostsByCategorySlug(){
                axios.get(`/api/categories/${this.$route.params.slug}/posts`)
                .then(res =>{
                    const {posts, category} = res.data;

                    this.posts = posts;
                    this.category = category;


                }) //catch
            }
        },

        beforeMount(){
            this.fetchPostsByCategorySlug();
        }
    }
</script>

<style lang="scss" scoped>

</style>