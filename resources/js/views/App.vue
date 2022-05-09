<template>
    <div>
        <header>
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Posts</li>
                    <li>Categories</li>
                </ul>
            </nav>
        </header>

        <main>
            <PostGrid/>
        </main>

        <footer>
            
        </footer>
    </div>
</template>

<script>

    import PostGrid from './Posts.index.vue'

    export default {
        components:{
            PostGrid,
        }
    }
</script>

<style lang="scss" scoped>

</style>