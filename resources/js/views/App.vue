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
            <router-view> </router-view>
        </main>

        <footer>
            footer
        </footer>
    </div>
</template>

<script>

    export default {
        components:{
        }
    }
</script>

<style lang="scss" scoped>
    .app{
        min-height: 100vh;
    }
</style>