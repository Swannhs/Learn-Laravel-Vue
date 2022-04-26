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
import axios from "axios";

export default {
    name: "Blog",
    data() {
        return {
            posts: []
        };
    },
    components: {ListBlog},
    methods: {
        getPosts() {
            axios.get('/api/posts', {
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(response => {
                    this.posts = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getPosts();
    }
}
</script>

<style scoped>

</style>
