<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ blog.title }}</h3>
        </div>
        <div class="card-body">
            <p>{{ blog.content }}</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SingleBlog",
    data() {
        return {
            blog: {},
        };
    },
    methods: {
        getSinglePost() {
            axios.get('/api/post/' + this.$route.params.id, {
                headers: {
                    Accept: "application/json",
                }
            })
                .then(response => {
                    this.blog = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getSinglePost();
    }
}
</script>

<style scoped>

</style>
