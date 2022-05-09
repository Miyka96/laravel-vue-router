<template>
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
</template>

<script>
    export default {
        props:{
            post:{
                type: Object,
                required: false
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>