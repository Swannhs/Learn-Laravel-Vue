<template>
    <div class="row">
        <div class="col-12">
            <list-blog v-for="(post, index) in posts"
                       :title="post.title"
                       :content="post.content"
                       :key="index">
                title="This is dummy title"
                content="This is dummy content">

            </list-blog>
        </div>
    </div>
</template>

<script>
import ListBlog from "../components/Blog/ListBlog";

export default {
    name: "Blog",
    data() {
        return {
            posts: [
                {
                    title: "This is dummy title",
                    content: "This is dummy content"
                },
                {
                    title: "This is dummy title",
                    content: "This is dummy content"
                },
                {
                    title: "This is dummy title",
                    content: "This is dummy content"
                }
            ]
        };
    },
    components: {ListBlog}
}
</script>

<style scoped>

</style>
