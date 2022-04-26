<template>
    <div class="card">
        <div class="card-header">
            <router-link :to="`blog/${id}`">
                <h4 class="card-title">
                    {{ title }}
                </h4>
            </router-link>
        </div>
        <div class="card-body">
            <p>
                {{ content }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListBlog",
    props: {
        id: {
            type: Number,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        content: {
            type: String,
            required: true
        },
    },
}
</script>

<style scoped>
a {
    text-decoration: none;
}

</style>
