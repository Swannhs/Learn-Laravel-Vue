<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{title}}
            </h4>
        </div>
        <div class="card-body">
            <p>
                {{content}}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListBlog",
    props: {
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

</style>
