<template>
    <div class="container">
        <div v-for="post in posts" :key="post.id">
            {{post.title}}
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                posts:[]
            }
        },
        methods:{
            fetchPosts(){

            }
        },
        mounted:{
            fetchPosts(){
                this.fetchPosts();
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>