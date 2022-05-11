<template>
    <div>

        <h1 v-if="category">{{category.name}}</h1>
        <ul>
            <router-link v-for="post in posts" :key="post.id" :to="{name: 'posts.show', params:{slug: post.slug} }">
                {{post.title}}
            </router-link>
        </ul>

    </div>
</template>

<script>
    export default {
        data(){
            return{ 
                category: null,
                posts: []
            }
        },

        methods:{
            fetchPostsByCategorySlug(){
                axios.get(`/api/categories/${this.route.params.slug}/posts`)
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