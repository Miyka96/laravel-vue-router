<template>
    <div class="app bg-neutral-300 text-zinc-900">
        <header>
            <nav>
                <ul class="flex justify-end items-center gap-6 text-xl mb-8 py-4 px-4 text-neutral-500">
                <router-link :to="{name: 'post.index' }" tag="li" class="cursor-pointer"> Home </router-link>
                <router-link :to="{name: 'contact' }" tag="li" class="cursor-pointer"> Contact </router-link>
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