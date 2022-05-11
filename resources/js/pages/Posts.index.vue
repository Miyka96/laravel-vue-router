<template>
    <div>
        <div class="container">
            <ul class="flex align-center gap-4 my-8 text-xl flex-wrap">
                <router-link :to="{name: 'categories.archive' , params:{slug:category.slug} }" tag="li"
                class="rounded-full border border-white cursor-pointer py-1 px-3 text-teal-700 whitespace-nowrap" 
                v-for="category in categories" :key="category.id">
                    {{ category.name }}
                </router-link>
            </ul>
        </div>
        <div
            class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"
        >
            <PostCard v-for="post in posts" :key="post.id" :post="post" />
        </div>
        <div class="container py-4">
            <ul class="pagination flex justify-center gap-4 items-center">
                <li
                    @click="fetchPosts(n)"
                    :class="[
                        current_page == n
                            ? 'bg-teal-700/50 text-white'
                            : 'dot bg-zinc-500/30 text-white',
                        'rounded-full h-10 w-10 flex items-center justify-center text-sm cursor-pointer',
                    ]"
                    v-for="n in last_page"
                    :key="n"
                >
                    {{ n }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import PostCard from "../components/PostCard.vue";

export default {
    components: {
        PostCard,
    },
    data() {
        return {
            posts: [],
            last_page: 0,
            current_page: 1,
            categories: [],
        };
    },
    methods: {
        fetchPosts(page = 1) {
            axios
                .get("/api/posts", {
                    params: {
                        page,
                    },
                })
                .then((res) => {
                    const { posts } = res.data;
                    const { data, last_page, current_page } = posts;
                    this.posts = posts.data;
                    this.last_page = last_page;
                    this.current_page = current_page;
                })
                .catch((err) => {
                    console.warn(err);
                });
        },
        fetchCategories() {
            axios
                .get("/api/categories")
                .then((res) => {
                    const { categories } = res.data;
                    this.categories = categories;
                })
                .catch((err) => {
                    console.warn(err);
                });
        },
    },
    mounted() {
        this.fetchPosts();
        this.fetchCategories();
    },
};
</script>

<style lang="scss" scoped></style>
