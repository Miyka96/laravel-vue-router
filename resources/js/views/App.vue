<template>
    <div class="app bg-neutral-300 text-zinc-900">
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
            footer
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
    .app{
        min-height: 100vh;
    }
</style>